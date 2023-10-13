<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Bank;
use App\Models\ChequeBook;
use App\Models\E_branch;
use App\Models\Fund;
use App\Models\SavedAccount;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function deleteindex($id)
    {
        ChequeBook::destroy($id);
        return back();
    }

    public function chequeindex()
    {
        $data = [
            'request_list' => ChequeBook::orderBy('created_at','DESC')->get()
        ];
        return view('customer.chequeindex',$data);
    }

    public function fundSave(Request $request)
    {
        $request->validate([
            'from' => 'required',
            'to' => 'required|exists:accounts,account_number',
            'balance' => 'required',
            'transfer_amount' => 'required|lte:500000|gt:0',
            'branch' => 'required',
            'city' => 'required',
            'password' => 'required'
        ]);
        $user = auth()->user();

        if (!Hash::check($request->password,$user->password))
        {
            return back()->with(['error' => "Password Doesn't match."])->withInput();
        }

        $data = $request->all();
        $data['date'] = now();
        $data['user_id'] = auth()->id();
        $data['first_name'] = auth()->user()->first_name;
        $data['last_name'] = auth()->user()->last_name;

        Fund::create($data);

        $from_account = Account::where('account_number', $request->from)->first();
        $to_account = Account::where('account_number', $request->to)->first();

        if ($from_account->balance < $request->transfer_amount )
        {
            return back()->with(['error' => "Insufficient Balance"])->withInput();
        }

        $data = [
            'user_id' => auth()->id(),
            'receiver_id' => $from_account->user_id,
            'type' => 0,
            'amount' => $request->transfer_amount,
        ];

        Transaction::create($data);

        $from_account->update([
            'balance' => $from_account->balance - $request->transfer_amount
        ]);

        $data = [
            'user_id' => auth()->id(),
            'receiver_id' => $to_account->user_id,
            'type' => 0,
            'amount' => $request->transfer_amount,
        ];

        Transaction::create($data);

        $to_account->update([
            'balance' => $to_account->balance + $request->transfer_amount
        ]);

        return back()->with(['Success' => "Confirm Your transaction"]);
    }


    public function transfer(Request $request)
    {

        $request->validate([
            'transfer_type'     => 'required_if:beneficiary_type,==,mfs',
            'to'                => 'required_if:beneficiary_type,==,mfs|min:11',
            'password'          => 'required',
            'transfer_amount'   => 'required|lte:500000|gt:0',
//            'bank_name'         => 'required',
//            'branch'            => 'required',
//            'district'          => 'required',
        ]);

        DB::beginTransaction();

        try {
            $user = auth()->user();
            if (!Hash::check($request->password, $user->password)) {
                return back()->with(['error' => "Password Doesn't match."])->withInput();
            }
            $data = $request->all();
            $data['date'] = now();
            $data['user_id'] = auth()->id();
            if ($request->status == 1)
            {
                $data['bank_name'] = $request->bank_name;
                $data['branch'] = $request->branch;
                $data['city'] = $request->city;
                if ($request->beneficiary_type != 'mfs')
                {
                    $data['transfer_type'] = 'NPSB';
                }
            }
            else{
                $data['bank_name'] = $request->beftn_bank_name;
                $data['branch'] = $request->beftn_branch;
                $data['city'] = $request->beftn_city;
                if ($request->beneficiary_type != 'mfs') {
                    $data['transfer_type'] = 'BEFTN';
                }
            }
            Fund::create($data);
            $account = Account::where('account_number', $request->from)->first();
            if ($account->balance < $request->transfer_amount) {
                return back()->with(['error' => "Insufficient Balance"])->withInput();
            }

            $data = [
                'user_id' => auth()->id(),
                'receiver_id' => $account->user_id,
                'type' => 0,
                'amount' => $request->transfer_amount,
            ];

            if ($request->status == 1) {
                Transaction::create($data);

                $account->update([
                    'balance' => $account->balance - $request->transfer_amount
                ]);
                $account = Account::where('account_number', $request->to)->first();

                if ($request->beneficiary_type != 'mfs' && $account)
                {

                    $data = [
                        'user_id' => $account->user_id,
                        'receiver_id' => auth()->id(),
                        'type' => 1,
                        'amount' => $request->transfer_amount,
                    ];

                    $transactions = Transaction::create($data);
                    $limit_check = Transaction::where('user_id',$transactions->user_id)->where('type',0)->where('created_at',Carbon::today())->sum('amount');

                    if ($limit_check >= 500000)
                    {
                        return back()->with(['error' => 'Your maximum limit 5lakh is reached']);
                    }

                    $account->update([
                        'balance' => $account->balance + $request->transfer_amount
                    ]);

                    DB::commit();

                    return back()->with(['Success' => "Confirm Your transaction"]);
                }
            }

            DB::commit();
            return back()->with(['Success' => "Confirm Your transaction"]);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

    }





    public function mfs()
    {
        return view('customer.mfs');
    }


    public function request()
    {
        return view('customer.cheque');
    }

    public function storerequest(Request $request)
    {
        $request->validate([
            'branch' => 'required',
            'date' => 'required|after_or_equal:tomorrow',
            'account_no' => 'required',
            'bank_name' => 'required',
            'city' => 'required',
            'account_type' => 'required',
        ]);
        $data = [
            'branch' => $request->branch,
            'date' => $request->date,
            'account_no' => $request->account_no,
            'bank_name' => $request->bank_name,
            'city' => $request->city,
            'account_type' => $request->account_type,
        ];

        $cheque_book = ChequeBook::create($data);

        return back()->with(['Success' => 'Thanks for your Request']);
    }


    public function single()
    {
        $data = [
          'banks'           =>  Bank::all(),
            'e_branches'    =>  E_branch::all(),
            'users'         =>  User::where('user_type','account holder')->get()
        ];

        return view('customer.singletransfer',$data);
    }


    public function other()
    {
        $data = [
          'e_branches' =>E_branch::all()
        ];
        return view('customer.other',$data);
    }

    public function own()
    {
        $data = [
          'branchlists' => E_branch::all()
        ];
        return view('customer.own',$data);
    }


    public function dashboard()
    {
        $data = [
            'user' => auth()->user(),
        ];
        return view('dashboard.ac_holder',$data);
    }
    public function studentform()
    {
        return view('customer.studentaccount');
    }


    public function bil()
    {
        return view('customer.bil');
    }




    public function currentFrom()
    {
        return view('customer.currentaccount');
    }

    public function features()
    {
        return view('customer.features');
    }


    public function savings()
    {
        return view('customer.savingaccount');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required|unique:users',
            'dob' => 'required',
            'account_type' => 'required',
            'address' => 'required',
        ]);

        try {
            $data = $request->all();
            if ($image = $request->file('image')) {
                $destinationPath = 'image/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $data['image'] = $destinationPath . $profileImage;
            }
            $data['user_id'] = 0;
            $data['user_type'] = 'account holder';
            $data['password'] = bcrypt($request->password);
            $user = User::create($data);
            Account::create([
                'user_id' => $user->id,
                'account_number' => sprintf('%016d', $user->id),
                'account_type' => $request->account_type,
                'dob' => Carbon::parse($request->dob)->format('Y-m-d'),
                'balance' => $request->opening_balance,
            ]);
            if ($request->opening_balance) {
                Transaction::create([
                    'amount' => $request->opening_balance,
                    'type' => 1,
                    'user_id' => $user->id,
                    'receiver_id' => 0,
                ]);
            }
            $details = [
                'title' => 'Now verified your email address',
                'employee' => [
                    'first_name' => $user->first_name,
                    'email' => $user->email,
                    'user_id' => $user->id,
                ]
            ];
            Mail::to($request->email)->send(new \App\Mail\employeeMail($details));
            return back()->with(['success' => 'Account created successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function depositFund()
    {
        $data = [
            'accounts' => SavedAccount::where('user_id',auth()->id())->get()
        ];
        return view('customer.deposit',$data);
    }

    public function saveDeposit(Request $request)
    {
        $request->validate([
            'account_no' => 'required|exists:accounts,account_number',
            'amount' => 'required|gt:0',
            'type' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $account = Account::where('account_number', $request->account_no)->first();

            if ($request->type == 'deposit') {
                if ($account->user_id != auth()->id()) {
                    return back()->with(['error' => 'This account doesnt belongs to you. If you want to transfer on another account please select transfer']);
                }
                $data = [
                    'user_id' => auth()->id(),
                    'receiver_id' => $account->user_id,
                    'type' => 1,
                    'amount' => $request->amount,
                ];

                Transaction::create($data);

                $account->update([
                    'balance' => $request->amount + $account->balance
                ]);
            } else if ($request->type == 'transfer') {
                $self_account = [
                    'user_id' => auth()->id(),
                    'receiver_id' => 0,
                    'type' => 0,
                    'amount' => $request->amount
                ];

                $transferred_account = [
                    'user_id' => auth()->id(),
                    'receiver_id' => $account->user_id,
                    'type' => 1,
                    'amount' => $request->amount
                ];

                Transaction::create($self_account);
                Transaction::create($transferred_account);

                $account->update([
                    'balance' => $request->amount + $account->balance
                ]);

                auth()->user()->account()->update([
                    'balance' => auth()->user()->account->balance - $request->amount
                ]);
            }
            DB::commit();
            return back()->with(['success' => 'Operation done successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['error' => 'Something went wrong']);
        }
    }


    public function CustomerReport(Request $request)
    {
        $data = [
            'transactions'  => Fund::with('user','user.account')->orderBy('created_at', 'desc')
                ->when($request->user_id,function ($query) use($request){
                    $user = User::find($request->user_id);
                    $account = $user->account->account_number;
                    $query->where('to',$account)->orWhere('from',$account);
                })->when(!$request->user_id,function ($query) use($request){
                    $account = auth()->user()->account->account_number;
                    $query->where('to',$account)->orWhere('from',$account);
                })->when($request->search,function ($query) use($request){
                    $query->whereDate('created_at',Carbon::parse($request->search)->format('Y-m-d'));
                })->paginate(30),
            'date' => $request->search
        ];
        return view('customer.holderreport',$data);
    }

}

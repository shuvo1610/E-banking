<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\attendance;
use App\Models\Employee;
use App\Models\Fund;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use function GuzzleHttp\Promise\all;

class EmployeeController extends Controller
{


    public function transactionView($id)
    {
        $data = [
            'funds' => Fund::find($id)
        ];
        return view('employee.fundview', $data);
    }



    public function studentshow()
    {
        return view('employee.studentlist');
    }


    public function currentlist()
    {
        return view('employee.current');
    }


    public function savingslist()
    {
        return view('employee.savings');
    }


    public function salaryaccount()
    {
        return view('employee.salaryaccount');
    }

    public function transactionRequest()
    {
        $data = [
          'transactions'  =>    Fund::where('status',0)->latest()->get()
        ];
        return view ('employee.transaction_request',$data);
    }


    public function transactionDone()
    {
        $data = [
            'transactionsdone'  =>    Fund::where('status','!=',0)->latest()->get()
        ];
        return view ('employee.transactiondone',$data);
    }


    public function approved(Request $request,$id)
    {
        $transactions = Fund::find($id);
        $details = [
            'title' => 'Congratulation, your Transactions successfully',
        ];

        $data = [
            'status' => 1
        ];
        $transactions->update($data);
        $account = Account::where('account_number', $transactions->from)->first();
        $limit_check = Transaction::where('user_id',$transactions->user_id)->where('type',0)->where('created_at',Carbon::today())->sum('amount');
        if ($limit_check >= 500000)
        {
            return back()->with(['error' => 'Your maximum limit 5lakh is reached']);
        }
        $data = [
            'user_id' => $transactions->user_id,
            'receiver_id' => $account->user_id,
            'type' => 0,
            'amount' => $transactions->transfer_amount,
        ];

        Transaction::create($data);

        $account->update([
            'balance' => $account->balance - $transactions->transfer_amount
        ]);
        $account = Account::where('account_number', $transactions->to)->first();
        $limit_check = Transaction::where('user_id',$transactions->user_id)->where('type',0)->where('created_at',Carbon::today())->sum('amount');
        if ($limit_check >= 500000)
        {
            return back()->with(['error' => 'Your maximum limit 5lakh is reached']);
        }
        if ($account)
        {
            $data = [
                'user_id' => $account->user_id,
                'receiver_id' =>$transactions->user_id ,
                'type' => 1,
                'amount' => $transactions->transfer_amount,
            ];

            Transaction::create($data);
            $limit_check = Transaction::where('user_id',$transactions->user_id)->where('type',0)->where('created_at',Carbon::today())->sum('amount');
            if ($limit_check >= 500000)
            {
                return back()->with(['error' => 'Your maximum limit 5lakh is reached']);
            }

            $account->update([
                'balance' => $account->balance + $transactions->transfer_amount
            ]);
            Mail::to('16103358@gmail.com')->send(new \App\Mail\transactionMail($details));

        }

        return back()->with(['Success' => 'Your Transactions approved']);
    }

    public function canceled($id)
    {
        $transactions = Fund::find($id);
        $details = [
            'title' => 'Sorry, your Transactions canceled',
        ];
        $data = [
            'status' => 2
        ];
        $transactions->update($data);
        Mail::to('16103358@gmail.com')->send(new \App\Mail\transactioncanceled($details));
        return back()->with(['error' => 'Your Transactions canceled']);
    }



    public function show()
    {

        $data = [
            'users' => User::where('user_type','employee')->where('id','!=',auth()->id())->get()
        ];
        return view('employee.employeelist', $data);
    }


    public function punch()
    {
        return view('employee.punch');
    }


    public function savetime(Request $request)
    {
        $employee = Employee::where('employee_id', $request->user_id)->first();
        $data = [
            'date' => date('Y-m-d'),
            'login_time' => date('H:i:s')
        ];
        if (auth()->id() == $employee->user_id) {
            $data['user_name'] = $employee->user->first_name;
            $data['user_id'] = $employee->user_id;
            $employee = attendance::create($data);
            return redirect()->route('attendance.time');
        }
        return redirect()->route('punch.employee')->with(['error' => "Your are not allow to punch In from this Employee ID"]);
    }


    public function ShowAttendance()
    {
        $input = attendance::where('user_id', auth()->id())->latest()->first();
//        $useradmin =
        $data = [
            'employees' => attendance::when(auth()->user()->user_type == 'employee', function ($query) {
                $query->where('user_id', '=', auth()->id());
            })->latest()->paginate(),
            'user' => $input
        ];
        return view('employee.attendance', $data);
    }


    public function profile()
    {
        return view('employee.profile');
    }


    public function punchout()
    {
        $input = attendance::where('user_id', auth()->id())->latest()->first();
        $data = [
            'logout_time' => date('H:i:s')
        ];
        $input->update($data);
        return redirect()->route('attendance.time');
    }


    public function logout()
    {
        session()->flush();
        Auth::logout();

        return Redirect('/');
    }


    public function Verified($id)
    {
        $user = User::find($id);
        $data = [
            'verified_at' => now()
        ];
        $user->update($data);
        $details = [
            'title' => 'Congratulation, your account verified successfully',
            'employee' => [
                'first_name' =>$user->first_name,
                'employee_id' =>@$user->employee->employee_id,
                'email' => $user->email
            ],
        ];
        Mail::to('16103358@gmail.com')->send(new \App\Mail\employeeVerified($details));
        return back();
    }


    public function forgotpassword()
    {
        return view('auth.forgotpass');
    }


    public function getUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',

        ]);
        $user = User::where('email', $request->email)->first();
        $data = [
            'title' => 'Reset your Password',
            'user' => $user
        ];

        Mail::to('ebanking@gmail.com')->send(new \App\Mail\PasswordMail($data));
        return back()->with(['Success' => 'We will send a link to reset your password']);
    }


    public function newpass($id)
    {
        $employee = [
            'employee' => User::find($id)
        ];
        return view('employee.newpass', $employee);
    }


    public function passUpdate(Request $request, $id)
    {
        $employee = User::find($id);
        $request->validate([
            'new_password' => 'required|confirmed',
        ]);
        $data = [
            'password' => Hash::make($request->new_password)
        ];
        $employee->update($data);
        return redirect()->route('auth.login')->with(['Success' => 'Change your password Successfully']);
    }


    public function ChangePassword()
    {
        $data = [
            'user' => \auth()->user()
        ];
        return view('employee.changepassword', $data);
    }


    public function storepass(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);
        $user = \auth()->user();
        if (Hash::check($request->current_password, $user->password)) {
            $data = [
                'password' => Hash::make($request->new_password)
            ];
            $user->update($data);
            return redirect()->route('auth.login')->with(['Success' => 'Your password successfully Change']);
        }
        return back()->with(['error' => 'Your current password does not match']);
    }


}


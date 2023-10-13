<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\attendance;
use App\Models\Bank;
use App\Models\E_branch;
use App\Models\Employee;
use App\Models\Fund;
use App\Models\salary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function createBranch()
    {
        return view('employee.e_bank_branch');
    }

    public function editBank($id)
    {
        $data = [
            'bank' => Bank::find($id)
        ];
        return view('employee.editbank', $data);
    }


    public function BranchList()
    {
        $data = [
            'e_branches' => E_branch::all()
        ];
        return view('employee.branchlist', $data);
    }


    public function BankList()
    {
        $data = [
            'banks' => Bank::all()
        ];
        return view('employee.banklist', $data);
    }


    public function addBank()
    {
        return view('employee.createbank');
    }

    public function BankSave(Request $request)
    {
        $request->validate([
            'bank_name' => 'required',
            'branch' => 'required',
            'district' => 'required',
        ]);
        $input = [
            'bank_name' => $request->bank_name,
            'branch' => $request->branch,
            'district' => $request->district,
        ];
        $bank = Bank::create($input);
        return redirect()->route('bank.list');
    }

    public function bankUpdate(Request $request,$id)
    {
        $request->validate([
            'bank_name' => 'required',
            'branch' => 'required',
            'district' => 'required',
        ]);
        $input = [
            'bank_name' => $request->bank_name,
            'branch' => $request->branch,
            'district' => $request->district,
        ];
        $bank = Bank::find($id);
        $bank->update($input);
        return redirect()->route('bank.list');
    }

    public function branchSave(Request $request)
    {
        $request->validate([
            'branch' => 'required',
            'district' => 'required'
        ]);
        $input = [
            'branch' => $request->branch,
            'district' => $request->district
        ];
        $e_branch = E_branch::create($input);

        return redirect()->route('branch.list');
    }


    public function dashboard()
    {
        $data = [
            'total_employee' => User::where('user_type', 'employee')->count(),
            'total_user' => User::where('user_type', 'account holder')->count(),
            'pending_user' => User::where('user_type', 'account holder')->whereNull('verified_at')->count(),
        ];
        return view('dashboard.index', $data);
    }


    public function customerlist()
    {
        $data = [
            'users' => User::where('user_type', 'account holder')->whereNotNuLL('verified_at')->where('id', '!=', auth()->id())->get()
        ];
        return view('employee.employeelist', $data);
    }

    public function Request()
    {
        $data = [
            'users' => User::where('user_type', 'account holder')->whereNuLL('verified_at')->where('id', '!=', auth()->id())->get()
        ];
        return view('employee.employeelist', $data);
    }


    public function home()
    {
        return view('home.homepage');
    }


    public function add()
    {
        return view('employee.create');
    }


    public function store(UserStoreRequest $request)
    {

        $data = [
            'user_id' => $request->user_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'user_type' => $request->user_type
        ];
        $input = [
            'salary' => $request->salary,
            'designation' => $request->designation,
            'date_of_birth' => Carbon::parse($request->date_of_birth)->format('Y-m-d'),

        ];

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = $destinationPath . $profileImage;
        }
        $data['password'] = Hash::make($request->password);
        $users = User::create($data);
        $data['user_id'] = $users->id;
        $input['user_id'] = $users->id;
        $input['first_name'] = $users['first_name'];
        $input['employee_id'] = sprintf('%06d', $users->id);

        $employees = Employee::create($input);

        $details = [
            'title' => 'Now verified your email address',
            'employee' => $data
        ];
        Mail::to('ebanking@gmail.com')->send(new \App\Mail\employeeMail($details));

        return redirect()->route('employee.list');
    }


    public function view($id)
    {
        $data = [
            'users' => User::find($id)
        ];
        return view('employee.view', $data);
    }


    public function salarytable($user_id, $searchDate)
    {
        $data = [
            'user' => attendance::where('user_id', '=', $user_id)->whereYear('date', Carbon::parse($searchDate)->year)
                ->whereMonth('date', Carbon::parse($searchDate)->month)->latest()->get(),
            'month' => $searchDate,
            'salary' => salary::where('user_id', $user_id)->whereYear('date', Carbon::parse($searchDate)->year)
                ->whereMonth('date', Carbon::parse($searchDate)->month)->first(),
        ];

        return view('employee.salarylist', $data);
    }


    public function personalstatus()
    {
        return view('employee.personaldetails');
    }


    public function destroy($id)
    {
        User::destroy($id);
        return back();
    }

    public function delete($id)
    {
        Fund::destroy($id);
        return back();
    }


    public function profilefrom($id)
    {
        $data = [
            'users' => User::find($id)
        ];
        return view('employee.updateprofile', $data);
    }


    public function userUpdate(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = $destinationPath . $profileImage;
        }
        $user->update($data);
        return redirect()->route('user.profile', $user);
    }


    public function authProfile()
    {
        $data = [
            'users' => User::find(auth()->user()->id)
        ];
        return view('employee.profile', $data);
    }


    public function UserEmailVerification($user_id)
    {

        $input = User::find($user_id);
        $data = [
            'email_verification' => date('H:i:s')
        ];
        $input->update($data);
        return redirect()->route('auth.login')->with(['success' => 'Thank you, Wait for next update']);
    }


    public function unverifiedEmployee($id)
    {
        $user = User::find($id);
        $data = [
            'verified_at' => null
        ];
        $user->update($data);
        return back();
    }


    public function salarylist(Request $request)
    {
        $employees = Employee::all();
        $chackdate = salary::where('date', '=', Carbon::parse($request->date)->format('Y-m-d'))->first();
        $data = [
            'employees' => $employees,
            'inputDate' => $chackdate,
            'searchDate' => Carbon::parse($request->date)->format('Y-m')
        ];
        return view('employee.salary', $data);
    }


    public function salarystore(Request $request)
    {
        $start_date = Carbon::parse($request->date)->startOfMonth()->format('Y-m-d H:i:s');
        $end_date = Carbon::parse($request->date)->endOfMonth()->format('Y-m-d H:i:s');
        $employees = Employee::all();
        foreach ($employees as $employee) {
            $total_salary = $employee->salary;//30000
            $total_hour = 240;
            $per_hour_salary = $total_salary / $total_hour;//185.18518518518518518518518518519

            $total_time = 0;
            $attendances = attendance::where('user_id', $employee->user_id)->whereBetween('date', [$start_date, $end_date])->get();

            foreach ($attendances as $attendance) {
                if ($attendance->login_time && $attendance->logout_time) {
                    $total_time += \Carbon\Carbon::parse($attendance->login_time)->diffInSeconds($attendance->logout_time);
                }
            }
            $total_hour = floor($total_time / 3600);

            $total_salary = $total_hour * $per_hour_salary;

            $data = [
                'user_id' => $employee->user_id,
                'status' => 1,
                'date' => Carbon::parse($request->date)->format('Y-m-d'),
                'amount' => $total_salary
            ];
            salary::create($data);
        }
        return back()->with(['success' => 'Salary Generate Successful']);
    }


    public function details($id)
    {

        return view('employee.attendancedetails');
    }

}

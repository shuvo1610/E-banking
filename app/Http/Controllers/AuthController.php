<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->verified_at) {
                $is_login = Auth::attempt($credentials);
                if ($is_login) {
                    if (Auth::user()->user_type == 'admin') {
                        return redirect()->route('dashboard.index')->with(['Success' => 'You have Successfully login']);
                    }
                    else if (Auth::user()->user_type == 'employee') {
                        $input = attendance::where('user_id', auth()->id())->latest()->first();
                        if ($input && !$input->logout_time && Carbon::parse($input->login_time)->addHours(8)->format('H:i:s') >= Carbon::now())
                        {
                            $data = [
                                'logout_time' => Carbon::parse($input->login_time)->addHours(8)->format('H:i:s')
                            ];
                            $input->update($data);
                        }

                        return redirect()->route('dashboard.index')->with(['Success' => 'You have Successfully login']);
                    } else {
                        return redirect()->route('dashboard.ac_holder');
                    }
                }
                return redirect()->route('auth.login')->with(['error' => "Your Password Doesn't Match"]);
            }
            return redirect()->route('auth.login')->with(['error' => 'Your Account in not Verified']);
        }
        return redirect()->route('auth.login')->with(['error' => 'Oppes! You have entered invalid user']);
    }

}

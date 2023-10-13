<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function salaryAccount()
    {
        return view('home.salaryaccountfrom');
    }
}

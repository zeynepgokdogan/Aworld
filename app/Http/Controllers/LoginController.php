<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{

    public function loginpage()
    {
        return view('loginpage');
    }


    public function index()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;
            if ($usertype == 'admin') {
                return view('admin.adminhome');
            } else if ($usertype == 'user') {
                return view('user.userhome');
            }
        } else {
            return view('loginpage');
        }
    }
}

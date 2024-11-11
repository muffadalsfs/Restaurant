<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    function login(Request $request)
    {
        $email=$request->email;
        $password=$request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();

            return redirect('/customers');
        }
      dd('hello');
    }
    
    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

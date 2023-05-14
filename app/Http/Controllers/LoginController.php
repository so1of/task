<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $req){

        if (Auth::attempt($req->only('email' , 'password'),$req->boolean("remember"))){
        return redirect()->intended('/task');
        }

        $req->session()->regenerate();

        return back() -> withInput() -> withErrors([
            'email' => 'Введеные даные не верны'
        ]);
        
    }

    public function logout(Request $req){

        Auth::logout();

        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect()->route('login');

    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function login()
    {
        return view('Home.login');
    }

    public function authLogin(Request $request)
    {
        $credentials = $request->only('login', 'password');

        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors([
                'message' => 'Email ou mot de passe incorrects',
                "label" => "danger"
            ]);
        }
    }

    public function logout()
    {
        return redirect('/');
    }

    public function dashboard()
    {
        return view('Home.dashboard');
    }
}

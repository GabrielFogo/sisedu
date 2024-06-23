<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->role == 'aluno') {
                return redirect()->intended('/aluno/dashboardAluno');
            } elseif (auth()->user()->role == 'professor') {
                return redirect()->intended('/dashboard');
            }
        }
    }

    public function logout(){
        Auth::logout();
        redirect('/');
    }
}

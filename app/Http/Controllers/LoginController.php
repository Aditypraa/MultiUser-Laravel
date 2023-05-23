<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'operator') {
                return redirect('/admin/operator');
            } else if (Auth::user()->role == 'keuangan') {
                return redirect('/admin/keuangan');
            } else if (Auth::user()->role == 'marketing') {
                return redirect('/admin/marketing');
            }
        } else {
            return redirect('')->withErrors('Username Dan Password Salah')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('');
    }
}

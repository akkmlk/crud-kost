<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function get_login() {
        return view('login.login');
    }

    public function login(Request $request) {
        $request->validate([
            // 'email' => 'required|email:rfc,dns',
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
        ], [
            'email.required' => "Email Perlu Diisi",
            'email.email' => "Email harus berformat Email",
            'password.required' => "Password Perlu Diisi",
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials, $request->remember)) {
            if (Auth::viaRemember()) {
                if (Auth::user()->role == "admin") {
                    $request->session()->regenerate();
                    return redirect()->intended('/kamar')->with(['info' => "Berhasil Masuk"]);
                } elseif (Auth::user()->role == "staf") {
                    $request->session()->regenerate();
                    return redirect()->intended('/penghuni')->with(['info' => "Berhasil Masuk"]);
                }
            } else {
                if (Auth::user()->role == "admin") {
                    $request->session()->regenerate();
                    return redirect()->intended('/kamar')->with(['info' => "Berhasil Masuk"]);
                } elseif (Auth::user()->role == "staf") {
                    $request->session()->regenerate();
                    return redirect()->intended('/penghuni')->with(['info' => "Berhasil Masuk"]);
                }
                // return back()->with(['warning' => "Gagal Mengingat"]);
            }
        } else {
            return back()->with(['error' => "Email atau password kamu salah kali, ayo coba lagi..."]);
        }
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/login');
    }

    public function dashboard()
    {
        return view('main.dashboard');
    }
}

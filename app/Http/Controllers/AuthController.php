<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    // tampilan login
    public function login()
    {
        if ($user =
            Auth::user()
        ) {
            if ($user->role == 'admin') {
                return redirect()->intended('dashboard');
            } elseif ($user->role == 'guru') {
                return redirect()->intended('dashboard');
            } elseif ($user->role == 'siswa') {
                return redirect()->intended('dashboard');
            }else{
                return redirect()->intended('login');
            }
        }
        return view('backend.auth.login');
    }

    // proses login user
    public function prosesLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $kredensial = $request->only('username', 'password');
        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->intended('dashboard');
            } elseif ($user->role == 'siswa') {
                return redirect()->intended('dashboard');
            } elseif ($user->role == 'guru') {
                return redirect()->intended('dashboard');
            }else {
                return redirect()->intended('login');
            }
        }
    }
    //logout

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function create()
    {

    }

    public function login(LoginRequest $request)
    {
       
        $credentials = [
            'email' => $request->username,
            'password' => $request->password,
        ];
            
         // Cek kredensial menggunakan Laravel Auth
        if (Auth::attempt($credentials)) {
            // Jika login berhasil
            return redirect()->route('profile.index')->with('success', 'Login berhasil');
        }

        return back()->with('error', 'Email or Password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');

    }
}

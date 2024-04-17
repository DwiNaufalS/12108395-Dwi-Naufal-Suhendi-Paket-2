<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller

{
    public function index()
    {
        return view('auth.login');
    }
    
    public function proses_login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        $credential = $request->only('email', 'password');

        if (Auth::attempt($credential)) {
            $user =  Auth::user();
            if ($user->role == 'admin') {
                return redirect()->intended('/admin/dashboard/');
            }
            elseif ($user->role == 'petugas') {
                return redirect()->intended('/petugas/dashboard/');
            }
            return redirect()->intended('/');
        }

        return redirect('/')
            ->withInput()
            ->withErrors(['login_gagal' => 'These credentials does not match our records']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return Redirect('/login');
    }
}

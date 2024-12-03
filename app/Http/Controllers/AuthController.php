<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_user(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:35',
            'last_name' => 'required|string|max:50',
            'email_address' => 'required|email',
            'password' => 'required|min:8|max:12' 
        ]);
        
        $data['password'] = bcrypt($data['password']);

        User::create($data);
        return redirect()->route('login');

    }

    public function login_user(Request $request)
    {
        $credentials = $request->validate([
            'email_address' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'email_address' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
    
        request()->session()->regenerateToken();
    
        return redirect(route('login'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        if(auth()->check()) {
            $user = auth()->user();
            $redirectTo = $user->role === 'owner'
                ? route('dashboard')
                : route('tickets.index');

            return redirect()->intended($redirectTo);
        }

        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('id', 'password');
        
        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            
            $redirectTo = $user->role === 'owner'
            ? route('dashboard')
            : route('tickets.index');
            
            return redirect()->intended($redirectTo);
        }

        return back()->with('error', 'ID dan password tidak cocok')->withInput($request->only('id'));
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}

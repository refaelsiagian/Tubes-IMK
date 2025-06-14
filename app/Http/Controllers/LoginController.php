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

            // Cek status akun
            if ($user->status === 'inactive') {
                auth()->logout();
                return back()->with('error', 'Akun Anda tidak aktif. Silakan hubungi owner.');
            }

            if ($user->password_reset) {
                return redirect()->route('profile.change-password')->with('info', 'Silahkan ubah password terlebih dahulu');
            }

            $redirectTo = match ($user->role) {
                'owner' => route('dashboard'),
                'admin' => route('items.index'),
                'kasir' => route('tickets.index'),
                default => route('login'),
            };

            return redirect($redirectTo);

        }

        return back()->with('error', 'ID dan password tidak cocok')->withInput($request->only('id'));
    }


    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}

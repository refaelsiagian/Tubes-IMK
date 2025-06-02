<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangeEmailController extends Controller
{
    // Menampilkan form untuk input email lama
    public function showChangeEmailForm()
    {
        session()->forget('email_verified_step');
        
        return view('change-email');
    }

    // Proses verifikasi email lama
    public function verifyOldEmail(Request $request)
    {
        $request->validate([
            'email_lama' => ['required', 'email'],
        ]);

        $user = Auth::user();

        if ($request->email_lama !== $user->email) {
            return back()->withErrors(['email_lama' => 'Email yang kamu masukkan tidak sesuai dengan email akunmu saat ini.']);
        }

        // Tandai bahwa user sudah verifikasi email lama
        session(['email_verified_step' => true]);

        // Kalau email cocok, redirect ke halaman input email baru
        return redirect()->route('update-email.show');
    }
}

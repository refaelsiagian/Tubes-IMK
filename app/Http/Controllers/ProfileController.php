<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index',[
            'active' => 'profile'
        ]);
    }
    public function change_password()
    {
        return view('change-password');
    }

    public function update(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password_baru' => ['required', 'min:8',
                Password::min(8)
                    ->mixedCase() // Wajib ada huruf besar dan kecil
                    ->numbers()   // Wajib ada angka
            ],
            'password_konfirmasi' => 'required|same:password_baru',
        ]);

        $user = Auth::user();

        // Cek apakah password lama cocok
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'Password lama tidak sesuai.');
        }

        // Update password
        $user->password = Hash::make($request->password_baru);
        $user->password_reset = false;
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Password berhasil diubah.');
    }
}

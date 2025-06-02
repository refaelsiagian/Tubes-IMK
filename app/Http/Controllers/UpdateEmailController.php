<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyNewEmail;

class UpdateEmailController extends Controller
{
    // Tampilkan form input email baru
    public function showUpdateEmailForm()
    {
        if (!session('email_verified_step')) {
            return redirect()->route('change-email.show')->with('error', 'Silakan verifikasi email lamamu terlebih dahulu.');
        }

        return view('update-email');
    }

    // Proses update email baru dan kirim verifikasi
    public function updateEmail(Request $request)
    {
        $request->validate([
            'email_baru' => ['required', 'email', 'unique:users,email'],
        ]);

        $user = Auth::user();

        // Simpan email baru sementara di field lain, misal "pending_email"
        $user->pending_email = $request->email_baru;
        $user->email_verified_at = null; // Reset verifikasi
        $user->save();

        // Kirim email verifikasi ke email baru
        Mail::to($request->email_baru)->send(new VerifyNewEmail($user));

        // Hapus session agar harus verifikasi lagi kalau mau ubah email lagi
        session()->forget('email_verified_step');

        return redirect()->route('email-pending')->with('status', 'Email verifikasi sudah dikirim. Silakan cek inbox Anda.');
    }

    // Halaman info email pending
    public function emailPending()
    {
        return view('email-pending');
    }

    // Konfirmasi email baru setelah klik link
    public function verifyNewEmail(Request $request, $userId, $hash)
    {
        $user = \App\Models\User::findOrFail($userId);

        if (! hash_equals(sha1($user->pending_email), $hash)) {
            abort(403, 'Link verifikasi tidak valid.');
        }

        // Update email resmi
        $user->email = $user->pending_email;
        $user->pending_email = null;
        $user->email_verified_at = now();
        $user->save();

        return redirect()->route('profile.index')->with('status', 'Email berhasil diperbarui!');
    }

    // Kirim ulang email verifikasi
    public function resendEmail()
    {
        $user = Auth::user();

        if ($user->pending_email) {
            Mail::to($user->pending_email)->send(new VerifyNewEmail($user));
            return back()->with('status', 'Email verifikasi sudah dikirim ulang.');
        }

        return back()->with('error', 'Tidak ada email yang perlu diverifikasi.');
    }
}

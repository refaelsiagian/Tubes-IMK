<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function index()
    {

        $admins = User::whereNot('role', 'owner')
                    ->get();

        return view('dashboard.account',[
            'active' => 'account',
            'admins' => $admins,
            'new_id' => $this->generateNewUserId(),
            'page' => 'Data Admin - Shabrina'
        ]);
    }

    public function store(Request $request)
    { 
        dd($request->all());
        $newId = $this->generateNewUserId();

        // Generate random password (misalnya 8 karakter)
        $plainPassword = Str::random(8);

        // Simpan user baru dengan password di-hash
        $user = User::create([
            'id' => $newId,
            'name' => $request->name,
            'password' => bcrypt($plainPassword),
            'password_reset' => true,
            'role' => $request->role,
            'status' => 'active',
        ]);

        // Kirim plain password ke view agar bisa ditampilkan di modal
        return redirect()->back()->with([
            'success' => 'Akun baru berhasil ditambahkan.',
            'new_password' => $plainPassword,
            'new_name' => $request->name,
            'new_role' => $request->role,
            'new_id' => $newId,
            'title' => 'Akun Baru',
        ]);
    }


    // Fungsi untuk mengaktifkan akun
    public function activate($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'active';
        $user->save();

        return back()->with('success', 'Akun berhasil diaktifkan.');
    }

    // Fungsi untuk menonaktifkan akun
    public function deactivate($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'inactive';
        $user->save();

        return back()->with('success', 'Akun berhasil dinonaktifkan.');
    }

    // Fungsi untuk reset password
    public function resetPassword(Request $request)
    {
        $user = User::findOrFail($request->id);
        $newPassword = Str::random(8);
        $user->password = bcrypt($newPassword);
        $user->password_reset = true;
        $user->save();

        // Kirim password baru ke view lewat session (bisa ditampilkan di modal)
        return redirect()->back()->with([
            'success' => 'Password berhasil direset.',
            'new_password' => $newPassword,
            'new_name' => $user->name,
            'new_role' => $user->role,
            'new_id' => $user->id,
            'title' => 'Reset Password',
        ]);
    }

    private function generateNewUserId()
    {
        // Ambil ID terakhir dari user (urutan terbesar)
        $lastUser = User::where('id', 'like', 'R%')->orderBy('id', 'desc')->first();

        if (!$lastUser) {
            // Kalau belum ada user sama sekali, mulai dari R001
            return 'R001';
        }

        // Ambil angka dari ID terakhir, misalnya R003 -> 3
        $lastNumber = intval(substr($lastUser->id, 1));

        // Tambah 1 untuk ID baru
        $newNumber = $lastNumber + 1;

        // Format menjadi R + tiga digit angka (misalnya 4 jadi 004)
        return 'R' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    }

}

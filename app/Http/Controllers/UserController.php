<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // 1. Menampilkan semua akun user
    public function index()
    {
        // Ambil semua user beserta relasi role-nya, kecualikan super admin agar tidak terhapus sendiri
        $users = User::with('role')
                     ->whereHas('role', function($query) {
                         $query->where('role_code', '!=', 'AD'); // Sembunyikan role Admin
                     })
                     ->orderBy('created_on', 'desc')
                     ->get();

        return view('admin.users_management', compact('users'));
    }

    // 2. Logika Suspend / Cabut Izin Login Akun User
    public function toggleStatus($id)
    {
        $targetUser = User::findOrFail($id);
        
        $targetUser->update([
            'is_active' => !$targetUser->is_active,
            // Jika tabel user kamu tidak punya kolom modified_by, hapus baris di bawah ini
            // 'modified_by' => Auth::user()->username, 
        ]);

        $pesan = $targetUser->is_active 
            ? "Akun {$targetUser->username} berhasil diaktifkan kembali." 
            : "Akses login untuk {$targetUser->username} telah dicabut (Suspend).";

        return back()->with('success', $pesan);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Clinic; // Jangan lupa import model Clinic
use App\Models\User;   // Jangan lupa import model User

class DashboardController extends Controller
{
    // 1. Menampilkan Halaman Statistik Utama (Dashboard Baru)
    public function statistics()
    {
        $user = Auth::user()->load('admin');

        // Tarik Data Kartu Ringkasan (Summary Cards)
        $totalUsers = User::count();
        $totalClinics = Clinic::count();
        $totalPending = Clinic::where('status_verification', 'pending')->count();
        $totalApproved = Clinic::where('status_verification', 'approved')->count();

        // Tarik Data Grafik Komposisi Role (Mengelompokkan user berdasarkan id_role)
        $rolesCount = User::selectRaw('id_role, count(*) as total')
                          ->groupBy('id_role')
                          ->with('role')
                          ->get();

        $roleLabels = [];
        $roleData = [];
        foreach ($rolesCount as $rc) {
            $roleLabels[] = $rc->role ? $rc->role->role_name : 'Unknown';
            $roleData[] = $rc->total;
        }

        // Tarik Data Grafik Status Klinik
        $clinicStatusCount = Clinic::selectRaw('status_verification, count(*) as total')
                                   ->groupBy('status_verification')
                                   ->pluck('total', 'status_verification')
                                   ->toArray();

        $clinicLabels = ['Disetujui', 'Menunggu', 'Ditolak'];
        $clinicData = [
            $clinicStatusCount['approved'] ?? 0,
            $clinicStatusCount['pending'] ?? 0,
            $clinicStatusCount['rejected'] ?? 0,
        ];

        return view('admin.statistics', compact(
            'user', 'totalUsers', 'totalClinics', 'totalPending', 'totalApproved',
            'roleLabels', 'roleData', 'clinicLabels', 'clinicData'
        ));
    }

    // 2. Menampilkan Halaman Daftar Klinik Pending (Fungsi Lama)
    public function index()
    {
        $user = Auth::user()->load('admin');
        
        $pendingClinics = Clinic::where('status_verification', 'pending')
                                ->orderBy('created_on', 'desc')
                                ->get();

        // Ubah rute view ke nama file yang baru kita ubah
        return view('admin.clinic_pending', compact('user', 'pendingClinics'));
    }

    public function showClinic($id)
    {
        $clinic = Clinic::with('documents')->findOrFail($id);
        
        // UBAH JADI 'admin.clinic_detail'
        return view('admin.clinic_detail', compact('clinic'));
    }

    // 2. Logika menyetujui klinik
    public function approveClinic(Request $request, $id)
    {
        $clinic = Clinic::findOrFail($id);
        $clinic->update([
            'status_verification' => 'approved',
            'reviewed_by' => Auth::user()->id_user,
            'reviewed_on' => now(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Klinik berhasil disetujui!');
    }

    // 3. Logika menolak klinik
    public function rejectClinic(Request $request, $id)
    {
        $request->validate(['rejection_reason' => 'required|string']);

        $clinic = Clinic::findOrFail($id);
        $clinic->update([
            'status_verification' => 'rejected',
            'is_active' => false, // Nonaktifkan klinik yang ditolak
            'rejection_reason' => $request->rejection_reason,
            'reviewed_by' => Auth::user()->id_user,
            'reviewed_on' => now(),
        ]);

        return redirect()->route('dashboard')->with('error', 'Klinik telah ditolak.');
    }

    // Menampilkan riwayat klinik yang sudah diproses (Approved / Rejected)
    public function history()
    {
        $user = Auth::user()->load('admin');
        
        // Ambil klinik yang statusnya bukan pending
        $clinics = Clinic::whereIn('status_verification', ['approved', 'rejected'])
                         ->orderBy('reviewed_on', 'desc')
                         ->get();

        return view('admin.clinic_history', compact('user', 'clinics'));
    }

    // 4. Logika untuk Mengaktifkan / Menonaktifkan Klinik (Suspend)
    public function toggleStatus(Request $request, $id)
    {
        $clinic = Clinic::findOrFail($id);
        
        // Balikkan status is_active (jika true jadi false, jika false jadi true)
        $clinic->update([
            'is_active' => !$clinic->is_active,
            'modified_by' => Auth::user()->id_user,
            'modified_on' => now(),
        ]);

        $pesan = $clinic->is_active ? 'Klinik berhasil DIAKTIFKAN kembali.' : 'Klinik berhasil DINONAKTIFKAN (Suspend).';
        return back()->with('success', $pesan);
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Booking;

class FinanceController extends Controller
{
    public function index(Request $request)
    {
        $month = $request->input('month', Carbon::now()->month);
        $year = $request->input('year', Carbon::now()->year);

        // 1. ELOQUENT QUERY
        $bookings = Booking::with(['clinic', 'invoiceItems']) 
            ->whereIn('status', ['paid_2', 'completed'])
            ->whereMonth('date_time', $month)
            ->whereYear('date_time', $year)
            ->get();

        // 2. KALKULASI REVENUE UTAMA
        $totalRevenue = $bookings->sum('total_price');
        $totalTransactions = $bookings->count();

        // 3. 🌟 HITUNG FEE PLATFORM (HANYA DARI ITEM "FEE BOOKING")
        $platformFee = 0;
        foreach ($bookings as $booking) {
            $feeBookingAmount = $booking->invoiceItems
                ->where('payment_phase', 'payment_1')
                ->filter(function ($item) {
                    // Cek apakah nama item mengandung kata "booking" (case-insensitive)
                    // ⚠️ PENTING: Sesuaikan kata 'booking' ini dengan teks baku yang kamu
                    // gunakan saat insert item_name ke tabel booking_invoice_item!
                    $itemName = strtolower($item->item_name);
                    return str_contains($itemName, 'booking') || str_contains($itemName, 'jasa aplikasi');
                })
                ->sum('amount');
                
            $platformFee += $feeBookingAmount;
        }

        // 4. OLAH DATA GRAFIK HARIAN
        $daysInMonth = Carbon::createFromDate($year, $month)->daysInMonth;
        $dailyRevenue = array_fill(1, $daysInMonth, 0);

        foreach ($bookings as $booking) {
            $day = Carbon::parse($booking->date_time)->day;
            $dailyRevenue[$day] += $booking->total_price;
        }

        // 5. OLAH DATA TOP 5 KLINIK
        $topClinics = $bookings->groupBy(function($booking) {
                return $booking->clinic ? $booking->clinic->name : 'Klinik Tidak Diketahui';
            })
            ->map(function ($items, $clinicName) {
                return [
                    'name' => $clinicName,
                    'revenue' => $items->sum('total_price')
                ];
            })
            ->sortByDesc('revenue')
            ->take(5)
            ->values();

        return view('admin.finance', compact(
            'totalRevenue', 
            'totalTransactions', 
            'platformFee', 
            'dailyRevenue', 
            'topClinics',
            'month',
            'year'
        ));
    }
}
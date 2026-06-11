@extends('layouts.app') @section('title', 'Monitor Keuangan')

@section('content')
<div class="flex justify-end items-center mb-6">
    <div class="bg-surface p-2 rounded-xl shadow-sm border border-gray-100 flex items-center">
        <i class="fa-solid fa-calendar-days text-primary ml-3 mr-2"></i>
        <form method="GET" action="{{ route('finance.index') }}" class="m-0">
            <select name="month" class="bg-transparent border-none text-gray-700 font-semibold focus:ring-0 cursor-pointer outline-none" onchange="this.form.submit()">
                @php
                    $namaBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                @endphp
                @for($m = 1; $m <= 12; $m++)
                    <option value="{{ $m }}" {{ $month == $m ? 'selected' : '' }}>
                        {{ $namaBulan[$m - 1] }} {{ $year }}
                    </option>
                @endfor
            </select>
        </form>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="glass-card rounded-2xl p-6 text-white relative overflow-hidden">
        <div class="relative z-10">
            <p class="text-xs font-semibold text-white/80 uppercase tracking-widest mb-1">Total Pendapatan Platform</p>
            <h3 class="text-3xl font-bold">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h3>
        </div>
        <i class="fa-solid fa-wallet absolute -bottom-6 -right-6 text-white/10 text-9xl"></i>
    </div>

    <div class="bg-gradient-to-br from-success to-teal-700 rounded-2xl p-6 text-white relative overflow-hidden shadow-lg shadow-success/20">
        <div class="relative z-10">
            <p class="text-xs font-semibold text-white/80 uppercase tracking-widest mb-1">Fee Platform (Dari Fee Booking)</p>
            <h3 class="text-3xl font-bold">Rp {{ number_format($platformFee, 0, ',', '.') }}</h3>
        </div>
        <i class="fa-solid fa-hand-holding-dollar absolute -bottom-4 -right-4 text-white/10 text-8xl"></i>
    </div>

    <div class="bg-gradient-to-br from-accent to-blue-500 rounded-2xl p-6 text-white relative overflow-hidden shadow-lg shadow-accent/20">
        <div class="relative z-10">
            <p class="text-xs font-semibold text-white/80 uppercase tracking-widest mb-1">Total Transaksi Selesai</p>
            <h3 class="text-3xl font-bold">{{ number_format($totalTransactions, 0, ',', '.') }} <span class="text-lg font-medium text-white/80">Booking</span></h3>
        </div>
        <i class="fa-solid fa-clipboard-check absolute -bottom-4 -right-4 text-white/10 text-8xl"></i>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    
    <div class="lg:col-span-2 bg-surface rounded-2xl shadow-[4px_4px_24px_rgba(0,0,0,0.02)] border border-gray-100 flex flex-col overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-50 flex justify-between items-center">
            <h3 class="font-bold text-gray-800 text-lg">Grafik Pendapatan Harian</h3>
            <span class="text-xs font-semibold px-3 py-1 bg-primary/10 text-primary rounded-full">Bulan Ini</span>
        </div>
        <div class="p-6 flex-1">
            <div class="relative h-[300px] w-full">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>
    </div>

    <div class="bg-surface rounded-2xl shadow-[4px_4px_24px_rgba(0,0,0,0.02)] border border-gray-100 flex flex-col overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-50">
            <h3 class="font-bold text-gray-800 text-lg">Top 5 Klinik Terlaris</h3>
        </div>
        <div class="p-0 flex-1 overflow-y-auto">
            <ul class="divide-y divide-gray-50">
                @forelse ($topClinics as $index => $clinic)
                    <li class="px-6 py-4 flex justify-between items-center hover:bg-gray-50 transition duration-200">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm {{ $index == 0 ? 'bg-warning/20 text-warning' : 'bg-gray-100 text-gray-500' }}">
                                #{{ $index + 1 }}
                            </div>
                            <span class="font-semibold text-gray-700 truncate w-32" title="{{ $clinic['name'] }}">{{ $clinic['name'] }}</span>
                        </div>
                        <span class="text-success font-bold text-sm">
                            Rp {{ number_format($clinic['revenue'], 0, ',', '.') }}
                        </span>
                    </li>
                @empty
                    <li class="px-6 py-10 text-center flex flex-col items-center">
                        <i class="fa-solid fa-box-open text-4xl text-gray-300 mb-3"></i>
                        <p class="text-gray-400 font-medium text-sm">Belum ada transaksi lunas di bulan ini.</p>
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('revenueChart').getContext('2d');
        
        // Data dari Controller PHP
        const dailyData = @json(array_values($dailyRevenue));
        const labels = @json(array_keys($dailyRevenue));
        const currentMonth = "{{ $month }}";

        new Chart(ctx, {
            type: 'line', 
            data: {
                labels: labels.map(day => day + '/' + currentMonth),
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: dailyData,
                    borderColor: '#087C91', // Menggunakan warna primary Tailwind kamu
                    backgroundColor: 'rgba(8, 124, 145, 0.15)', // Warna primary tembus pandang
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4, // Melengkung halus
                    pointBackgroundColor: '#FFFFFF',
                    pointBorderColor: '#087C91',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    x: {
                        grid: { display: false, drawBorder: false }
                    },
                    y: {
                        beginAtZero: true,
                        grid: { borderDash: [5, 5], color: '#f1f5f9', drawBorder: false },
                        ticks: {
                            callback: function(value) {
                                if(value >= 1000000) return 'Rp ' + (value / 1000000) + ' Jt';
                                return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                            }
                        }
                    }
                },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#141A1D',
                        padding: 12,
                        titleFont: { family: 'Poppins', size: 13 },
                        bodyFont: { family: 'Poppins', size: 14, weight: 'bold' },
                        callbacks: {
                            label: function(context) {
                                return ' Pendapatan: Rp ' + new Intl.NumberFormat('id-ID').format(context.raw);
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endpush
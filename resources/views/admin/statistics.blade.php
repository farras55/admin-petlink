@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="glass-card rounded-3xl p-8 mb-10 flex items-center justify-between text-white relative overflow-hidden">
    <div class="relative z-10">
        <h2 class="text-3xl font-bold mb-2">Selamat datang kembali, {{ Auth::user()->admin->name ?? Auth::user()->username }}! 👋</h2>
        <p class="text-accent text-sm md:text-base font-medium">Berikut adalah ringkasan performa platform PetLink hari ini.</p>
    </div>
    <div class="hidden md:block absolute right-10 -bottom-10 opacity-20 transform rotate-12">
        <i class="fa-solid fa-shield-cat text-9xl"></i>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <div class="bg-surface rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 group hover:-translate-y-1">
        <div class="flex justify-between items-start mb-4">
            <div class="w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center text-blue-500 group-hover:scale-110 transition-transform">
                <i class="fa-solid fa-users text-2xl"></i>
            </div>
        </div>
        <h3 class="text-gray-400 text-sm font-semibold mb-1 uppercase tracking-wider">Total Pengguna</h3>
        <h4 class="text-4xl font-bold text-gray-800">{{ $totalUsers }}</h4>
    </div>

    <div class="bg-surface rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 group hover:-translate-y-1">
        <div class="flex justify-between items-start mb-4">
            <div class="w-14 h-14 rounded-2xl bg-purple-50 flex items-center justify-center text-purple-500 group-hover:scale-110 transition-transform">
                <i class="fa-solid fa-house-medical text-2xl"></i>
            </div>
        </div>
        <h3 class="text-gray-400 text-sm font-semibold mb-1 uppercase tracking-wider">Total Klinik</h3>
        <h4 class="text-4xl font-bold text-gray-800">{{ $totalClinics }}</h4>
    </div>

    <div class="bg-surface rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 group hover:-translate-y-1 relative overflow-hidden">
        <div class="absolute right-0 top-0 w-2 h-full bg-success"></div>
        <div class="flex justify-between items-start mb-4">
            <div class="w-14 h-14 rounded-2xl bg-green-50 flex items-center justify-center text-success group-hover:scale-110 transition-transform">
                <i class="fa-solid fa-circle-check text-2xl"></i>
            </div>
            <span class="bg-green-100 text-success text-xs font-bold px-3 py-1 rounded-full">Aktif</span>
        </div>
        <h3 class="text-gray-400 text-sm font-semibold mb-1 uppercase tracking-wider">Klinik Disetujui</h3>
        <h4 class="text-4xl font-bold text-gray-800">{{ $totalApproved }}</h4>
    </div>

    <div class="bg-surface rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 group hover:-translate-y-1 relative overflow-hidden">
        <div class="absolute right-0 top-0 w-2 h-full bg-warning"></div>
        <div class="flex justify-between items-start mb-4">
            <div class="w-14 h-14 rounded-2xl bg-orange-50 flex items-center justify-center text-warning group-hover:scale-110 transition-transform">
                <i class="fa-solid fa-clock-rotate-left text-2xl"></i>
            </div>
            <span class="bg-orange-100 text-warning text-xs font-bold px-3 py-1 rounded-full animate-pulse">Pending Action</span>
        </div>
        <h3 class="text-gray-400 text-sm font-semibold mb-1 uppercase tracking-wider">Butuh Verifikasi</h3>
        <h4 class="text-4xl font-bold text-gray-800">{{ $totalPending }}</h4>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    
    <div class="bg-surface rounded-3xl p-8 shadow-sm border border-gray-100">
        <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
            <i class="fa-solid fa-chart-pie text-primary mr-3 bg-primary/10 p-2 rounded-lg"></i> Komposisi Pengguna
        </h3>
        <div class="relative h-72 w-full flex justify-center">
            <canvas id="roleChart"></canvas>
        </div>
    </div>

    <div class="bg-surface rounded-3xl p-8 shadow-sm border border-gray-100">
        <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
            <i class="fa-solid fa-chart-column text-primary mr-3 bg-primary/10 p-2 rounded-lg"></i> Status Pendaftaran Klinik
        </h3>
        <div class="relative h-72 w-full flex justify-center">
            <canvas id="clinicChart"></canvas>
        </div>
    </div>

</div>

<script>
    const roleLabels = {!! json_encode($roleLabels) !!};
    const roleData = {!! json_encode($roleData) !!};
    const clinicLabels = {!! json_encode($clinicLabels) !!};
    const clinicData = {!! json_encode($clinicData) !!};

    Chart.defaults.font.family = "'Poppins', sans-serif";
    Chart.defaults.color = '#94a3b8';

    // Doughnut Chart
    new Chart(document.getElementById('roleChart').getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: roleLabels,
            datasets: [{
                data: roleData,
                backgroundColor: ['#087C91', '#7EC8E3', '#F4A261', '#E63946', '#2A9D8F'],
                borderWidth: 4,
                borderColor: '#ffffff',
                hoverOffset: 8
            }]
        },
        options: { 
            responsive: true, 
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: { position: 'bottom', labels: { padding: 20, usePointStyle: true, pointStyle: 'circle' } }
            }
        }
    });

    // Bar Chart
    new Chart(document.getElementById('clinicChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: clinicLabels,
            datasets: [{
                label: 'Jumlah Klinik',
                data: clinicData,
                backgroundColor: ['#2A9D8F', '#F4A261', '#E63946'],
                borderRadius: 8,
                barThickness: 40
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: { beginAtZero: true, border: { display: false }, grid: { color: '#f1f5f9', drawTicks: false }, ticks: { stepSize: 1, padding: 10 } },
                x: { border: { display: false }, grid: { display: false } }
            },
            plugins: { legend: { display: false } }
        }
    });
</script>
@endsection
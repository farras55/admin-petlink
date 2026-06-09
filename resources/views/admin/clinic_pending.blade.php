@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8">
    <h3 class="text-2xl font-bold text-gray-800">Selamat datang, {{ $user->admin->name ?? 'Admin' }}!</h3>
    <p class="text-gray-500 mt-1">Panel ini digunakan untuk memantau dan memverifikasi mitra klinik PetLink.</p>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
        <h3 class="text-lg font-bold text-primary">Daftar Klinik Pending (Menunggu Verifikasi)</h3>
    </div>
    
    <div class="p-6">
        @if($pendingClinics->isEmpty())
            <div class="text-center py-8">
                <p class="text-gray-500 italic">Saat ini tidak ada pendaftaran klinik baru.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-600 text-sm uppercase tracking-wider border-b-2 border-gray-200">
                            <th class="p-4 font-semibold">Ref ID</th>
                            <th class="p-4 font-semibold">Nama Klinik</th>
                            <th class="p-4 font-semibold">Kontak</th>
                            <th class="p-4 font-semibold">Alamat</th>
                            <th class="p-4 font-semibold">Tanggal Daftar</th>
                            <th class="p-4 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($pendingClinics as $clinic)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                            <td class="p-4">
                                <span class="bg-accent bg-opacity-20 text-primary px-2 py-1 rounded text-xs font-bold">
                                    PET-{{ str_pad($clinic->id_clinic, 6, '0', STR_PAD_LEFT) }}
                                </span>
                            </td>
                            <td class="p-4 font-bold">{{ $clinic->name }}</td>
                            <td class="p-4">{{ $clinic->phone }}</td>
                            <td class="p-4 text-sm">{{ strlen($clinic->address) > 40 ? substr($clinic->address, 0, 40) . '...' : $clinic->address }}</td>
                            <td class="p-4 text-sm">{{ \Carbon\Carbon::parse($clinic->created_on)->format('d M Y, H:i') }}</td>
                            <td class="p-4 text-center">
                                <a href="{{ route('clinic.detail', $clinic->id_clinic) }}" 
                                   class="inline-block bg-primary hover:bg-primaryDark text-white text-sm font-semibold px-4 py-2 rounded-lg shadow transition">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
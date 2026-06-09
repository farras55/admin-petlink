@extends('layouts.app')

@section('title', 'Riwayat Klinik')

@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Manajemen & Riwayat Klinik</h2>
    <p class="text-gray-500 mt-1">Daftar semua klinik yang telah disetujui atau ditolak.</p>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6">
        @if($clinics->isEmpty())
            <div class="text-center py-8">
                <p class="text-gray-500 italic">Belum ada data riwayat klinik saat ini.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-600 text-sm uppercase tracking-wider border-b-2 border-gray-200">
                            <th class="p-4 font-semibold">Ref ID</th>
                            <th class="p-4 font-semibold">Nama Klinik</th>
                            <th class="p-4 font-semibold">Kontak</th>
                            <th class="p-4 font-semibold">Status</th>
                            <th class="p-4 font-semibold">Tgl Peninjauan</th>
                            <th class="p-4 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($clinics as $clinic)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                            <td class="p-4">
                                <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs font-bold border border-gray-200">
                                    PET-{{ str_pad($clinic->id_clinic, 6, '0', STR_PAD_LEFT) }}
                                </span>
                            </td>
                            <td class="p-4 font-bold">{{ $clinic->name }}</td>
                            <td class="p-4">{{ $clinic->phone }}</td>
                            <td class="p-4">
                                @if($clinic->status_verification === 'approved')
                                    <span class="bg-successLight text-green-800 px-3 py-1 rounded-full text-xs font-bold border border-green-200">
                                        Disetujui
                                    </span>
                                @else
                                    <span class="bg-dangerLight text-red-800 px-3 py-1 rounded-full text-xs font-bold border border-red-200">
                                        Ditolak
                                    </span>
                                @endif
                            </td>
                            <td class="p-4 text-sm">{{ \Carbon\Carbon::parse($clinic->reviewed_on)->format('d M Y, H:i') }}</td>
                            <td class="p-4 text-center">
                                <a href="{{ route('clinic.detail', $clinic->id_clinic) }}" 
                                   class="inline-block bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 text-sm font-semibold px-4 py-2 rounded-lg shadow-sm transition">
                                    Lihat Detail
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
@extends('layouts.app')

@section('title', 'Verifikasi ' . $clinic->name)

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-gray-800">Detail Klinik: <span class="text-primary">{{ $clinic->name }}</span></h2>
    
    <a href="{{ $clinic->status_verification === 'pending' ? route('clinic.pending') : route('clinic.history') }}" 
       class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-sm transition">
        &larr; Kembali
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8">
    <h3 class="text-lg font-bold text-primary mb-4 border-b pb-2">Informasi Klinik</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div><span class="block text-sm text-gray-500">Ref ID</span><p class="font-bold">PET-{{ str_pad($clinic->id_clinic, 6, '0', STR_PAD_LEFT) }}</p></div>
        <div><span class="block text-sm text-gray-500">Tanggal Pendaftaran</span><p class="font-bold">{{ \Carbon\Carbon::parse($clinic->created_on)->format('d M Y H:i') }}</p></div>
        <div><span class="block text-sm text-gray-500">Telepon</span><p class="font-bold">{{ $clinic->phone }}</p></div>
        <div class="md:col-span-2"><span class="block text-sm text-gray-500">Alamat Lengkap</span><p class="font-bold">{{ $clinic->address }}</p></div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8">
    <h3 class="text-lg font-bold text-primary mb-4 border-b pb-2">Dokumen Legalitas</h3>
    @if($clinic->documents->isEmpty())
        <div class="bg-dangerLight text-danger p-4 rounded-lg border border-red-200 font-semibold">Klinik ini belum mengunggah dokumen legalitas apa pun!</div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($clinic->documents as $doc)
                @php
                    $extension = strtolower(pathinfo($doc->document_url, PATHINFO_EXTENSION));
                    $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'webp']);
                    $isPdf = $extension === 'pdf';
                @endphp
                <div class="border border-gray-200 rounded-lg p-4 flex flex-col justify-between bg-gray-50">
                    <div class="mb-3 flex justify-between items-center">
                        <span class="font-bold text-gray-700">{{ strtoupper(str_replace('_', ' ', $doc->document_type)) }}</span>
                        <a href="{{ $doc->document_url }}" target="_blank" class="text-primary text-sm hover:underline font-semibold">Buka Asli</a>
                    </div>
                    <div>
                        @if($isImage)
                            <img src="{{ $doc->document_url }}" class="w-full h-48 object-cover rounded border border-gray-300">
                        @elseif($isPdf)
                            <iframe src="{{ $doc->document_url }}" class="w-full h-48 border border-gray-300 rounded bg-white"></iframe>
                        @else
                            <div class="h-48 flex items-center justify-center bg-gray-200 rounded text-gray-500 text-sm text-center px-4">
                                File {{ strtoupper($extension) }} <br> (Format tidak mendukung preview)
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    
    @if($clinic->status_verification === 'pending')
        <div class="bg-white rounded-xl shadow-sm border border-green-200 p-6">
            <h3 class="text-xl font-bold text-success mb-2">Setujui Pendaftaran</h3>
            <p class="text-gray-500 text-sm mb-4">Klinik akan otomatis aktif di aplikasi PetLink.</p>
            <form action="{{ route('clinic.approve', $clinic->id_clinic) }}" method="POST" onsubmit="return confirm('Yakin menyetujui klinik ini?');">
                @csrf
                <button type="submit" class="w-full bg-success hover:bg-green-700 text-white font-bold py-3 rounded-lg transition shadow">Setujui Klinik</button>
            </form>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-red-200 p-6">
            <h3 class="text-xl font-bold text-danger mb-2">Tolak Pendaftaran</h3>
            <p class="text-gray-500 text-sm mb-4">Wajib sertakan alasan agar pemilik klinik bisa memperbaikinya.</p>
            <form action="{{ route('clinic.reject', $clinic->id_clinic) }}" method="POST" onsubmit="return confirm('Yakin menolak klinik ini?');">
                @csrf
                <textarea name="rejection_reason" rows="2" required placeholder="Contoh: KTP buram, NIB tidak valid..." 
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-danger focus:border-danger outline-none mb-4 resize-none"></textarea>
                <button type="submit" class="w-full bg-danger hover:bg-red-800 text-white font-bold py-3 rounded-lg transition shadow">Tolak Klinik</button>
            </form>
        </div>

    @elseif($clinic->status_verification === 'approved')
        <div class="bg-white rounded-xl shadow-sm border {{ $clinic->is_active ? 'border-red-200' : 'border-green-200' }} p-6 md:col-span-2 flex justify-between items-center">
            <div>
                <h3 class="text-xl font-bold {{ $clinic->is_active ? 'text-danger' : 'text-success' }} mb-1">
                    {{ $clinic->is_active ? 'Nonaktifkan Klinik (Suspend)' : 'Aktifkan Kembali Klinik' }}
                </h3>
                <p class="text-gray-500 text-sm">
                    Status saat ini: 
                    <span class="font-bold {{ $clinic->is_active ? 'text-success' : 'text-danger' }}">
                        {{ $clinic->is_active ? 'AKTIF' : 'DIBEKUKAN' }}
                    </span>. 
                    {{ $clinic->is_active ? 'Klinik yang dinonaktifkan tidak akan bisa login ke aplikasi.' : 'Klinik akan dipulihkan dan bisa beroperasi kembali.' }}
                </p>
            </div>
            
            <form action="{{ route('clinic.toggle_status', $clinic->id_clinic) }}" method="POST" onsubmit="return confirm('Yakin ingin mengubah status operasional klinik ini?');">
                @csrf
                <button type="submit" class="font-bold py-3 px-6 rounded-lg transition shadow text-white {{ $clinic->is_active ? 'bg-danger hover:bg-red-800' : 'bg-success hover:bg-green-700' }}">
                    {{ $clinic->is_active ? 'Cabut Izin (Nonaktifkan)' : 'Pulihkan Izin (Aktifkan)' }}
                </button>
            </form>
        </div>
    @else
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 md:col-span-2">
            <h3 class="text-xl font-bold text-gray-700 mb-2">Klinik Telah Ditolak</h3>
            <p class="text-gray-500 text-sm">Alasan penolakan: <strong class="text-danger">{{ $clinic->rejection_reason }}</strong></p>
            <p class="text-gray-400 text-xs mt-2">Ditinjau pada: {{ \Carbon\Carbon::parse($clinic->reviewed_on)->format('d M Y H:i') }}</p>
        </div>
    @endif

</div>
@endsection
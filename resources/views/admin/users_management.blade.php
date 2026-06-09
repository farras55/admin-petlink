@extends('layouts.app')

@section('title', 'Manajemen Akun')

@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Manajemen Akun Pengguna</h2>
    <p class="text-gray-500 mt-1">Pantau dan kelola akses login untuk PetOwner, Klinik, dan Dokter Hewan.</p>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6">
        @if($users->isEmpty())
            <div class="text-center py-8">
                <p class="text-gray-500 italic">Belum ada pengguna terdaftar.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-600 text-sm uppercase tracking-wider border-b-2 border-gray-200">
                            <th class="p-4 font-semibold">Username</th>
                            <th class="p-4 font-semibold">Email</th>
                            <th class="p-4 font-semibold">Tipe Akun (Role)</th>
                            <th class="p-4 font-semibold">Status Login</th>
                            <th class="p-4 font-semibold text-center">Aksi (Cabut Akses)</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($users as $u)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                            <td class="p-4 font-bold">{{ $u->username }}</td>
                            <td class="p-4">{{ $u->email }}</td>
                            <td class="p-4">
                                <span class="bg-accent bg-opacity-20 text-primary px-3 py-1 rounded-full text-xs font-bold border border-blue-200">
                                    {{ $u->role->role_name ?? $u->role->role_code ?? 'Unknown' }}
                                </span>
                            </td>
                            <td class="p-4">
                                @if($u->is_active)
                                    <span class="text-success font-bold text-sm flex items-center gap-1">
                                        <div class="w-2 h-2 rounded-full bg-success"></div> Aktif
                                    </span>
                                @else
                                    <span class="text-danger font-bold text-sm flex items-center gap-1">
                                        <div class="w-2 h-2 rounded-full bg-danger"></div> Dibekukan
                                    </span>
                                @endif
                            </td>
                            <td class="p-4 text-center">
                                <form action="{{ route('users.toggle_status', $u->id_user) }}" method="POST" onsubmit="return confirm('Yakin ingin mengubah status izin login akun ini?');">
                                    @csrf
                                    <button type="submit" class="inline-block text-sm font-semibold px-4 py-2 rounded-lg shadow transition text-white {{ $u->is_active ? 'bg-danger hover:bg-red-800' : 'bg-gray-500 hover:bg-gray-600' }}">
                                        {{ $u->is_active ? 'Suspend' : 'Pulihkan' }}
                                    </button>
                                </form>
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
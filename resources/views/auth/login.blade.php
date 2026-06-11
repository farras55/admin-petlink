@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="fixed inset-0 z-50 flex flex-col md:flex-row min-h-screen w-full bg-white overflow-y-auto">
    
    <div class="w-full md:w-1/2 h-72 sm:h-96 md:h-auto bg-cover bg-center relative flex flex-col justify-end p-6 sm:p-10 md:p-12 lg:p-16" 
         style="background-image: url('{{ asset('images/background-login.png') }}');">
        
        <div class="absolute inset-0 bg-[#3a6e7c] bg-opacity-40 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#2c5865] via-[#2c5865]/50 to-transparent"></div>

        <div class="relative z-10 text-white">
            <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold leading-tight mb-2 md:mb-4">
                Berikan kenyamanan<br class="hidden sm:inline">
                terbaik untuk sahabat setia<br class="hidden sm:inline">
                Anda.
            </h1>
            <p class="text-xs sm:text-sm md:text-base lg:text-lg text-gray-100 font-light max-w-md">
                Sistem manajemen administrasi hewan peliharaan yang profesional, tenang, dan terorganisir.
            </p>
        </div>
    </div>

    <div class="w-full md:w-1/2 flex flex-col justify-center items-center px-6 py-8 sm:px-12 md:px-12 lg:px-16 min-h-[500px]">
        <div class="w-full max-w-md">
            
            <div class="flex justify-center mb-6 md:mb-8">
                <img src="{{ asset('images/logo.png') }}" alt="PetLink Logo" class="h-16 sm:h-20 md:h-24 object-contain">
            </div>

            <div class="mb-6 md:mb-8 text-center md:text-left">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-1 md:mb-2">Masuk ke Akun Anda</h2>
                <p class="text-xs sm:text-sm text-gray-500">Selamat datang kembali di PetLink.</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 text-red-600 p-3 rounded-lg mb-6 text-sm border border-red-200">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST" class="space-y-5 md:space-y-6">
                @csrf
                
                <div>
                    <label for="login_id" class="block text-sm font-semibold text-gray-700 mb-2">Email atau Username</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        <input type="text" id="login_id" name="login_id" value="{{ old('login_id') }}" required autofocus
                            class="w-full pl-11 pr-4 py-2.5 sm:py-3 bg-[#f8fafc] border border-gray-200 rounded-lg focus:ring-[#076a82] focus:border-[#076a82] focus:bg-white outline-none transition text-sm"
                            placeholder="nama@email.com">
                    </div>
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block text-sm font-semibold text-gray-700">Kata Sandi</label>
                        <a href="#" class="text-xs sm:text-sm text-[#076a82] hover:text-[#044c5e] font-medium transition">Lupa Kata Sandi?</a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </div>
                        <input type="password" id="password" name="password" required
                            class="w-full pl-11 pr-4 py-2.5 sm:py-3 bg-[#f8fafc] border border-gray-200 rounded-lg focus:ring-[#076a82] focus:border-[#076a82] focus:bg-white outline-none transition text-sm"
                            placeholder="••••••••">
                    </div>
                </div>

                <button type="submit" class="w-full flex justify-center items-center bg-[#076a82] hover:bg-[#044c5e] text-white font-medium py-3 sm:py-3.5 px-4 rounded-lg transition duration-200 mt-2 text-sm sm:text-base">
                    Masuk
                    <svg class="ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - PetLink Admin</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Poppins', 'sans-serif'] },
                    colors: {
                        primary: '#087C91', primaryDark: '#065b6b', accent: '#7EC8E3',
                        background: '#F8FAFC', surface: '#FFFFFF',
                        danger: '#E63946', success: '#2A9D8F', warning: '#F4A261'
                    }
                }
            }
        }
    </script>
    <style>
        body { background-color: #F8FAFC; }
        /* Animasi Sidebar Menu */
        .sidebar-link { transition: all 0.3s ease; border-left: 4px solid transparent; }
        .sidebar-link:hover:not(.active) { background-color: #F1F5F9; border-left-color: #7EC8E3; transform: translateX(4px); }
        .sidebar-link.active { background: linear-gradient(90deg, rgba(8,124,145,0.08) 0%, transparent 100%); border-left-color: #087C91; color: #087C91; font-weight: 600; }
        /* Efek Kaca untuk Banner */
        .glass-card { background: linear-gradient(135deg, #087C91 0%, #065b6b 100%); box-shadow: 0 10px 30px rgba(8,124,145,0.3); }
        /* Kustomisasi Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="font-sans text-gray-600 antialiased flex h-screen overflow-hidden selection:bg-primary selection:text-white">
    
    @auth
    <aside class="w-72 bg-surface shadow-[4px_0_24px_rgba(0,0,0,0.02)] flex flex-col z-20">
        <div class="h-20 flex items-center px-8 border-b border-gray-100">
            <img src="{{ asset('images/logo.png') }}" alt="PetLink Logo" class="h-12 w-auto mr-0 object-contain">
            
            <span class="text-2xl font-bold text-gray-800 tracking-tight">Pet<span class="text-primary">Link</span></span>
        </div>
        
        <nav class="flex-1 py-6 px-4 space-y-2 overflow-y-auto">
            <div class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4 px-4">Menu Utama</div>
            
            <a href="{{ route('dashboard') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg text-gray-500 {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-chart-pie w-7 text-lg"></i> <span>Dashboard</span>
            </a>
            <a href="{{ route('clinic.pending') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg text-gray-500 {{ request()->routeIs('clinic.pending') || (request()->routeIs('clinic.detail') && isset($clinic) && $clinic->status_verification === 'pending') ? 'active' : '' }}">
                <i class="fa-solid fa-clipboard-check w-7 text-lg"></i> <span>Verifikasi Klinik</span>
            </a>
            <a href="{{ route('clinic.history') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg text-gray-500 {{ request()->routeIs('clinic.history') || (request()->routeIs('clinic.detail') && isset($clinic) && $clinic->status_verification !== 'pending') ? 'active' : '' }}">
                <i class="fa-solid fa-clock-rotate-left w-7 text-lg"></i> <span>Riwayat Klinik</span>
            </a>
            <a href="{{ route('users.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg text-gray-500 {{ request()->routeIs('users.*') ? 'active' : '' }}">
                <i class="fa-solid fa-users-gear w-7 text-lg"></i> <span>Manajemen Akun</span>
            </a>
        </nav>

        <div class="p-5 border-t border-gray-100">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center px-4 py-3 bg-red-50 text-danger hover:bg-danger hover:text-white rounded-xl transition-all font-semibold">
                    <i class="fa-solid fa-arrow-right-from-bracket mr-2"></i> Keluar
                </button>
            </form>
        </div>
    </aside>
    @endauth

    <div class="flex-1 flex flex-col h-screen overflow-hidden relative">
        @auth
        <header class="h-20 bg-surface/80 backdrop-blur-md border-b border-gray-100 flex items-center justify-between px-8 z-10">
            <h1 class="text-2xl font-bold text-gray-800">@yield('title')</h1>
            <div class="flex items-center gap-4 cursor-pointer hover:bg-gray-50 p-2 rounded-xl transition">
                <div class="text-right hidden md:block">
                    <p class="text-sm font-bold text-gray-800">{{ Auth::user()->admin->name ?? Auth::user()->username ?? 'Administrator' }}</p>
                    <p class="text-xs text-primary font-medium">Super Admin</p>
                </div>
                <div class="w-11 h-11 rounded-full bg-primary/10 flex items-center justify-center text-primary text-lg font-bold border-2 border-primary/20">
                    {{ strtoupper(substr(Auth::user()->username ?? 'A', 0, 1)) }}
                </div>
            </div>
        </header>
        @endauth

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-background p-8">
            <div class="max-w-7xl mx-auto pb-12">
                
                @if(session('success'))
                    <div class="bg-green-50 border-l-4 border-success text-success p-4 mb-8 rounded-r-xl shadow-sm flex items-center font-medium animate-bounce-once">
                        <i class="fa-solid fa-circle-check mr-3 text-xl"></i> {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="bg-red-50 border-l-4 border-danger text-danger p-4 mb-8 rounded-r-xl shadow-sm flex items-center font-medium">
                        <i class="fa-solid fa-circle-exclamation mr-3 text-xl"></i> {{ session('error') }}
                    </div>
                @endif

                @yield('content')

            </div>
        </main>
    </div>
</body>
</html>
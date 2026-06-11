<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetLink | Ekosistem Digital Kesehatan Anabul</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { 
                        sans: ['Inter', 'sans-serif'], 
                        heading: ['Poppins', 'sans-serif'] 
                    },
                    colors: {
                        primary: '#087C91', primaryDark: '#065b6b', accent: '#7EC8E3',
                        background: '#F8FAFC', surface: '#FFFFFF',
                        dark: '#1E293B', textMuted: '#64748B',
                        danger: '#E63946', success: '#2A9D8F'
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans text-gray-600 antialiased bg-background selection:bg-primary selection:text-white overflow-x-hidden">

    <nav class="fixed w-full z-50 bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="#" class="flex items-center gap-2 group">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo PetLink" class="w-12 h-12 object-contain transition-transform duration-300 group-hover:scale-110 drop-shadow-sm">
                    <span class="text-2xl font-heading font-bold text-dark tracking-tight transition-colors duration-300">Pet<span class="text-primary">Link</span></span>
                </a>

                <div class="hidden md:flex space-x-8">
                    <a href="#latar-belakang" class="text-sm font-medium text-gray-600 hover:text-primary transition-colors duration-300">Solusi</a>
                    <a href="#fitur" class="text-sm font-medium text-gray-600 hover:text-primary transition-colors duration-300">3 Pilar</a>
                    <a href="#detail-fitur" class="text-sm font-medium text-gray-600 hover:text-primary transition-colors duration-300">Fitur Detail</a>
                    <a href="#alur" class="text-sm font-medium text-gray-600 hover:text-primary transition-colors duration-300">Alur Transaksi</a>
                </div>

                <div>
                    <a href="{{ route('login') }}" class="flex items-center gap-2 px-5 py-2.5 rounded-lg bg-primary/10 text-primary text-sm font-bold hover:bg-primary hover:text-white transition-all duration-300 border border-primary/20 hover:shadow-lg hover:shadow-primary/30">
                        <span>Login Admin</span> <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <section class="relative pt-32 pb-20 lg:pt-40 lg:pb-32 overflow-hidden bg-surface border-b border-gray-100">
        <div class="absolute inset-0 bg-gradient-to-br from-background to-white -z-10"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <div class="order-2 lg:order-1 text-center lg:text-left" data-aos="fade-right" data-aos-duration="1000">
                    <span class="px-4 py-1.5 rounded-full bg-primary/10 text-primary font-bold text-xs tracking-wider uppercase mb-6 inline-block">
                        Aplikasi Manajemen Klinik Terpadu
                    </span>
                    <h1 class="text-4xl lg:text-5xl xl:text-6xl font-heading font-extrabold text-dark leading-tight mb-6">
                        Satu Ekosistem Digital untuk <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">Kesehatan Anabul Anda.</span>
                    </h1>
                    <p class="text-lg text-textMuted mb-8 leading-relaxed max-w-xl mx-auto lg:mx-0">
                        PetLink adalah platform integrasi menyeluruh yang menghubungkan Pemilik Hewan, Klinik, dan Dokter Hewan demi efisiensi layanan medis yang lebih baik.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="https://drive.google.com/file/d/1e3Foh92fhVv6-PoOOPnYea9WPTOWx6ju/view?usp=sharing" target="_blank" class="px-8 py-3.5 rounded-xl bg-primary text-white font-bold text-center hover:bg-primaryDark transition-all shadow-lg shadow-primary/30 flex items-center justify-center">
                            <i class="fa-brands fa-google-play mr-2"></i> Download Aplikasi
                        </a>
                        <a href="https://wa.me/6285330636086" target="_blank" class="px-8 py-3.5 rounded-xl bg-white border border-gray-200 text-dark font-bold text-center hover:border-primary hover:text-primary transition-all flex items-center justify-center">
                            <i class="fa-solid fa-store mr-2 text-primary"></i> Gabung Mitra Klinik
                        </a>
                    </div>
                </div>

                <div class="order-1 lg:order-2 relative flex justify-center" data-aos="fade-left" data-aos-duration="1000">
                    <div class="absolute inset-0 bg-primary/5 rounded-[2rem] transform translate-x-4 translate-y-4 -z-10"></div>
                    <div class="w-full aspect-video rounded-2xl overflow-hidden shadow-2xl border border-gray-100 bg-white">
                        <img src="{{ asset('images/landing_page/foto1.png') }}" alt="PetLink App Mockup" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. PROBLEM & SOLUTION SECTION -->
    <section id="latar-belakang" class="py-24 bg-background">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-primary font-bold tracking-wider text-sm uppercase mb-3 block">Latar Belakang & Inovasi</span>
                <h2 class="text-3xl font-heading font-bold text-dark mb-4">Mengapa PetLink Hadir?</h2>
                <p class="text-textMuted max-w-3xl mx-auto leading-relaxed">Sistem manajemen konvensional seringkali menciptakan kebuntuan operasional (bottleneck) bagi pihak klinik, sekaligus memberikan pengalaman perawatan yang kurang optimal bagi hewan peliharaan.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                
                <!-- BOX MASALAH (Kiri) -->
                <div class="bg-white p-8 rounded-2xl border border-red-100 shadow-sm relative overflow-hidden" data-aos="fade-right" data-aos-duration="800">
                    <div class="absolute top-0 left-0 w-2 h-full bg-danger"></div>
                    <h3 class="text-xl font-heading font-bold text-dark mb-8 flex items-center gap-3">
                        <i class="fa-solid fa-circle-xmark text-danger text-2xl"></i> Kendala Ekosistem Konvensional
                    </h3>
                    <ul class="space-y-6">
                        <!-- Masalah 1 -->
                        <li class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center shrink-0 mt-1"><i class="fa-solid fa-users-slash text-danger text-lg"></i></div>
                            <div>
                                <strong class="text-dark block mb-1.5 text-lg">Antrean Walk-in Tidak Terstruktur</strong> 
                                <p class="text-sm text-textMuted leading-relaxed">Klinik sering penuh sesak di jam tertentu. Menunggu terlalu lama di ruang tunggu sangat memicu stres pada hewan dan berisiko menularkan penyakit antar pasien.</p>
                            </div>
                        </li>
                        <!-- Masalah 2 -->
                        <li class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center shrink-0 mt-1"><i class="fa-solid fa-file-waveform text-danger text-lg"></i></div>
                            <div>
                                <strong class="text-dark block mb-1.5 text-lg">Rekam Medis Fisik (Kertas)</strong> 
                                <p class="text-sm text-textMuted leading-relaxed">Pencatatan riwayat alergi dan diagnosis masih mengandalkan kartu fisik yang rentan hilang, rusak, atau lambat dicari saat terjadi keadaan darurat medis.</p>
                            </div>
                        </li>
                        <!-- Masalah 3 -->
                        <li class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center shrink-0 mt-1"><i class="fa-solid fa-cash-register text-danger text-lg"></i></div>
                            <div>
                                <strong class="text-dark block mb-1.5 text-lg">Kebocoran Finansial & Kasir</strong> 
                                <p class="text-sm text-textMuted leading-relaxed">Penghitungan manual antara tindakan di ruang periksa dengan resep obat memicu kesalahan tagihan (human error) yang merugikan omset klinik.</p>
                            </div>
                        </li>
                        <!-- Masalah 4 (Baru) -->
                        <li class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center shrink-0 mt-1"><i class="fa-solid fa-house-medical-circle-xmark text-danger text-lg"></i></div>
                            <div>
                                <strong class="text-dark block mb-1.5 text-lg">Akses Konsultasi Terbatas</strong> 
                                <p class="text-sm text-textMuted leading-relaxed">Pemilik hewan kesulitan mendapatkan saran medis awal atau follow-up pasca pengobatan karena harus selalu datang ke klinik secara fisik.</p>
                            </div>
                        </li>
                        <!-- Masalah 5 (Baru) -->
                        <li class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center shrink-0 mt-1"><i class="fa-solid fa-calendar-xmark text-danger text-lg"></i></div>
                            <div>
                                <strong class="text-dark block mb-1.5 text-lg">Kelalaian Jadwal Perawatan</strong> 
                                <p class="text-sm text-textMuted leading-relaxed">Pemilik hewan sering lupa jadwal rutin seperti vaksinasi tahunan atau obat cacing karena tidak ada sistem pengingat yang proaktif.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- BOX SOLUSI (Kanan) -->
                <div class="bg-white p-8 rounded-2xl border border-primary/20 shadow-xl relative overflow-hidden" data-aos="fade-left" data-aos-duration="800">
                    <div class="absolute top-0 left-0 w-2 h-full bg-primary"></div>
                    <h3 class="text-xl font-heading font-bold text-dark mb-8 flex items-center gap-3">
                        <i class="fa-solid fa-circle-check text-primary text-2xl"></i> Solusi Digital PetLink
                    </h3>
                    <ul class="space-y-6">
                        <!-- Solusi 1 -->
                        <li class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center shrink-0 mt-1"><i class="fa-solid fa-calendar-check text-primary text-lg"></i></div>
                            <div>
                                <strong class="text-dark block mb-1.5 text-lg">Manajemen Antrean Pintar</strong> 
                                <p class="text-sm text-textMuted leading-relaxed">Fitur booking online dengan kuota. Pasien datang sesuai jadwal, ruang tunggu kondusif, dan dokter bekerja dengan ritme yang teratur.</p>
                            </div>
                        </li>
                        <!-- Solusi 2 -->
                        <li class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center shrink-0 mt-1"><i class="fa-solid fa-laptop-medical text-primary text-lg"></i></div>
                            <div>
                                <strong class="text-dark block mb-1.5 text-lg">Electronic Medical Record (EMR)</strong> 
                                <p class="text-sm text-textMuted leading-relaxed">Data kesehatan dan resep digital tersimpan di Cloud. Dokter dapat memantau rekam jejak pasien dari genggaman dalam hitungan detik.</p>
                            </div>
                        </li>
                        <!-- Solusi 3 -->
                        <li class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center shrink-0 mt-1"><i class="fa-solid fa-file-invoice-dollar text-primary text-lg"></i></div>
                            <div>
                                <strong class="text-dark block mb-1.5 text-lg">Kasir & Invoice Terintegrasi</strong> 
                                <p class="text-sm text-textMuted leading-relaxed">Tindakan medis dan e-Resep otomatis dikonversi menjadi tagihan di meja depan. Transparan, cepat, dan dilengkapi analitik pendapatan.</p>
                            </div>
                        </li>
                        <!-- Solusi 4 (Baru) -->
                        <li class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center shrink-0 mt-1"><i class="fa-solid fa-comments text-primary text-lg"></i></div>
                            <div>
                                <strong class="text-dark block mb-1.5 text-lg">Layanan Telekonsultasi (Chat)</strong> 
                                <p class="text-sm text-textMuted leading-relaxed">Menyediakan fitur chat langsung dengan dokter. Sangat efektif untuk penanganan darurat pertama (P3K) atau kontrol masa pemulihan dari rumah.</p>
                            </div>
                        </li>
                        <!-- Solusi 5 (Baru) -->
                        <li class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center shrink-0 mt-1"><i class="fa-solid fa-bell-concierge text-primary text-lg"></i></div>
                            <div>
                                <strong class="text-dark block mb-1.5 text-lg">Notifikasi & Pengingat Otomatis</strong> 
                                <p class="text-sm text-textMuted leading-relaxed">Sistem mengirimkan Push Notification ke HP pengguna saat tenggat waktu perawatan rutin tiba, memastikan kesehatan anabul tetap terjaga.</p>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <section id="fitur" class="py-24 bg-surface border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="zoom-in">
                <span class="text-primary font-bold tracking-wider text-sm uppercase mb-3 block">Antarmuka Pengguna</span>
                <h2 class="text-3xl font-heading font-bold text-dark mb-4">Satu Ekosistem. Tiga Pilar Layanan.</h2>
                <p class="text-textMuted max-w-2xl mx-auto">Setiap entitas memiliki UI khusus yang dirancang menyesuaikan alur kerja mereka.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="bg-background rounded-2xl overflow-hidden border border-gray-100 hover:shadow-xl transition-all flex flex-col group cursor-pointer" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-8 pb-8 flex-1">
                        <div class="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center mb-6"><i class="fa-solid fa-mobile-screen text-2xl text-primary"></i></div>
                        <h3 class="text-xl font-heading font-bold text-dark mb-3">Pet Owner (Aplikasi)</h3>
                        <p class="text-sm text-textMuted leading-relaxed">Booking dokter lebih mudah, konsultasi online (chat), dan pantau rekam medis anabul dari rumah.</p>
                    </div>
                    <div class="w-full aspect-video overflow-hidden mt-auto border-t border-gray-100 relative bg-gray-50">
                        <img src="{{ asset('images/landing_page/foto2.png') }}" alt="UI Pet Owner" class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-700 ease-in-out">
                    </div>
                </div>

                <div class="bg-background rounded-2xl overflow-hidden border border-gray-100 hover:shadow-xl transition-all flex flex-col group cursor-pointer" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-8 pb-8 flex-1">
                        <div class="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center mb-6"><i class="fa-solid fa-stethoscope text-2xl text-primary"></i></div>
                        <h3 class="text-xl font-heading font-bold text-dark mb-3">Dokter Hewan (Aplikasi)</h3>
                        <p class="text-sm text-textMuted leading-relaxed">Cek jadwal praktis harian, input tinjauan medis digital, dan berikan resep obat tanpa menulis di kertas.</p>
                    </div>
                    <div class="w-full aspect-video overflow-hidden mt-auto border-t border-gray-100 relative bg-gray-50">
                        <img src="{{ asset('images/landing_page/foto3.png') }}" alt="UI Dokter Hewan" class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-700 ease-in-out">
                    </div>
                </div>

                <div class="bg-background rounded-2xl overflow-hidden border border-gray-100 hover:shadow-xl transition-all flex flex-col group cursor-pointer" data-aos="fade-up" data-aos-delay="300">
                    <div class="p-8 pb-8 flex-1">
                        <div class="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center mb-6"><i class="fa-solid fa-laptop-code text-2xl text-primary"></i></div>
                        <h3 class="text-xl font-heading font-bold text-dark mb-3">Klinik/Kasir (Web Admin)</h3>
                        <p class="text-sm text-textMuted leading-relaxed">Konfirmasi kehadiran antrean, kelola sistem tagihan pembayaran, dan pantau grafik pendapatan harian klinik.</p>
                    </div>
                    <div class="w-full aspect-video overflow-hidden mt-auto border-t border-gray-100 relative bg-gray-50">
                        <img src="{{ asset('images/landing_page/foto4.png') }}" alt="UI Dashboard Admin" class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-700 ease-in-out">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="detail-fitur" class="py-24 bg-background">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <span class="text-primary font-bold tracking-wider text-sm uppercase mb-3 block">Kemampuan Platform</span>
                <h2 class="text-3xl font-heading font-bold text-dark mb-4">Fitur Spesifik Berdasarkan Role</h2>
            </div>

            <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="100">
                <button onclick="switchTab('petowner')" id="btn-petowner" class="tab-btn active px-6 py-3 rounded-xl font-bold transition-all duration-300 bg-primary text-white shadow-md flex items-center gap-2">
                    <i class="fa-solid fa-paw"></i> Pet Owner
                </button>
                <button onclick="switchTab('klinik')" id="btn-klinik" class="tab-btn px-6 py-3 rounded-xl font-bold transition-all duration-300 bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 flex items-center gap-2">
                    <i class="fa-solid fa-hospital"></i> Klinik/Kasir
                </button>
                <button onclick="switchTab('dokter')" id="btn-dokter" class="tab-btn px-6 py-3 rounded-xl font-bold transition-all duration-300 bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 flex items-center gap-2">
                    <i class="fa-solid fa-user-doctor"></i> Dokter Hewan
                </button>
            </div>

            <div id="content-petowner" class="tab-content grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 animate-[fadeIn_0.5s_ease-in-out]">
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex gap-4"><i class="fa-solid fa-calendar-check text-primary text-xl mt-1"></i><div><h4 class="font-bold text-dark mb-1 text-sm">Booking Online</h4><p class="text-xs text-textMuted">Pesan jadwal ke klinik tanpa ribet.</p></div></div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex gap-4"><i class="fa-solid fa-map-location-dot text-primary text-xl mt-1"></i><div><h4 class="font-bold text-dark mb-1 text-sm">Cari Klinik</h4><p class="text-xs text-textMuted">Temukan klinik terdekat & sesuai kriteria.</p></div></div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex gap-4"><i class="fa-solid fa-credit-card text-primary text-xl mt-1"></i><div><h4 class="font-bold text-dark mb-1 text-sm">Pembayaran Digital</h4><p class="text-xs text-textMuted">Bayar biaya layanan secara aman via app.</p></div></div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex gap-4"><i class="fa-solid fa-file-medical text-primary text-xl mt-1"></i><div><h4 class="font-bold text-dark mb-1 text-sm">Rekam Medis (EMR)</h4><p class="text-xs text-textMuted">Akses riwayat kesehatan hewan penuh.</p></div></div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex gap-4"><i class="fa-solid fa-star text-warning text-xl mt-1"></i><div><h4 class="font-bold text-dark mb-1 text-sm">Ulasan & Rating</h4><p class="text-xs text-textMuted">Berikan ulasan klinik dan dokter hewan.</p></div></div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex gap-4"><i class="fa-solid fa-bell text-primary text-xl mt-1"></i><div><h4 class="font-bold text-dark mb-1 text-sm">Pengingat Kesehatan</h4><p class="text-xs text-textMuted">Notifikasi otomatis jadwal vaksin/kontrol.</p></div></div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex gap-4"><i class="fa-solid fa-comments text-primary text-xl mt-1"></i><div><h4 class="font-bold text-dark mb-1 text-sm">Konsultasi Online</h4><p class="text-xs text-textMuted">Chat/Telemedicine langsung dengan dokter.</p></div></div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex gap-4"><i class="fa-solid fa-cat text-primary text-xl mt-1"></i><div><h4 class="font-bold text-dark mb-1 text-sm">Manajemen Hewan</h4><p class="text-xs text-textMuted">Kelola profil banyak hewan peliharaan.</p></div></div>
            </div>

            <div id="content-klinik" class="tab-content hidden grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 animate-[fadeIn_0.5s_ease-in-out]">
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex gap-4"><i class="fa-solid fa-chart-line text-primary text-xl mt-1"></i><div><h4 class="font-bold text-dark mb-1 text-sm">Statistik Performa</h4><p class="text-xs text-textMuted">Pantau jumlah pasien dan pendapatan harian.</p></div></div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex gap-4"><i class="fa-solid fa-clipboard-list text-primary text-xl mt-1"></i><div><h4 class="font-bold text-dark mb-1 text-sm">Kelola Booking</h4><p class="text-xs text-textMuted">Verifikasi kehadiran antrean pasien masuk.</p></div></div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex gap-4"><i class="fa-solid fa-receipt text-primary text-xl mt-1"></i><div><h4 class="font-bold text-dark mb-1 text-sm">Manajemen Kasir</h4><p class="text-xs text-textMuted">Buat struk/invoice pembayaran otomatis.</p></div></div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex gap-4"><i class="fa-solid fa-database text-primary text-xl mt-1"></i><div><h4 class="font-bold text-dark mb-1 text-sm">Database Pasien</h4><p class="text-xs text-textMuted">Pemantauan seluruh data user dan rekam medis.</p></div></div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex gap-4"><i class="fa-regular fa-calendar-days text-primary text-xl mt-1"></i><div><h4 class="font-bold text-dark mb-1 text-sm">Jadwal Praktik Dokter</h4><p class="text-xs text-textMuted">Atur slot layanan dari masing-masing dokter.</p></div></div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex gap-4"><i class="fa-solid fa-boxes-stacked text-primary text-xl mt-1"></i><div><h4 class="font-bold text-dark mb-1 text-sm">Master Inventori</h4><p class="text-xs text-textMuted">Input data daftar layanan, harga, dan obat.</p></div></div>
            </div>

            <div id="content-dokter" class="tab-content hidden grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 animate-[fadeIn_0.5s_ease-in-out]">
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex gap-4"><i class="fa-solid fa-list-check text-primary text-xl mt-1"></i><div><h4 class="font-bold text-dark mb-1 text-sm">Cek Daftar Booking</h4><p class="text-xs text-textMuted">Lihat daftar pasien antrean secara realtime.</p></div></div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex gap-4"><i class="fa-solid fa-notes-medical text-primary text-xl mt-1"></i><div><h4 class="font-bold text-dark mb-1 text-sm">Input Rekam Medis</h4><p class="text-xs text-textMuted">Catat diagnosis medis digital tanpa kertas.</p></div></div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex gap-4"><i class="fa-solid fa-pills text-primary text-xl mt-1"></i><div><h4 class="font-bold text-dark mb-1 text-sm">Resep Obat Digital</h4><p class="text-xs text-textMuted">Berikan e-Resep yang terhubung ke kasir.</p></div></div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex gap-4"><i class="fa-solid fa-headset text-primary text-xl mt-1"></i><div><h4 class="font-bold text-dark mb-1 text-sm">Telekonsultasi</h4><p class="text-xs text-textMuted">Respons konsultasi jarak jauh dengan pet owner.</p></div></div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex gap-4"><i class="fa-solid fa-clock-rotate-left text-primary text-xl mt-1"></i><div><h4 class="font-bold text-dark mb-1 text-sm">Riwayat Penanganan</h4><p class="text-xs text-textMuted">Akses histori penyakit hewan di masa lalu.</p></div></div>
            </div>

        </div>
    </section>

    <section id="alur" class="py-24 bg-dark text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-primary/5"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-20" data-aos="fade-up">
                <h2 class="text-3xl font-heading font-bold mb-4">Alur Transaksi & Validasi Bisnis yang Logis</h2>
                <p class="text-gray-400 max-w-2xl mx-auto">Kami menggunakan model pembayaran bertahap (2 Tahap) untuk meminimalisir ketidakhadiran pasien (No-Show) yang merugikan waktu klinik.</p>
            </div>

            <div class="relative flex flex-col md:flex-row justify-between gap-8 md:gap-0">
                <div class="hidden md:block absolute top-10 left-[10%] right-[10%] h-1 bg-gray-700 -z-10"></div>
                
                <div class="flex-1 text-center relative" data-aos="zoom-in" data-aos-delay="100">
                    <div class="w-20 h-20 mx-auto bg-dark border-4 border-primary rounded-full flex items-center justify-center text-3xl text-primary mb-6 shadow-[0_0_15px_rgba(8,124,145,0.5)]"><i class="fa-solid fa-magnifying-glass"></i></div>
                    <h4 class="font-heading font-bold text-lg mb-2">1. Pilih Klinik</h4>
                    <p class="text-sm text-gray-400 px-4">User memilih klinik terdekat dan dokter hewan spesialis yang sesuai.</p>
                </div>

                <div class="flex-1 text-center relative" data-aos="zoom-in" data-aos-delay="200">
                    <div class="w-20 h-20 mx-auto bg-primary border-4 border-primaryDark rounded-full flex items-center justify-center text-3xl text-white mb-6 shadow-[0_0_20px_rgba(8,124,145,0.8)]"><i class="fa-solid fa-money-check-dollar"></i></div>
                    <h4 class="font-heading font-bold text-lg mb-2">2. Payment 1 (Booking)</h4>
                    <p class="text-sm text-gray-300 px-4 font-medium">Bayar DP di aplikasi untuk mengunci jadwal (Fee Platform).</p>
                </div>

                <div class="flex-1 text-center relative" data-aos="zoom-in" data-aos-delay="300">
                    <div class="w-20 h-20 mx-auto bg-dark border-4 border-primary rounded-full flex items-center justify-center text-3xl text-primary mb-6 shadow-[0_0_15px_rgba(8,124,145,0.5)]"><i class="fa-solid fa-kit-medical"></i></div>
                    <h4 class="font-heading font-bold text-lg mb-2">3. Tindakan Medis</h4>
                    <p class="text-sm text-gray-400 px-4">Hewan diperiksa di klinik. Dokter input rekam medis digital.</p>
                </div>

                <div class="flex-1 text-center relative" data-aos="zoom-in" data-aos-delay="400">
                    <div class="w-20 h-20 mx-auto bg-success border-4 border-emerald-700 rounded-full flex items-center justify-center text-3xl text-white mb-6 shadow-[0_0_20px_rgba(42,157,143,0.8)]"><i class="fa-solid fa-hand-holding-dollar"></i></div>
                    <h4 class="font-heading font-bold text-lg mb-2">4. Payment 2 (Pelunasan)</h4>
                    <p class="text-sm text-gray-300 px-4 font-medium">Kasir menerbitkan tagihan (jasa + obat). Pasien melunasi tagihan.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-surface border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center mb-20" data-aos="fade-up">
                <div><h3 class="text-4xl font-heading font-black text-primary mb-2">150+</h3><p class="text-gray-500 font-medium uppercase tracking-wider text-xs">Klinik Terdaftar</p></div>
                <div><h3 class="text-4xl font-heading font-black text-primary mb-2">500+</h3><p class="text-gray-500 font-medium uppercase tracking-wider text-xs">Dokter Hewan</p></div>
                <div><h3 class="text-4xl font-heading font-black text-primary mb-2">10.000+</h3><p class="text-gray-500 font-medium uppercase tracking-wider text-xs">Transaksi Valid</p></div>
                <div><h3 class="text-4xl font-heading font-black text-primary mb-2">99%</h3><p class="text-gray-500 font-medium uppercase tracking-wider text-xs">Uptime Sistem</p></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex gap-6" data-aos="fade-right">
                    <img src="{{ asset('images/landing_page/foto5_dokter.png') }}" alt="Drh. Budi" class="w-16 h-16 rounded-full object-cover shrink-0">
                    <div>
                        <div class="flex text-warning mb-2 text-sm"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                        <p class="italic text-gray-600 mb-4 text-sm leading-relaxed">"Semenjak pakai PetLink, tidak ada lagi pasien yang kabur setelah booking. Rekam medis yang terintegrasi sangat memudahkan saya memantau pasien rawat jalan."</p>
                        <h5 class="font-bold text-dark text-sm">Drh. Budi Santoso</h5>
                        <p class="text-xs text-primary">Pemilik Klinik Animalia</p>
                    </div>
                </div>
                
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex gap-6" data-aos="fade-left">
                    <img src="{{ asset('images/landing_page/foto5_petowner.png') }}" alt="Siti Pet Owner" class="w-16 h-16 rounded-full object-cover shrink-0">
                    <div>
                        <div class="flex text-warning mb-2 text-sm"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                        <p class="italic text-gray-600 mb-4 text-sm leading-relaxed">"Sangat terbantu! Dulu harus nunggu berjam-jam di klinik, sekarang tinggal booking dari HP, datang sesuai jam, bayar sisa tagihan langsung di aplikasi. Praktis!"</p>
                        <h5 class="font-bold text-dark text-sm">Siti Nurhaliza</h5>
                        <p class="text-xs text-primary">Pet Owner (Cat Lover)</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-background border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h3 class="text-2xl font-heading font-bold text-dark mb-8" data-aos="fade-up">Dikembangkan Oleh</h3>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="flex flex-col items-center p-6 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-2 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-24 h-24 bg-primary/20 rounded-full mb-4 border-4 border-white shadow-md overflow-hidden"><img src="{{ asset('images/landing_page/nida.png') }}" alt="Naswanida" class="w-full h-full object-cover"></div>
                    <h4 class="font-heading font-bold text-dark text-lg leading-tight mb-1">Naswanida Nafiula</h4>
                    <p class="text-sm text-primary font-medium mb-4">Lead Full-Stack Developer</p>
                    <div class="flex flex-wrap gap-2 justify-center mt-auto">
                        <span class="px-2 py-1 bg-blue-50 text-blue-600 text-[10px] font-bold rounded uppercase">Flutter</span><span class="px-2 py-1 bg-red-50 text-red-600 text-[10px] font-bold rounded uppercase">Laravel</span><span class="px-2 py-1 bg-emerald-50 text-emerald-600 text-[10px] font-bold rounded uppercase">Supabase</span>
                    </div>
                </div>

                <div class="flex flex-col items-center p-6 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-2 transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-24 h-24 bg-primary/20 rounded-full mb-4 border-4 border-white shadow-md overflow-hidden"><img src="{{ asset('images/landing_page/farras.png') }}" alt="Farras" class="w-full h-full object-cover"></div>
                    <h4 class="font-heading font-bold text-dark text-lg leading-tight mb-1">Muhammad Farras A.A.</h4>
                    <p class="text-sm text-primary font-medium mb-4">Member Full-Stack Developer</p>
                    <div class="flex flex-wrap gap-2 justify-center mt-auto">
                        <span class="px-2 py-1 bg-blue-50 text-blue-600 text-[10px] font-bold rounded uppercase">Flutter</span><span class="px-2 py-1 bg-red-50 text-red-600 text-[10px] font-bold rounded uppercase">Laravel</span><span class="px-2 py-1 bg-emerald-50 text-emerald-600 text-[10px] font-bold rounded uppercase">Supabase</span>
                    </div>
                </div>

                <div class="flex flex-col items-center p-6 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-2 transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-24 h-24 bg-primary/20 rounded-full mb-4 border-4 border-white shadow-md overflow-hidden"><img src="{{ asset('images/landing_page/yanuar.png') }}" alt="Yanuar" class="w-full h-full object-cover"></div>
                    <h4 class="font-heading font-bold text-dark text-lg leading-tight mb-1">Yanuar Alda Baran</h4>
                    <p class="text-sm text-primary font-medium mb-4">Member Full-Stack Developer</p>
                    <div class="flex flex-wrap gap-2 justify-center mt-auto">
                        <span class="px-2 py-1 bg-blue-50 text-blue-600 text-[10px] font-bold rounded uppercase">Flutter</span><span class="px-2 py-1 bg-red-50 text-red-600 text-[10px] font-bold rounded uppercase">Laravel</span><span class="px-2 py-1 bg-emerald-50 text-emerald-600 text-[10px] font-bold rounded uppercase">Supabase</span>
                    </div>
                </div>

                <div class="flex flex-col items-center p-6 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-2 transition-all duration-300" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-24 h-24 bg-primary/20 rounded-full mb-4 border-4 border-white shadow-md overflow-hidden"><img src="{{ asset('images/landing_page/nita.png') }}" alt="Nita" class="w-full h-full object-cover"></div>
                    <h4 class="font-heading font-bold text-dark text-lg leading-tight mb-1">Primayunita Putri A.</h4>
                    <p class="text-sm text-primary font-medium mb-4">Member Full-Stack Developer</p>
                    <div class="flex flex-wrap gap-2 justify-center mt-auto">
                        <span class="px-2 py-1 bg-blue-50 text-blue-600 text-[10px] font-bold rounded uppercase">Flutter</span><span class="px-2 py-1 bg-red-50 text-red-600 text-[10px] font-bold rounded uppercase">Laravel</span><span class="px-2 py-1 bg-emerald-50 text-emerald-600 text-[10px] font-bold rounded uppercase">Supabase</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="cta" class="py-24 bg-surface text-center">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8" data-aos="zoom-in">
            <h2 class="text-3xl md:text-4xl font-heading font-black text-dark mb-6">Siap Memberikan yang Terbaik untuk Anabul?</h2>
            <p class="text-lg text-textMuted mb-10">Bergabunglah dengan ribuan pengguna PetLink lainnya dan rasakan kemudahan layanan kesehatan hewan di ujung jari Anda.</p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-4 mb-12">
                <a href="#" class="h-14 bg-dark text-white rounded-xl px-6 flex items-center justify-center gap-3 hover:bg-gray-800 transition shadow-md">
                    <i class="fa-brands fa-google-play text-2xl"></i>
                    <div class="text-left">
                        <div class="text-[10px] uppercase font-bold leading-none text-gray-300">Get it on</div>
                        <div class="text-lg font-bold leading-none mt-1">Google Play</div>
                    </div>
                </a>
                <a href="#" class="h-14 bg-dark text-white rounded-xl px-6 flex items-center justify-center gap-3 hover:bg-gray-800 transition shadow-md">
                    <i class="fa-brands fa-apple text-3xl mb-1"></i>
                    <div class="text-left">
                        <div class="text-[10px] uppercase font-bold leading-none text-gray-300">Download on the</div>
                        <div class="text-lg font-bold leading-none mt-1">App Store</div>
                    </div>
                </a>
            </div>

            <div class="flex justify-center gap-8">
                <a href="https://drive.google.com/file/d/1A60TBPPgOP40_kZ5p0j7wXWkO_ifM8u6/view?usp=sharing" target="_blank" class="text-gray-400 hover:text-primary transition flex items-center gap-2 font-medium">
                    <i class="fa-solid fa-file-image text-2xl"></i> Lihat Poster
                </a>
                <a href="https://drive.google.com/file/d/1qLqbx5D7borY7ebZr0Z9vysV3ZKpdG05/view?usp=sharing" target="_blank" class="text-gray-400 hover:text-red-600 transition flex items-center gap-2 font-medium">
                    <i class="fa-solid fa-circle-play text-2xl"></i> Video Promosi
                </a>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-gray-400 py-8 text-center text-sm border-t border-gray-800">
        <p>&copy; {{ date('Y') }} PetLink Project by Kelompok 4. Hak Cipta Dilindungi.</p>
    </footer>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Inisialisasi Animasi AOS
        AOS.init({
            once: true, // Animasi hanya berjalan 1 kali saat di scroll
            offset: 100, // Jarak trigger animasi dari bawah layar
        });

        // Fungsi Tab Interaktif
        function switchTab(roleId) {
            // Sembunyikan semua konten tab
            document.querySelectorAll('.tab-content').forEach(el => {
                el.classList.add('hidden');
            });
            // Reset gaya semua tombol tab (kembalikan ke putih abu-abu)
            document.querySelectorAll('.tab-btn').forEach(el => {
                el.classList.remove('bg-primary', 'text-white', 'shadow-md', 'active');
                el.classList.add('bg-white', 'text-gray-600', 'border', 'border-gray-200');
            });

            // Tampilkan konten tab yang dipilih
            document.getElementById('content-' + roleId).classList.remove('hidden');
            
            // Beri warna utama (Primary) pada tombol tab yang diklik
            const activeBtn = document.getElementById('btn-' + roleId);
            activeBtn.classList.remove('bg-white', 'text-gray-600', 'border', 'border-gray-200');
            activeBtn.classList.add('bg-primary', 'text-white', 'shadow-md', 'active');
        }
    </script>
</body>
</html>
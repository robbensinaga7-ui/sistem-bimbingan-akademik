<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - BIMAKA Academic Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; margin: 0; padding: 0; }
        
        @keyframes pageEnter {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-page-enter {
            animation: pageEnter 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes cardPop {
            from { opacity: 0; transform: scale(0.96); }
            to { opacity: 1; transform: scale(1); }
        }
        .animate-card-pop {
            animation: cardPop 0.5s cubic-bezier(0.16, 1, 0.3, 1) 0.1s forwards;
            opacity: 0;
        }
    </style>
</head>
<body class="bg-[#1e40af] h-screen w-screen overflow-hidden flex items-center justify-center">

    <!-- Container Full Screen dengan Animasi Masuk -->
    <div class="w-full h-full grid grid-cols-1 lg:grid-cols-12 overflow-hidden bg-[#1e40af] animate-page-enter">
        
        <!-- PANEL KIRI: GAMBAR KAMPUS DENGAN OVERLAY YANG PAS (TIDAK TERTUTUP TOTAL) -->
        <div class="lg:col-span-7 relative h-full flex flex-col justify-between p-8 lg:p-14 text-white overflow-hidden">
            <!-- Background Image Kampus -->
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&w=1600&q=80');"></div>
            
            <!-- Overlay Biru Semi-Transparan agar Gambar Kampus Tetap Terlihat Jelas -->
            <div class="absolute inset-0 bg-gradient-to-tr from-[#1e40af]/90 via-[#1e40af]/80 to-blue-900/70"></div>

            <!-- Header Brand Kiri Atas -->
            <div class="relative z-10 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-white text-[#1e40af] flex items-center justify-center font-extrabold text-lg shadow-lg">B</div>
                <div>
                    <h4 class="text-[11px] font-bold uppercase tracking-widest text-blue-200">Sistem Manajemen</h4>
                    <h3 class="text-xs font-extrabold tracking-wide text-white">BIMAKA POLIBATAM</h3>
                </div>
            </div>

            <!-- Konten Tengah Kiri -->
            <div class="relative z-10 my-auto py-6 max-w-xl">
                <div class="inline-block px-3 py-1 rounded-full bg-white/15 text-blue-100 text-xs font-semibold mb-4 backdrop-blur-md border border-white/20">
                    ✨ Portal Resmi Bimbingan Akademik
                </div>
                <h1 class="text-3xl lg:text-5xl font-extrabold leading-tight tracking-tight mb-4 text-white drop-shadow-md">
                    Bimbingan Akademik <br /><span class="text-blue-200">Lebih Mudah & Terarah</span>
                </h1>
                <p class="text-blue-100 text-xs lg:text-sm leading-relaxed mb-8 drop-shadow">
                    Sistem manajemen bimbingan akademik Politeknik Negeri Batam yang membantu mengelola konsultasi tugas akhir, jadwal, hingga validasi secara terintegrasi dalam satu platform.
                </p>

                <!-- 3 Mini Fitur Badges -->
                <div class="grid grid-cols-3 gap-4 max-w-lg">
                    <div class="bg-white/15 backdrop-blur-md border border-white/25 p-3.5 rounded-2xl flex flex-col items-center text-center shadow-lg transition-transform hover:scale-105 duration-300">
                        <span class="text-lg mb-1">📅</span>
                        <span class="text-[11px] font-bold text-white">Jadwal Fleksibel</span>
                    </div>
                    <div class="bg-white/15 backdrop-blur-md border border-white/25 p-3.5 rounded-2xl flex flex-col items-center text-center shadow-lg transition-transform hover:scale-105 duration-300">
                        <span class="text-lg mb-1">📂</span>
                        <span class="text-[11px] font-bold text-white">Riwayat Terpusat</span>
                    </div>
                    <div class="bg-white/15 backdrop-blur-md border border-white/25 p-3.5 rounded-2xl flex flex-col items-center text-center shadow-lg transition-transform hover:scale-105 duration-300">
                        <span class="text-lg mb-1">⚡</span>
                        <span class="text-[11px] font-bold text-white">Validasi Cepat</span>
                    </div>
                </div>
            </div>

            <!-- Footer Kiri Bawah -->
            <div class="relative z-10 flex items-center justify-between text-xs text-blue-200 pt-4 border-t border-white/20">
                <p>© 2026 Politeknik Negeri Batam. All Rights Reserved.</p>
                <a href="{{ url('/') }}" class="hover:text-white transition font-semibold">← Kembali ke Beranda</a>
            </div>
        </div>

        <!-- PANEL KANAN: KARTU FORM LOGIN DENGAN ANIMASI POP -->
        <div class="lg:col-span-5 bg-white h-full p-8 lg:p-14 flex flex-col justify-center overflow-y-auto shadow-2xl z-10 animate-card-pop">
            
            <div class="mb-6 text-center lg:text-left">
                <div class="w-12 h-12 rounded-2xl bg-blue-50 border border-blue-100 flex items-center justify-center text-xl mx-auto lg:mx-0 mb-3 shadow-sm text-[#1e40af]">🎓</div>
                <h2 class="text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">Selamat Datang</h2>
                <p class="text-[11px] font-bold tracking-wider text-slate-400 mt-1">MASUK KE SISTEM BIMBINGAN AKADEMIK</p>
                <div class="w-12 h-1 bg-[#1e40af] rounded-full mt-2 mx-auto lg:mx-0"></div>
            </div>

            @if(session('error'))
                <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-600 text-xs font-bold rounded-xl text-center">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1.5">Username / NIM / NIDN</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 text-sm">👤</span>
                        <input type="text" name="nim_nidn" required placeholder="Masukkan admin / NIM / NIDN" class="w-full pl-10 pr-4 py-3.5 rounded-xl border border-slate-200 focus:outline-none focus:border-[#1e40af] text-sm font-medium bg-slate-50/50 transition">
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1.5">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 text-sm">🔒</span>
                        <input type="password" name="password" required placeholder="Masukkan kata sandi" class="w-full pl-10 pr-4 py-3.5 rounded-xl border border-slate-200 focus:outline-none focus:border-[#1e40af] text-sm font-medium bg-slate-50/50 transition">
                    </div>
                </div>

                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center gap-2 text-slate-500 font-medium cursor-pointer">
                        <input type="checkbox" class="rounded border-slate-300 text-[#1e40af] focus:ring-[#1e40af]"> Ingat saya
                    </label>
                    <a href="#forgot" class="text-[#1e40af] font-bold hover:underline">Lupa password?</a>
                </div>

                <!-- Tombol Masuk -->
                <button type="submit" class="w-full mt-3 py-4 bg-[#1e40af] hover:bg-blue-800 text-white font-extrabold rounded-xl text-sm shadow-lg shadow-blue-900/25 transition-all duration-200 hover:scale-[1.01] active:scale-[0.99]">
                    → Masuk ke Sistem
                </button>
            </form>

            <div class="text-center mt-6 text-xs text-slate-500">
               <p>Belum punya akun? <a href="{{ route('register') }}" class="text-[#1e40af] font-bold hover:underline">Daftar di sini</a></p>
            </div>

            <div class="mt-8 pt-5 border-t border-slate-100 flex items-center justify-center gap-2 text-[11px] text-slate-400">
                <span>🎓</span>
                <p class="font-medium">Sistem Bimbingan Akademik Polibatam</p>
            </div>

        </div>

    </div>

</body>
</html>
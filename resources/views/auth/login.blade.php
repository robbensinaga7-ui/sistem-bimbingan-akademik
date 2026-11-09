<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - BIMAKA Polibatam Academic Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; margin: 0; padding: 0; }
        
        @keyframes pageEnter {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-page-enter {
            animation: pageEnter 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes cardPop {
            from { opacity: 0; transform: scale(0.97); }
            to { opacity: 1; transform: scale(1); }
        }
        .animate-card-pop {
            animation: cardPop 0.5s cubic-bezier(0.16, 1, 0.3, 1) 0.1s forwards;
            opacity: 0;
        }
    </style>
</head>
<body class="bg-slate-900 h-screen w-screen overflow-hidden flex items-center justify-center">

    <!-- Container Full Screen dengan Animasi Masuk -->
    <div class="w-full h-full grid grid-cols-1 lg:grid-cols-12 overflow-hidden bg-slate-900 animate-page-enter">
        
        <!-- PANEL KIRI: GAMBAR KAMPUS & HERO SECTION -->
        <div class="lg:col-span-7 relative h-full flex flex-col justify-between p-8 lg:p-14 text-white overflow-hidden">
            <!-- Background Image Kampus -->
            <div class="absolute inset-0 bg-cover bg-center scale-105 transition-transform duration-1000" style="background-image: url('https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&w=1600&q=80');"></div>
            
            <!-- Overlay Gradasi Profesional -->
            <div class="absolute inset-0 bg-gradient-to-tr from-blue-950/95 via-blue-900/85 to-indigo-900/70 backdrop-blur-[2px]"></div>

            <!-- Header Brand Kiri Atas -->
            <div class="relative z-10 flex items-center gap-3.5">
                <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-blue-600 to-indigo-500 text-white flex items-center justify-center font-extrabold text-xl shadow-xl shadow-blue-600/30">B</div>
                <div>
                    <span class="text-[10px] font-extrabold uppercase tracking-widest text-blue-300">Sistem Manajemen</span>
                    <h3 class="text-sm font-extrabold tracking-wide text-white">BIMAKA POLIBATAM</h3>
                </div>
            </div>

            <!-- Konten Tengah Kiri -->
            <div class="relative z-10 my-auto py-6 max-w-xl">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 text-blue-200 text-xs font-semibold mb-5 backdrop-blur-md border border-white/15 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span> Portal Resmi Bimbingan Akademik
                </div>
                <h1 class="text-3xl lg:text-5xl font-extrabold leading-[1.15] tracking-tight mb-5 text-white drop-shadow-sm">
                    Bimbingan Akademik <br /><span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-indigo-200">Lebih Mudah & Terarah</span>
                </h1>
                <p class="text-blue-100/90 text-xs lg:text-sm leading-relaxed mb-8 font-medium">
                    Sistem manajemen bimbingan akademik Politeknik Negeri Batam yang membantu mengelola konsultasi tugas akhir, jadwal, hingga validasi secara terintegrasi dalam satu platform.
                </p>

                <!-- 3 Mini Fitur Badges -->
                <div class="grid grid-cols-3 gap-4 max-w-lg">
                    <div class="bg-white/10 hover:bg-white/15 transition-all duration-300 backdrop-blur-md border border-white/15 p-4 rounded-2xl flex flex-col items-center text-center shadow-lg group">
                        <span class="text-xl mb-1.5 group-hover:scale-110 transition-transform">📅</span>
                        <span class="text-[11px] font-bold text-white tracking-wide">Jadwal Fleksibel</span>
                    </div>
                    <div class="bg-white/10 hover:bg-white/15 transition-all duration-300 backdrop-blur-md border border-white/15 p-4 rounded-2xl flex flex-col items-center text-center shadow-lg group">
                        <span class="text-xl mb-1.5 group-hover:scale-110 transition-transform">📂</span>
                        <span class="text-[11px] font-bold text-white tracking-wide">Riwayat Terpusat</span>
                    </div>
                    <div class="bg-white/10 hover:bg-white/15 transition-all duration-300 backdrop-blur-md border border-white/15 p-4 rounded-2xl flex flex-col items-center text-center shadow-lg group">
                        <span class="text-xl mb-1.5 group-hover:scale-110 transition-transform">⚡</span>
                        <span class="text-[11px] font-bold text-white tracking-wide">Validasi Cepat</span>
                    </div>
                </div>
            </div>

            <!-- Footer Kiri Bawah -->
            <div class="relative z-10 flex items-center justify-between text-xs text-blue-200/80 pt-4 border-t border-white/15 font-medium">
                <p>© 2026 Politeknik Negeri Batam. All Rights Reserved.</p>
                <a href="{{ url('/') }}" class="hover:text-white transition font-bold flex items-center gap-1.5 group">
                    <span class="group-hover:-translate-x-1 transition-transform">←</span> Kembali ke Beranda
                </a>
            </div>
        </div>

        <!-- PANEL KANAN: KARTU FORM LOGIN DENGAN ANIMASI POP -->
        <div class="lg:col-span-5 bg-white h-full p-8 lg:p-14 flex flex-col justify-center overflow-y-auto shadow-2xl z-10 animate-card-pop">
            
            <div class="mb-6 text-center lg:text-left">
                <div class="w-12 h-12 rounded-2xl bg-blue-50 border border-blue-100 flex items-center justify-center text-xl mx-auto lg:mx-0 mb-3 shadow-inner text-blue-700">🎓</div>
                <h2 class="text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">Selamat Datang</h2>
                <p class="text-[11px] font-bold tracking-wider text-slate-400 mt-1 uppercase">Masuk ke sistem bimbingan akademik</p>
                <div class="w-10 h-1 bg-blue-600 rounded-full mt-2.5 mx-auto lg:mx-0"></div>
            </div>

            @if(session('error'))
                <div class="mb-4 p-3.5 bg-red-50 border border-red-200 text-red-600 text-xs font-semibold rounded-2xl text-center shadow-sm">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1.5">Username / NIM / NIDN</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 text-sm">👤</span>
                        <input type="text" name="nim_nidn" required placeholder="Masukkan admin / NIM / NIDN" class="w-full pl-11 pr-4 py-3.5 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-sm font-semibold bg-slate-50/50 transition">
                    </div>
                </div>

                <!-- Input Password dengan Tombol Lihat/Sembunyikan -->
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1.5">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 text-sm">🔒</span>
                        <input type="password" id="loginPassword" name="password" required placeholder="Masukkan kata sandi" class="w-full pl-11 pr-12 py-3.5 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-sm font-semibold bg-slate-50/50 transition">
                        <button type="button" onclick="toggleLoginPassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-600 focus:outline-none text-base" title="Lihat/Sembunyikan Password">
                            <span id="loginEyeIcon">👁️</span>
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between text-xs pt-1 font-medium">
                    <label class="flex items-center gap-2 text-slate-600 cursor-pointer">
                        <input type="checkbox" class="rounded border-slate-300 text-blue-700 focus:ring-blue-700 w-4 h-4"> Ingat saya
                    </label>
                    <a href="#forgot" class="text-blue-700 font-bold hover:underline">Lupa password?</a>
                </div>

                <!-- Tombol Masuk -->
                <button type="submit" class="w-full mt-2 py-4 bg-blue-700 hover:bg-blue-800 text-white font-extrabold rounded-2xl text-sm shadow-lg shadow-blue-700/25 transition-all duration-200 hover:scale-[1.01] active:scale-[0.99]">
                    → Masuk ke Sistem
                </button>
            </form>

            <div class="text-center mt-6 text-xs text-slate-500 font-medium">
               <p>Belum punya akun? <a href="{{ route('register') }}" class="text-blue-700 font-extrabold hover:underline">Daftar di sini</a></p>
            </div>

            <div class="mt-8 pt-5 border-t border-slate-100 flex items-center justify-center gap-2 text-[11px] text-slate-400 font-medium">
                <span>🎓</span>
                <p>Sistem Bimbingan Akademik Polibatam</p>
            </div>

        </div>

    </div>

    <!-- Script Interaktif untuk Lihat/Sembunyikan Password -->
    <script>
        function toggleLoginPassword() {
            const passwordInput = document.getElementById('loginPassword');
            const eyeIcon = document.getElementById('loginEyeIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.textContent = '👁️‍🗨️'; 
            } else {
                passwordInput.type = 'password';
                eyeIcon.textContent = '👁️'; 
            }
        }
    </script>
</body>
</html>
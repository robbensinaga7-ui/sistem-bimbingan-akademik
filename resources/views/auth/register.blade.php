<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - BIMAKA Polibatam Academic Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
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

    <!-- Container Full Screen -->
    <div class="w-full h-full grid grid-cols-1 lg:grid-cols-12 overflow-hidden bg-slate-900 animate-page-enter">
        
        <!-- PANEL KIRI: GAMBAR KAMPUS & HERO SECTION -->
        <div class="lg:col-span-7 relative h-full flex flex-col justify-between p-8 lg:p-14 text-white overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center scale-105 transition-transform duration-1000" style="background-image: url('https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&w=1600&q=80');"></div>
            <div class="absolute inset-0 bg-gradient-to-tr from-blue-950/95 via-blue-900/85 to-indigo-900/70 backdrop-blur-[2px]"></div>

            <!-- Logo Header -->
            <div class="relative z-10 flex items-center gap-3.5">
                <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-blue-600 to-indigo-500 text-white flex items-center justify-center font-extrabold text-xl shadow-xl shadow-blue-600/30">B</div>
                <div>
                    <span class="text-[10px] font-extrabold uppercase tracking-widest text-blue-300">Sistem Manajemen</span>
                    <h3 class="text-sm font-extrabold tracking-wide text-white">BIMAKA POLIBATAM</h3>
                </div>
            </div>

            <!-- Konten Tengah -->
            <div class="relative z-10 my-auto py-6 max-w-xl">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 text-blue-200 text-xs font-semibold mb-5 backdrop-blur-md border border-white/15 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span> Pendaftaran Akun Sivitas Akademika
                </div>
                <h1 class="text-3xl lg:text-5xl font-extrabold leading-[1.15] tracking-tight mb-5 text-white drop-shadow-sm">
                    Bergabung Bersama <br /><span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-indigo-200">BIMAKA Polibatam</span>
                </h1>
                <p class="text-blue-100/90 text-xs lg:text-sm leading-relaxed mb-8 font-medium">
                    Daftarkan akun mahasiswa atau dosen pembimbing Anda untuk mulai mengelola jadwal konsultasi dan bimbingan tugas akhir secara digital, transparan, dan terstruktur.
                </p>

                <!-- Fitur Unggulan Cards -->
                <div class="grid grid-cols-3 gap-4 max-w-lg">
                    <div class="bg-white/10 hover:bg-white/15 transition-all duration-300 backdrop-blur-md border border-white/15 p-4 rounded-2xl flex flex-col items-center text-center shadow-lg group">
                        <span class="text-xl mb-1.5 group-hover:scale-110 transition-transform">🚀</span>
                        <span class="text-[11px] font-bold text-white tracking-wide">Akses Cepat</span>
                    </div>
                    <div class="bg-white/10 hover:bg-white/15 transition-all duration-300 backdrop-blur-md border border-white/15 p-4 rounded-2xl flex flex-col items-center text-center shadow-lg group">
                        <span class="text-xl mb-1.5 group-hover:scale-110 transition-transform">🔒</span>
                        <span class="text-[11px] font-bold text-white tracking-wide">Aman & Valid</span>
                    </div>
                    <div class="bg-white/10 hover:bg-white/15 transition-all duration-300 backdrop-blur-md border border-white/15 p-4 rounded-2xl flex flex-col items-center text-center shadow-lg group">
                        <span class="text-xl mb-1.5 group-hover:scale-110 transition-transform">⚡</span>
                        <span class="text-[11px] font-bold text-white tracking-wide">Real-time</span>
                    </div>
                </div>
            </div>

            <!-- Footer Kiri -->
            <div class="relative z-10 flex items-center justify-between text-xs text-blue-200/80 pt-4 border-t border-white/15 font-medium">
                <p>© 2026 Politeknik Negeri Batam. All Rights Reserved.</p>
                <a href="{{ route('login') }}" class="hover:text-white transition font-bold flex items-center gap-1.5 group">
                    <span class="group-hover:-translate-x-1 transition-transform">←</span> Sudah punya akun? Masuk
                </a>
            </div>
        </div>

        <!-- PANEL KANAN: KARTU FORM REGISTER -->
        <div class="lg:col-span-5 bg-white h-full p-8 lg:p-12 flex flex-col justify-center overflow-y-auto shadow-2xl z-10 animate-card-pop">
            
            <div class="mb-6 text-center lg:text-left">
                <div class="w-12 h-12 rounded-2xl bg-blue-50 border border-blue-100 flex items-center justify-center text-xl mx-auto lg:mx-0 mb-3 shadow-inner text-blue-700">📝</div>
                <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Buat Akun Baru</h2>
                <p class="text-[11px] font-bold tracking-wider text-slate-400 mt-1 uppercase">Lengkapi data untuk mendaftar ke sistem</p>
                <div class="w-10 h-1 bg-blue-600 rounded-full mt-2.5 mx-auto lg:mx-0"></div>
            </div>

            @if ($errors->any())
                <div class="mb-4 p-3.5 bg-red-50 border border-red-200 text-red-600 text-xs font-semibold rounded-2xl shadow-sm">
                    <ul class="list-disc pl-4 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.submit') }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1.5">Nama Lengkap</label>
                    <input type="text" name="nama" required placeholder="Contoh: Budi Santoso" class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-sm font-semibold bg-slate-50/50 transition">
                </div>

                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1.5">NIM / NIDN</label>
                    <input type="text" name="nim_nidn" required placeholder="Contoh: 3312511099 atau 001234" class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-sm font-semibold bg-slate-50/50 transition">
                </div>

                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1.5">Peran (Role)</label>
                    <select name="role" class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-sm font-semibold bg-slate-50/50 transition">
                        <option value="Mahasiswa">Mahasiswa</option>
                        <option value="Dosen">Dosen</option>
                    </select>
                </div>

                <!-- Input Password dengan Tombol Lihat/Sembunyikan -->
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-600 mb-1.5">Kata Sandi (Password)</label>
                    <div class="relative">
                        <input type="password" id="passwordInput" name="password" required placeholder="Minimal 6 karakter" class="w-full px-4 py-3 pr-12 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-700 text-sm font-semibold bg-slate-50/50 transition">
                        <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-600 focus:outline-none text-base" title="Lihat/Sembunyikan Password">
                            <span id="eyeIcon">👁️</span>
                        </button>
                    </div>
                </div>

                <!-- Tombol Daftar -->
                <button type="submit" class="w-full mt-2 py-3.5 bg-blue-700 hover:bg-blue-800 text-white font-extrabold rounded-2xl text-sm shadow-lg shadow-blue-700/25 transition-all duration-200 hover:scale-[1.01] active:scale-[0.99]">
                    Daftar Akun Sekarang →
                </button>
            </form>

            <div class="text-center mt-5 text-xs text-slate-500 font-medium">
                <p>Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-700 font-extrabold hover:underline">Masuk di sini</a></p>
            </div>

            <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-center gap-2 text-[11px] text-slate-400 font-medium">
                <span>🎓</span>
                <p>Sistem Bimbingan Akademik Polibatam</p>
            </div>

        </div>

    </div>

    <!-- Script Interaktif untuk Lihat/Sembunyikan Password -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('passwordInput');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.textContent = '👁️‍🗨️'; // Indikator password terlihat
            } else {
                passwordInput.type = 'password';
                eyeIcon.textContent = '👁️'; // Indikator password tersembunyi
            }
        }
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi - Portal Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-100 flex h-screen overflow-hidden">

    <!-- SIDEBAR KIRI -->
    <aside class="w-64 bg-[#0f172a] text-white flex flex-col justify-between p-6">
        <div>
            <div class="flex items-center gap-3 mb-10">
                <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center font-extrabold text-lg shadow-lg">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <div>
                    <h2 class="text-base font-extrabold tracking-wide">BIMAKA</h2>
                    <span class="text-[10px] text-blue-400 font-bold tracking-wider uppercase">Bimbingan Akademik</span>
                </div>
            </div>

            <nav class="space-y-1.5">
                <a href="{{ route('student.dashboard') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-400 hover:bg-slate-800 hover:text-white transition text-sm font-medium">
                    <span class="text-lg"></span> Dashboard
                </a>
                <a href="{{ route('mahasiswa.daftar-bimbingan') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-400 hover:bg-slate-800 hover:text-white transition text-sm font-medium">
                    <span class="text-lg"></span> Daftar Bimbingan
                </a>
                <a href="{{ route('mahasiswa.jadwal') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-400 hover:bg-slate-800 hover:text-white transition text-sm font-medium">
                    <span class="text-lg"></span> Jadwal
                </a>
                <a href="{{ route('mahasiswa.status-pengajuan') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-400 hover:bg-slate-800 hover:text-white transition text-sm font-medium">
                    <span class="text-lg"></span> Status Pengajuan
                </a>
                <a href="{{ route('mahasiswa.notifikasi') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl bg-blue-600 text-white font-semibold text-sm shadow-md shadow-blue-600/30">
                    <span class="text-lg"></span> Notifikasi
                </a>
            </nav>
        </div>

        <div>
            <a href="{{ url('/') }}" class="flex items-center gap-3 px-4 py-3 text-red-400 hover:bg-red-500/10 rounded-2xl font-semibold transition text-sm">
                <span class="text-lg"></span> Keluar
            </a>
        </div>
    </aside>

    <!-- KONTEN UTAMA -->
    <main class="flex-1 flex flex-col overflow-y-auto">
        
        <!-- NAVBAR ATAS -->
        <header class="bg-white border-b border-slate-200 px-8 py-4 flex items-center justify-between">
            <div class="text-xs font-bold text-slate-500 tracking-wide">
                Portal Mahasiswa <span class="mx-2 text-slate-300">/</span> <span class="text-slate-900">Notifikasi</span>
            </div>
            
            <div class="flex items-center gap-3">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-bold text-slate-900">{{ session('mahasiswa_nama', 'Robben Sinaga') }}</p>
                </div>
                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center font-extrabold text-xs shadow-sm">
                    {{ substr(session('mahasiswa_nama', 'Robben Sinaga'), 0, 2) }}
                </div>
            </div>
        </header>

        <div class="p-8 space-y-6 max-w-7xl mx-auto w-full">
            
            <!-- HEADER JUDUL -->
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Notifikasi</h1>
                <p class="text-sm text-slate-500 mt-1">Pemberitahuan terbaru terkait status bimbingan dan pesan dari dosen pembimbing.</p>
            </div>

            <!-- PENCARIAN -->
            <div class="bg-white p-4 rounded-3xl border border-slate-200 shadow-sm">
                <div class="relative w-full">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 text-sm">🔍</span>
                    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Cari notifikasi..." class="w-full pl-11 pr-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-600 text-xs font-medium bg-slate-50/50">
                </div>
            </div>

            <!-- DAFTAR NOTIFIKASI (KOSONG BERSIH MENUNGGU DATABASE) -->
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden p-6">
                <div id="notifList" class="space-y-4">
                    @if(isset($notifikasiList) && count($notifikasiList) > 0)
                        @foreach($notifikasiList as $item)
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100 flex items-start gap-4 hover:bg-slate-100/60 transition">
                            <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center text-lg font-bold shrink-0">🔔</div>
                            <div class="flex-1">
                                <h4 class="text-sm font-bold text-slate-900">{{ $item->judul }}</h4>
                                <p class="text-xs text-slate-600 mt-1">{{ $item->pesan }}</p>
                                <span class="text-[10px] text-slate-400 mt-2 block font-medium">{{ $item->created_at }}</span>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="py-16 text-center text-slate-400">
                            <div class="text-4xl mb-2">🔔</div>
                            <p class="text-sm font-bold text-slate-700">Belum ada notifikasi baru.</p>
                            <p class="text-xs text-slate-400 mt-1">Pemberitahuan sistem dan pesan dosen akan muncul di sini secara otomatis.</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </main>

    <!-- SCRIPT PENCARIAN REAL-TIME -->
    <script>
        function searchTable() {
            let input = document.getElementById('searchInput');
            let filter = input.value.toLowerCase();
            let container = document.getElementById('notifList');
            let items = container.getElementsByClassName('transition');

            for (let i = 0; i < items.length; i++) {
                let txtValue = items[i].textContent || items[i].innerText;
                if (txtValue.toLowerCase().indexOf(filter) > -1) {
                    items[i].style.display = "";
                } else {
                    items[i].style.display = "none";
                }
            }
        }
    </script>
</body>
</html>
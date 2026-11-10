<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pengajuan - Portal Mahasiswa</title>
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
                <a href="{{ route('mahasiswa.status-pengajuan') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl bg-blue-600 text-white font-semibold text-sm shadow-md shadow-blue-600/30">
                    <span class="text-lg"></span> Status Pengajuan
                </a>
                <a href="{{ route('mahasiswa.notifikasi') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-slate-400 hover:bg-slate-800 hover:text-white transition text-sm font-medium">
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
                Portal Mahasiswa <span class="mx-2 text-slate-300">/</span> <span class="text-slate-900">Status Pengajuan</span>
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
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Status Pengajuan Bimbingan</h1>
                <p class="text-sm text-slate-500 mt-1">Pantau status persetujuan pengajuan bimbingan akademik Anda.</p>
            </div>

            <!-- PENCARIAN -->
            <div class="bg-white p-4 rounded-3xl border border-slate-200 shadow-sm">
                <div class="relative w-full">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 text-sm">🔍</span>
                    <input type="text" id="searchInput" onkeyup="searchTable('statusTable')" placeholder="Cari pengajuan..." class="w-full pl-11 pr-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:border-blue-600 text-xs font-medium bg-slate-50/50">
                </div>
            </div>

            <!-- TABEL STATUS PENGAJUAN -->
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                   <table id="statusTable" class="w-full text-left border-collapse text-sm">
    <thead>
        <tr class="bg-slate-50 text-slate-400 text-[11px] font-bold uppercase tracking-wider border-b border-slate-100">
            <th class="py-4 px-6 w-16">No</th>
            <th class="py-4 px-6">Tanggal</th>
            <th class="py-4 px-6">Dosen</th>
            <th class="py-4 px-6">Topik</th>
            <th class="py-4 px-6 text-right">Status / Aksi</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-slate-100">
        @if(isset($statusList) && count($statusList) > 0)
            @foreach($statusList as $index => $item)
            <tr class="hover:bg-slate-50/50 transition">
                <td class="py-4 px-6 font-bold text-slate-500">{{ $index + 1 }}</td>
                <td class="py-4 px-6 text-xs text-slate-600 font-medium">{{ $item->tanggal ?? $item->waktu_konsultasi }}</td>
                <td class="py-4 px-6 font-bold text-slate-900">{{ $item->nama_dosen }}</td>
                <td class="py-4 px-6 text-slate-700 font-medium">{{ $item->topik }}</td>
                <td class="py-4 px-6 text-right space-x-2">
                   @if(strtolower($item->status) == 'disetujui')
    <span class="px-3 py-1 bg-emerald-50 text-emerald-600 text-xs font-bold rounded-full">Disetujui</span>
@elseif(strtolower($item->status) == 'ditolak')
    <span class="px-3 py-1 bg-red-50 text-red-600 text-xs font-bold rounded-full">Ditolak</span>
@elseif(strtolower($item->status) == 'selesai')
    <span class="px-3 py-1 bg-indigo-50 text-indigo-600 text-xs font-bold rounded-full">Selesai</span>
@elseif(strtolower($item->status) == 'dibatalkan')
    <span class="px-3 py-1 bg-slate-100 text-slate-500 text-xs font-bold rounded-full">Dibatalkan</span>
@else
    <span class="px-3 py-1 bg-amber-50 text-amber-600 text-xs font-bold rounded-full mr-2">Menunggu</span>
    
    <form action="{{ route('mahasiswa.pengajuan.batal', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan pengajuan bimbingan ini?')">
        @csrf
        @method('DELETE') <!-- Atau PUT jika menggunakan route update -->
        <button type="submit" class="px-2.5 py-1 bg-red-50 hover:bg-red-600 text-red-600 hover:text-white rounded-xl text-xs font-bold transition">Batalkan</button>
    </form>
@endif
                </td>
            </tr>
            @endforeach
        @else
            <tr id="emptyRow">
                <td colspan="5" class="py-16 text-center text-slate-400">
                    <div class="text-4xl mb-2">📋</div>
                    <p class="text-sm font-bold text-slate-700">Belum ada riwayat status pengajuan.</p>
                </td>
            </tr>
        @endif
    </tbody>
</table>
                </div>

                <!-- FOOTER -->
                <div class="px-6 py-4 bg-slate-50/50 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                    <p class="font-medium">Menampilkan data pengajuan aktif</p>
                    <div class="flex items-center gap-1 font-bold">
                        <span class="px-3 py-1.5 bg-blue-900 text-white rounded-xl shadow-sm">1</span>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script>
        function searchTable(tableId) {
            let input = document.getElementById('searchInput');
            let filter = input.value.toLowerCase();
            let table = document.getElementById(tableId);
            let tr = table.getElementsByTagName('tr');

            for (let i = 1; i < tr.length; i++) {
                if (tr[i].id === 'emptyRow') continue;
                let txtValue = tr[i].textContent || tr[i].innerText;
                if (txtValue.toLowerCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    </script>
</body>
</html>
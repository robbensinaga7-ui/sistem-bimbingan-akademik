import React, { useState } from 'react';
import { 
  LayoutDashboard, Users, UserCheck, FileText, Calendar, 
  BarChart3, Settings, LogOut, Bell, Search, CheckCircle2, 
  Clock, XCircle, Plus, Filter, Eye, ChevronRight
} from 'lucide-react';
import {
  Chart as ChartJS, CategoryScale, LinearScale, PointElement,
  LineElement, BarElement, Title, Tooltip, Legend, ArcElement
} from 'chart.js';
import { Line, Doughnut } from 'react-chartjs-2';

// Register Chart.js Components
ChartJS.register(
  CategoryScale, LinearScale, PointElement, LineElement, 
  BarElement, Title, Tooltip, Legend, ArcElement
);

export default function AdminDashboard() {
  const [filterStatus, setFilterStatus] = useState('Semua');
  const [searchTerm, setSearchTerm] = useState('');

  // Data Contoh Pengajuan Bimbingan
  const dataBimbingan = [
    { id: 1, nim: '21010123', nama: 'Budi Santoso', dosen: 'Dr. Ahmad Dahlan, M.T.', tanggal: '19 Okt 2026', status: 'Pending', topik: 'Pengembangan Sistem Kasir Berbasis Web' },
    { id: 2, nim: '21010145', nama: 'Siti Rahma', dosen: 'Prof. Ir. Handoko, Ph.D.', tanggal: '19 Okt 2026', status: 'Disetujui', topik: 'Optimasi Database Menggunakan Redis' },
    { id: 3, nim: '21010189', nama: 'Rian Hidayat', dosen: 'Anita Wijaya, S.Kom., M.Sc.', tanggal: '18 Okt 2026', status: 'Selesai', topik: 'Analisis Keamanan Jaringan IoT' },
    { id: 4, nim: '21010202', nama: 'Dewi Lestari', dosen: 'Dr. Ahmad Dahlan, M.T.', tanggal: '17 Okt 2026', status: 'Ditolak', topik: 'Implementasi Machine Learning untuk Prediksi Cuaca' },
  ];

  // Config Chart Line (Tren Bimbingan)
  const lineData = {
    labels: ['Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt'],
    datasets: [{
      label: 'Jumlah Bimbingan',
      data: [42, 58, 65, 80, 95, 112],
      borderColor: '#2B3A4A',
      backgroundColor: 'rgba(43, 58, 74, 0.1)',
      tension: 0.4,
      fill: true
    }]
  };

  // Config Chart Doughnut (Status Bimbingan)
  const doughnutData = {
    labels: ['Disetujui', 'Pending', 'Selesai', 'Ditolak'],
    datasets: [{
      data: [45, 12, 38, 5],
      backgroundColor: ['#3B82F6', '#F59E0B', '#10B981', '#EF4444'],
      borderWidth: 0
    }]
  };

  // Filter Data
  const filteredData = dataBimbingan.filter(item => {
    const matchStatus = filterStatus === 'Semua' || item.status === filterStatus;
    const matchSearch = item.nama.toLowerCase().includes(searchTerm.toLowerCase()) || 
                        item.nim.includes(searchTerm);
    return matchStatus && matchSearch;
  });

  return (
    <div className="flex h-screen bg-[#F8FAFC] font-sans antialiased text-slate-800">
      {/* Sidebar */}
      <aside className="w-64 bg-[#2B3A4A] text-white flex flex-col justify-between p-5">
        <div>
          <div className="flex items-center gap-3 mb-8 px-2">
            <div className="w-10 h-10 bg-blue-500 rounded-xl flex items-center justify-center font-bold text-xl text-white">B</div>
            <div>
              <h1 className="font-bold text-lg leading-none">BIMAKA</h1>
              <span className="text-xs text-slate-300">Admin Academic</span>
            </div>
          </div>

          <nav className="space-y-1">
            <a href="#" className="flex items-center gap-3 px-4 py-3 bg-white/10 rounded-xl text-white font-medium">
              <LayoutDashboard size={20} /> Dashboard
            </a>
            <a href="#" className="flex items-center gap-3 px-4 py-3 text-slate-300 hover:bg-white/5 rounded-xl transition">
              <Users size={20} /> Data Mahasiswa
            </a>
            <a href="#" className="flex items-center gap-3 px-4 py-3 text-slate-300 hover:bg-white/5 rounded-xl transition">
              <UserCheck size={20} /> Data Dosen
            </a>
            <a href="#" className="flex items-center gap-3 px-4 py-3 text-slate-300 hover:bg-white/5 rounded-xl transition">
              <FileText size={20} /> Pengajuan Bimbingan
            </a>
            <a href="#" className="flex items-center gap-3 px-4 py-3 text-slate-300 hover:bg-white/5 rounded-xl transition">
              <Calendar size={20} /> Jadwal Bimbingan
            </a>
            <a href="#" className="flex items-center gap-3 px-4 py-3 text-slate-300 hover:bg-white/5 rounded-xl transition">
              <BarChart3 size={20} /> Laporan & Rekap
            </a>
          </nav>
        </div>

        <div className="pt-4 border-t border-slate-700">
          <div className="flex items-center gap-3 px-2 mb-3">
            <div className="w-9 h-9 rounded-full bg-slate-600 flex items-center justify-center text-sm font-semibold">AD</div>
            <div className="truncate">
              <p className="text-sm font-medium truncate">Administrator</p>
              <p className="text-xs text-slate-400 truncate">admin@bimaka.ac.id</p>
            </div>
          </div>
          <button className="w-full flex items-center justify-center gap-2 px-4 py-2 bg-red-500/10 text-red-400 rounded-xl hover:bg-red-500/20 text-sm font-medium transition">
            <LogOut size={16} /> Keluar
          </button>
        </div>
      </aside>

      {/* Main Content Area */}
      <div className="flex-1 flex flex-col overflow-y-auto">
        {/* Header Bar */}
        <header className="h-16 bg-white border-b border-slate-200 px-8 flex items-center justify-between sticky top-0 z-10">
          <div className="relative w-72">
            <Search className="absolute left-3 top-2.5 text-slate-400" size={18} />
            <input 
              type="text" 
              placeholder="Cari mahasiswa, NIM, atau dosen..."
              value={searchTerm}
              onChange={(e) => setSearchTerm(e.target.value)}
              className="w-full pl-10 pr-4 py-2 bg-slate-100 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20"
            />
          </div>

          <div className="flex items-center gap-4">
            <span className="flex items-center gap-2 px-3 py-1 bg-emerald-50 text-emerald-600 text-xs font-semibold rounded-full border border-emerald-200">
              <span className="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> System Live
            </span>
            <button className="p-2 text-slate-500 hover:bg-slate-100 rounded-xl relative">
              <Bell size={20} />
              <span className="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full"></span>
            </button>
          </div>
        </header>

        {/* Dashboard Body */}
        <main className="p-8 space-y-8">
          <div>
            <h2 className="text-2xl font-bold text-slate-900">Dashboard Utama</h2>
            <p className="text-slate-500 text-sm">Selamat datang kembali! Berikut ringkasan aktivitas bimbingan akademik terkini.</p>
          </div>

          {/* KPI Stat Cards */}
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            <div className="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
              <div className="p-3 bg-blue-50 text-blue-600 rounded-xl"><Users size={24} /></div>
              <div>
                <p className="text-xs text-slate-500 font-medium">Total Mahasiswa</p>
                <h3 className="text-2xl font-bold text-slate-800">1,248</h3>
              </div>
            </div>

            <div className="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
              <div className="p-3 bg-indigo-50 text-indigo-600 rounded-xl"><UserCheck size={24} /></div>
              <div>
                <p className="text-xs text-slate-500 font-medium">Dosen Pembimbing</p>
                <h3 className="text-2xl font-bold text-slate-800">64</h3>
              </div>
            </div>

            <div className="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
              <div className="p-3 bg-amber-50 text-amber-600 rounded-xl"><Clock size={24} /></div>
              <div>
                <p className="text-xs text-slate-500 font-medium">Pengajuan Pending</p>
                <h3 className="text-2xl font-bold text-slate-800">12</h3>
              </div>
            </div>

            <div className="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
              <div className="p-3 bg-emerald-50 text-emerald-600 rounded-xl"><CheckCircle2 size={24} /></div>
              <div>
                <p className="text-xs text-slate-500 font-medium">Bimbingan Selesai</p>
                <h3 className="text-2xl font-bold text-slate-800">38</h3>
              </div>
            </div>
          </div>

          {/* Charts Row */}
          <div className="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div className="lg:col-span-2 bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
              <h3 className="font-bold text-slate-800 mb-4">Tren Bimbingan Akademik (2026)</h3>
              <div className="h-64">
                <Line data={lineData} options={{ responsive: true, maintainAspectRatio: false }} />
              </div>
            </div>

            <div className="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
              <h3 className="font-bold text-slate-800 mb-4">Status Pengajuan</h3>
              <div className="h-64 flex items-center justify-center">
                <Doughnut data={doughnutData} options={{ responsive: true, maintainAspectRatio: false }} />
              </div>
            </div>
          </div>

          {/* Data Table Section */}
          <div className="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
            <div className="p-6 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
              <div>
                <h3 className="font-bold text-slate-800 text-lg">Pengajuan Bimbingan Terbaru</h3>
                <p className="text-xs text-slate-500">Daftar pengajuan jadwal dan topik bimbingan dari mahasiswa.</p>
              </div>

              {/* Status Filter Buttons */}
              <div className="flex items-center gap-1 bg-slate-100 p-1 rounded-xl text-xs font-medium">
                {['Semua', 'Pending', 'Disetujui', 'Selesai', 'Ditolak'].map((status) => (
                  <button
                    key={status}
                    onClick={() => setFilterStatus(status)}
                    className={`px-3 py-1.5 rounded-lg transition ${
                      filterStatus === status 
                        ? 'bg-white text-slate-800 shadow-sm font-semibold' 
                        : 'text-slate-500 hover:text-slate-800'
                    }`}
                  >
                    {status}
                  </button>
                ))}
              </div>
            </div>

            {/* Table */}
            <div className="overflow-x-auto">
              <table className="w-full text-left text-sm text-slate-600">
                <thead className="bg-slate-50 text-slate-500 text-xs font-semibold uppercase tracking-wider">
                  <tr>
                    <th className="px-6 py-4">Mahasiswa</th>
                    <th className="px-6 py-4">Dosen Pembimbing</th>
                    <th className="px-6 py-4">Topik Bimbingan</th>
                    <th className="px-6 py-4">Tanggal</th>
                    <th className="px-6 py-4">Status</th>
                    <th className="px-6 py-4 text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody className="divide-y divide-slate-100">
                  {filteredData.map((row) => (
                    <tr key={row.id} className="hover:bg-slate-50/80 transition">
                      <td className="px-6 py-4">
                        <p className="font-semibold text-slate-800">{row.nama}</p>
                        <p className="text-xs text-slate-400">NIM: {row.nim}</p>
                      </td>
                      <td className="px-6 py-4 font-medium text-slate-700">{row.dosen}</td>
                      <td className="px-6 py-4 max-w-xs truncate text-slate-600">{row.topik}</td>
                      <td className="px-6 py-4 text-slate-500 text-xs">{row.tanggal}</td>
                      <td className="px-6 py-4">
                        <span className={`px-2.5 py-1 rounded-full text-xs font-semibold inline-flex items-center gap-1.5 ${
                          row.status === 'Disetujui' ? 'bg-blue-50 text-blue-600' :
                          row.status === 'Pending' ? 'bg-amber-50 text-amber-600' :
                          row.status === 'Selesai' ? 'bg-emerald-50 text-emerald-600' :
                          'bg-red-50 text-red-600'
                        }`}>
                          {row.status}
                        </span>
                      </td>
                      <td className="px-6 py-4 text-center">
                        <button className="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">
                          <Eye size={18} />
                        </button>
                      </td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
          </div>
        </main>
      </div>
    </div>
  );
}
import React, { useState } from "react";
import "../css/app.css";

function App() {
  const [currentPage, setCurrentPage] = useState("home"); // 'home', 'login', 'admin_dashboard', 'student_dashboard'
  const [identifier, setIdentifier] = useState("");
  const [password, setPassword] = useState("");

  const handleLoginSubmit = (e) => {
    e.preventDefault();
    
    // Deteksi otomatis role berdasarkan input user (Sesuai arahan dosen)
    const idLower = identifier.trim().toLowerCase();
    
    if (idLower === "admin" || idLower.includes("admin")) {
      setCurrentPage("admin_dashboard");
    } else if (idLower.length === 10 || !isNaN(idLower)) {
      // Asumsi NIM mahasiswa biasanya berupa angka / panjang 10 digit
      setCurrentPage("student_dashboard");
    } else {
      // Jika format NIDN / NIP atau dosen
      alert("Berhasil masuk sebagai Dosen Pembimbing!");
    }
  };

  // ================= 1. DASHBOARD ADMIN =================
  if (currentPage === "admin_dashboard") {
    return (
      <div className="dashboard-container page-entrance-anim">
        <aside className="dashboard-sidebar">
          <div className="sidebar-brand">
            <div className="logo-icon glow-logo" style={{ width: "36px", height: "36px", fontSize: "18px" }}>B</div>
            <div className="logo-text">
              <h2>BIMAKA</h2>
              <span>Admin Panel</span>
            </div>
          </div>
          <div className="sidebar-menu">
            <a href="#overview" className="menu-item active">📈 Overview Sistem</a>
            <a href="#pengguna" className="menu-item">👥 Kelola Pengguna</a>
            <a href="#pengajuan" className="menu-item">📝 Validasi Bimbingan</a>
          </div>
          <button onClick={() => setCurrentPage("home")} className="logout-btn">Keluar (Logout)</button>
        </aside>

        <main className="dashboard-main">
          <header className="dashboard-header">
            <h3>Panel Kontrol Administrator</h3>
            <span className="badge-status approved">Super Admin</span>
          </header>
          <div className="dashboard-content">
            <div className="welcome-banner" style={{ background: "linear-gradient(135deg, #0f172a 0%, #1e40af 100%)" }}>
              <div>
                <h2>Halo, Admin! ⚡</h2>
                <p>Kelola data akun pengguna dan validasi jadwal bimbingan akademik di sini.</p>
              </div>
            </div>
            <div className="stats-grid-dash">
              <div className="stat-card-dash"><span>Total Mahasiswa</span><h3>1,240</h3></div>
              <div className="stat-card-dash"><span>Total Dosen</span><h3>86</h3></div>
              <div className="stat-card-dash"><span>Pengajuan Aktif</span><h3>14</h3></div>
            </div>
            <div className="table-card">
              <h3>Daftar Pengajuan Masuk</h3>
              <table className="custom-table">
                <thead>
                  <tr>
                    <th>Mahasiswa</th>
                    <th>Dosen Pembimbing</th>
                    <th>Waktu</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Robben Lamtipando (3312511075)</td>
                    <td>Dr. Ir. Dosen Pembimbing, M.T.</td>
                    <td>Rabu, 21 Okt — 10.00 WIB</td>
                    <td><span className="badge-status pending">Pending</span></td>
                    <td>
                      <button className="btn-approve" onClick={() => alert("Pengajuan Disetujui!")}>Setujui</button>
                      <button className="btn-reject" onClick={() => alert("Pengajuan Ditolak!")}>Tolak</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </main>
      </div>
    );
  }

  // ================= 2. HALAMAN LOGIN MODERN (TANPA DROPDOWN ROLE) =================
  if (currentPage === "login") {
    return (
      <div className="login-hero-layout page-entrance-anim">
        {/* PANEL KIRI: KAMPUS BACKGROUND */}
        <div className="hero-left-panel slide-in-left">
          <div className="hero-overlay"></div>
          
          <div className="hero-left-header">
            <div className="brand-badge-hero">
              <div className="brand-logo-icon glow-pulse">🎓</div>
              <div>
                <h2>SISTEM INFORMASI</h2>
                <span>BIMBINGAN AKADEMIK</span>
              </div>
            </div>
          </div>

          <div className="hero-left-content">
            <h1>
              Bimbingan Akademik <br />
              <i>dengan Lebih Easy & Terarah</i>
            </h1>
            <p>
              Sistem manajemen bimbingan akademik yang membantu mengelola konsultasi tugas akhir,
              penjadwalan dosen, hingga progres mahasiswa secara terintegrasi dalam satu portal.
            </p>

            <div className="hero-features-list">
              <div className="feature-item-pill float-item-1">
                <span className="f-icon">📅</span>
                <div className="f-text">
                  <strong>Penjadwalan</strong>
                  <small>Terstruktur</small>
                </div>
              </div>
              <div className="feature-item-pill float-item-2">
                <span className="f-icon">👨‍🏫</span>
                <div className="f-text">
                  <strong>Konsultasi</strong>
                  <small>Dosen & Mhs</small>
                </div>
              </div>
              <div className="feature-item-pill float-item-3">
                <span className="f-icon">⚡</span>
                <div className="f-text">
                  <strong>Integrasi</strong>
                  <small>Polibatam</small>
                </div>
              </div>
            </div>
          </div>

          <div className="hero-left-footer">
            <p>Dari Pengajuan Hingga Kelulusan Terbaik</p>
            <button onClick={() => setCurrentPage("home")} className="btn-back-hero hover-bounce">
              ← Kembali ke Beranda
            </button>
          </div>
        </div>

        {/* PANEL KANAN: FLOATING CARD LOGIN OTOMATIS */}
        <div className="hero-right-panel slide-in-right">
          <div className="login-floating-card card-pop-up">
            <div className="card-top-icon">
              <div className="academic-cap-icon glow-pulse">🎓</div>
            </div>

            <div className="card-header-text">
              <h2>Selamat Datang</h2>
              <p>MASUK KE SISTEM BIMBINGAN AKADEMIK</p>
              <div className="blue-divider"></div>
            </div>

            <form onSubmit={handleLoginSubmit} className="hero-form-body">
              <div className="form-group-hero">
                <label className="select-label">Username / NIM / NIDN</label>
                <div className="input-with-icon">
                  <span className="input-icon">👤</span>
                  <input
                    type="text"
                    value={identifier}
                    onChange={(e) => setIdentifier(e.target.value)}
                    placeholder="Masukkan NIM, NIDN, atau Username"
                    required
                  />
                </div>
              </div>

              <div className="form-group-hero">
                <label className="select-label">Password</label>
                <div className="input-with-icon">
                  <span className="input-icon">🔒</span>
                  <input
                    type="password"
                    value={password}
                    onChange={(e) => setPassword(e.target.value)}
                    placeholder="Masukkan kata sandi"
                    required
                  />
                </div>
              </div>

              <div className="form-options-hero">
                <label className="remember-me-hero">
                  <input type="checkbox" /> Ingat saya
                </label>
                <a href="#forgot" className="forgot-link-hero">
                  Lupa password?
                </a>
              </div>

              <button type="submit" className="btn-submit-hero animated-btn">
                → Masuk ke Sistem
              </button>
            </form>

            <div className="card-footer-note">
              <p>Belum punya akun? <a href="#register">Daftar Mahasiswa</a></p>
              <div className="mini-sub-footer">
                <span className="mini-icon">🎓</span>
                <div>
                  <strong>Sistem Informasi BIMAKA</strong>
                  <small>Efisien • Terintegrasi • Profesional</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  }

  // ================= 3. LANDING PAGE UTAMA =================
  return (
    <div className="landing-page page-entrance-anim">
      {/* NAVBAR */}
      <nav className="navbar">
        <div className="container navbar-content">
          <div className="logo" onClick={() => setCurrentPage("home")}>
            <div className="logo-icon glow-logo">B</div>
            <div className="logo-text">
              <h2>BIMAKA</h2>
              <span>Bimbingan Akademik</span>
            </div>
          </div>

          <div className="nav-menu">
            <a href="#beranda" className="active">Beranda</a>
            <a href="#tentang">Tentang</a>
            <a href="#fitur">Fitur</a>
            <a href="#alur">Alur</a>
          </div>

          <button onClick={() => setCurrentPage("login")} className="login-button animated-btn">
            Masuk
          </button>
        </div>
      </nav>

      {/* HERO SECTION */}
      <section className="hero" id="beranda">
        <div className="hero-bg-glow glow-shape"></div>
        <div className="container hero-content">
          <div className="hero-text slide-in-left">
            <div className="badge">
              <span className="badge-dot"></span>
              Sistem Bimbingan Akademik
            </div>
            <h1>
              Bimbingan Akademik <br />
              <span className="gradient-text">Lebih Mudah & Terarah</span>
            </h1>
            <p>
              BIMAKA membantu mahasiswa dan dosen dalam mengelola proses bimbingan akademik secara efisien, mulai dari pendaftaran hingga penjadwalan bimbingan secara terpusat.
            </p>
            <div className="hero-buttons">
              <button onClick={() => setCurrentPage("login")} className="primary-button animated-btn">
                Mulai Bimbingan
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round">
                  <line x1="5" y1="12" x2="19" y2="12"></line>
                  <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
              </button>
              <a href="#tentang" className="secondary-button hover-bounce">Pelajari Selengkapnya</a>
            </div>
            <div className="hero-stats">
              <div className="stat-item"><strong>Mahasiswa</strong><span>Kemudahan Pendaftaran</span></div>
              <div className="stat-divider"></div>
              <div className="stat-item"><strong>Dosen</strong><span>Manajemen Jadwal</span></div>
              <div className="stat-divider"></div>
              <div className="stat-item"><strong>Terintegrasi</strong><span>Informasi Terpusat</span></div>
            </div>
          </div>

          {/* DASHBOARD PREVIEW CARD */}
          <div className="hero-visual slide-in-right">
            <div className="glass-card main-card float-card">
              <div className="card-header">
                <div className="card-brand">
                  <div className="mini-logo glow-logo">B</div>
                  <div>
                    <h4>BIMAKA Portal</h4>
                    <small>Bimbingan Akademik Active</small>
                  </div>
                </div>
                <span className="live-badge">Live</span>
              </div>
              <div className="schedule-box">
                <div className="schedule-icon">📅</div>
                <div className="schedule-info">
                  <small>Jadwal Bimbingan Berikutnya</small>
                  <strong>Hari ini, 10.00 WIB</strong>
                </div>
                <span className="status-tag">Aktif</span>
              </div>
              <div className="metrics-grid">
                <div className="metric-card"><span className="metric-icon">📝</span><div className="metric-data"><h3>12</h3><span>Pengajuan</span></div></div>
                <div className="metric-card"><span className="metric-icon">⏳</span><div className="metric-data"><h3>08</h3><span>Terjadwal</span></div></div>
                <div className="metric-card"><span className="metric-icon">✅</span><div className="metric-data"><h3>24</h3><span>Selesai</span></div></div>
              </div>
            </div>
            <div className="floating-badge badge-top float-badge-slow">
              <span className="icon">🎉</span>
              <div>
                <strong>Bimbingan Disetujui</strong>
                <small>Baru saja</small>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* TENTANG SECTION */}
      <section className="about-section" id="tentang">
        <div className="container">
          <div className="section-heading">
            <span className="section-label">TENTANG BIMAKA</span>
            <h2>Satu Platform untuk <span>Bimbingan Akademik</span></h2>
            <p>BIMAKA dirancang untuk membantu proses bimbingan akademik menjadi lebih terorganisir, mudah dipantau, dan nyaman digunakan.</p>
          </div>
          <div className="about-grid">
            <div className="about-card hover-card"><div className="about-icon">🎓</div><h3>Untuk Mahasiswa</h3><p>Mahasiswa dapat melakukan pendaftaran bimbingan dan memilih jadwal yang tersedia secara real-time.</p></div>
            <div className="about-card hover-card"><div className="about-icon">👨‍🏫</div><h3>Untuk Dosen</h3><p>Dosen dapat mengelola jadwal, menerima atau menolak pengajuan bimbingan dengan fleksibel.</p></div>
            <div className="about-card hover-card"><div className="about-icon">📊</div><h3>Data Terorganisir</h3><p>Informasi bimbingan tersimpan terpusat sehingga monitoring data lebih akurat.</p></div>
          </div>
        </div>
      </section>

      {/* FITUR SECTION */}
      <section className="features-section" id="fitur">
        <div className="container">
          <div className="section-heading">
            <span className="section-label">FITUR UTAMA</span>
            <h2>Layanan Unggulan <span>BIMAKA</span></h2>
          </div>
          <div className="features-grid">
            <div className="feature-card hover-card"><h3>📅 Penjadwalan Fleksibel</h3><p>Pilih slot waktu bimbingan yang pas.</p></div>
            <div className="feature-card hover-card"><h3>🔔 Notifikasi Real-Time</h3><p>Status pengajuan ter-update langsung.</p></div>
            <div className="feature-card hover-card"><h3>📁 Pengelolaan Dokumen</h3><p>Unggah draft tugas akhir dengan aman.</p></div>
          </div>
        </div>
      </section>

      {/* ALUR SECTION */}
      <section className="workflow-section" id="alur">
        <div className="container">
          <div className="section-heading">
            <span className="section-label">ALUR PENGGUNAAN</span>
            <h2>Langkah Mudah <span>Bimbingan</span></h2>
          </div>
          <div className="workflow-grid">
            <div className="workflow-card hover-card"><div className="step-number">01</div><h3>Login Akun</h3><p>Masuk ke portal terintegrasi.</p></div>
            <div className="workflow-card hover-card"><div className="step-number">02</div><h3>Ajukan Bimbingan</h3><p>Pilih waktu dan unggah divider.</p></div>
            <div className="workflow-card hover-card"><div className="step-number">03</div><h3>Konfirmasi Dosen</h3><p>Dosen memvalidasi pengajuan.</p></div>
            <div className="workflow-card hover-card"><div className="step-number">04</div><h3>Sesi Selesai</h3><p>Simpan catatan bimbingan.</p></div>
          </div>
        </div>
      </section>

      {/* FOOTER */}
      <footer>
        <div className="container">
          <p>© 2026 BIMAKA. Sistem Informasi Bimbingan Akademik.</p>
        </div>
      </footer>
    </div>
  );
}

export default App;
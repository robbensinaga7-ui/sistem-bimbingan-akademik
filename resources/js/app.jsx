import React, { useState } from "react";
import "../css/app.css";

function App() {
  const [currentPage, setCurrentPage] = useState("home");
  const [role, setRole] = useState("mahasiswa"); // 'mahasiswa' atau 'dosen'

  const handleLoginSubmit = (e) => {
    e.preventDefault();
    alert(`Berhasil masuk sebagai ${role === "mahasiswa" ? "Mahasiswa" : "Dosen Pembimbing"}!`);
  };

  // TAMPILAN HALAMAN LOGIN DENGAN ANIMASI
  if (currentPage === "login") {
    return (
      <div className="login-page-container">
        <div className="login-card">
          <div className="login-header">
            <div className="login-logo">B</div>
            <h2>Masuk ke BIMAKA</h2>
            <p>Sistem Informasi Bimbingan Akademik</p>
          </div>

          <div className="role-selector">
            <button
              type="button"
              className={`role-btn ${role === "mahasiswa" ? "active" : ""}`}
              onClick={() => setRole("mahasiswa")}
            >
              Mahasiswa
            </button>
            <button
              type="button"
              className={`role-btn ${role === "dosen" ? "active" : ""}`}
              onClick={() => setRole("dosen")}
            >
              Dosen Pembimbing
            </button>
          </div>

          <form onSubmit={handleLoginSubmit}>
            <div className="form-group">
              <label>{role === "mahasiswa" ? "NIM (Nomor Induk Mahasiswa)" : "NIDN / NIP Dosen"}</label>
              <input
                type="text"
                className="form-control"
                placeholder={role === "mahasiswa" ? "Contoh: 3312511075" : "Contoh: 0012345678"}
                required
              />
            </div>

            <div className="form-group">
              <label>Kata Sandi (Password)</label>
              <input
                type="password"
                className="form-control"
                placeholder="Masukkan kata sandi akun"
                required
              />
            </div>

            <div className="form-options">
              <label className="remember-me">
                <input type="checkbox" /> Ingat saya
              </label>
              <a href="#forgot" className="forgot-password">Lupa sandi?</a>
            </div>

            <button type="submit" className="submit-btn">
              Masuk Sekarang
            </button>
          </form>

          <div className="back-to-home">
            <button onClick={() => setCurrentPage("home")}>
              ← Kembali ke Beranda Utama
            </button>
          </div>
        </div>
      </div>
    );
  }

  // TAMPILAN LANDING PAGE UTAMA
  return (
    <div className="landing-page">
      {/* ================= NAVBAR ================= */}
      <nav className="navbar">
        <div className="container navbar-content">
          <div className="logo" onClick={() => setCurrentPage("home")}>
            <div className="logo-icon">B</div>
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

          <button onClick={() => setCurrentPage("login")} className="login-button" style={{ border: "none", cursor: "pointer" }}>
            Masuk
          </button>
        </div>
      </nav>

      {/* ================= HERO SECTION ================= */}
      <section className="hero" id="beranda">
        <div className="hero-bg-glow"></div>
        <div className="container hero-content">
          <div className="hero-text">
            <div className="badge">
              <span className="badge-dot"></span>
              Sistem Bimbingan Akademik
            </div>

            <h1>
              Bimbingan Akademik <br />
              <span className="gradient-text">Lebih Mudah & Terarah</span>
            </h1>

            <p>
              BIMAKA membantu mahasiswa dan dosen dalam mengelola proses
              bimbingan akademik secara efisien, mulai dari pendaftaran hingga
              penjadwalan bimbingan secara terpusat.
            </p>

            <div className="hero-buttons">
              <button onClick={() => setCurrentPage("login")} className="primary-button" style={{ border: "none", cursor: "pointer" }}>
                Mulai Bimbingan
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round">
                  <line x1="5" y1="12" x2="19" y2="12"></line>
                  <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
              </button>

              <a href="#tentang" className="secondary-button">
                Pelajari Selengkapnya
              </a>
            </div>

            <div className="hero-stats">
              <div className="stat-item">
                <strong>Mahasiswa</strong>
                <span>Kemudahan Pendaftaran</span>
              </div>
              <div className="stat-divider"></div>
              <div className="stat-item">
                <strong>Dosen</strong>
                <span>Manajemen Jadwal</span>
              </div>
              <div className="stat-divider"></div>
              <div className="stat-item">
                <strong>Terintegrasi</strong>
                <span>Informasi Terpusat</span>
              </div>
            </div>
          </div>

          {/* DASHBOARD PREVIEW CARD */}
          <div className="hero-visual">
            <div className="glass-card main-card">
              <div className="card-header">
                <div className="card-brand">
                  <div className="mini-logo">B</div>
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
                <div className="metric-card">
                  <span className="metric-icon">📝</span>
                  <div className="metric-data">
                    <h3>12</h3>
                    <span>Pengajuan</span>
                  </div>
                </div>
                <div className="metric-card">
                  <span className="metric-icon">⏳</span>
                  <div className="metric-data">
                    <h3>08</h3>
                    <span>Terjadwal</span>
                  </div>
                </div>
                <div className="metric-card">
                  <span className="metric-icon">✅</span>
                  <div className="metric-data">
                    <h3>24</h3>
                    <span>Selesai</span>
                  </div>
                </div>
              </div>
            </div>

            <div className="floating-badge badge-top">
              <span className="icon">🎉</span>
              <div>
                <strong>Bimbingan Disetujui</strong>
                <small>Baru saja</small>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* ================= TENTANG ================= */}
      <section className="about-section" id="tentang">
        <div className="container">
          <div className="section-heading">
            <span className="section-label">TENTANG BIMAKA</span>
            <h2>Satu Platform untuk <span>Bimbingan Akademik</span></h2>
            <p>
              BIMAKA dirancang untuk membantu proses bimbingan akademik menjadi
              lebih terorganisir, mudah dipantau, dan nyaman digunakan.
            </p>
          </div>

          <div className="about-grid">
            <div className="about-card">
              <div className="about-icon">🎓</div>
              <h3>Untuk Mahasiswa</h3>
              <p>
                Mahasiswa dapat melakukan pendaftaran bimbingan, memilih jadwal
                yang tersedia, dan melihat status pengajuan secara real-time.
              </p>
            </div>

            <div className="about-card">
              <div className="about-icon">👨‍🏫</div>
              <h3>Untuk Dosen</h3>
              <p>
                Dosen dapat mengelola jadwal, menerima atau menolak pengajuan,
                serta melihat riwayat bimbingan mahasiswa dengan fleksibel.
              </p>
            </div>

            <div className="about-card">
              <div className="about-icon">📊</div>
              <h3>Data Terorganisir</h3>
              <p>
                Informasi bimbingan tersimpan secara terpusat sehingga proses
                monitoring dan rekap data menjadi lebih mudah dan akurat.
              </p>
            </div>
          </div>
        </div>
      </section>

      {/* ================= FITUR UNGGULAN ================= */}
      <section className="features-section" id="fitur">
        <div className="container">
          <div className="section-heading">
            <span className="section-label">FITUR UTAMA</span>
            <h2>Layanan Unggulan <span>BIMAKA</span></h2>
            <p>
              Berbagai fitur praktis yang dibuat untuk mempercepat dan mempermudah
              proses bimbingan akademik.
            </p>
          </div>

          <div className="features-grid">
            <div className="feature-card">
              <div className="feature-icon-wrapper">📅</div>
              <h3>Penjadwalan Fleksibel</h3>
              <p>
                Mahasiswa dapat melihat slot waktu dosen yang tersedia dan memilih
                jadwal bimbingan dengan fleksibel.
              </p>
            </div>

            <div className="feature-card">
              <div className="feature-icon-wrapper">🔔</div>
              <h3>Notifikasi Real-Time</h3>
              <p>
                Dapatkan pembaruan langsung terkait status pengajuan bimbingan,
                apakah disetujui, diubah, atau ditolak.
              </p>
            </div>

            <div className="feature-card">
              <div className="feature-icon-wrapper">📁</div>
              <h3>Pengelolaan Dokumen</h3>
              <p>
                Unggah draft tugas akhir atau dokumen akademik dengan aman
                untuk ditinjau langsung oleh Dosen Pembimbing.
              </p>
            </div>

            <div className="feature-card">
              <div className="feature-icon-wrapper">💬</div>
              <h3>Catatan Bimbingan</h3>
              <p>
                Simpan dan catat setiap hasil masukan dari dosen pada setiap sesi
                bimbingan agar revisi lebih terstruktur.
              </p>
            </div>

            <div className="feature-card">
              <div className="feature-icon-wrapper">📈</div>
              <h3>Monitoring Progres</h3>
              <p>
                Pantau riwayat sesi bimbingan yang telah diselesaikan hingga
                mencapai target kelulusan bimbingan.
              </p>
            </div>

            <div className="feature-card">
              <div className="feature-icon-wrapper">🔒</div>
              <h3>Akses Terintegrasi</h3>
              <p>
                Satu akun terintegrasi secara langsung untuk Admin, Dosen Pembimbing,
                dan Mahasiswa secara aman.
              </p>
            </div>
          </div>
        </div>
      </section>

      {/* ================= ALUR BIMBINGAN ================= */}
      <section className="workflow-section" id="alur">
        <div className="container">
          <div className="section-heading">
            <span className="section-label">ALUR PENGGUNAAN</span>
            <h2>Langkah Mudah <span>Bimbingan</span></h2>
            <p>
              Proses bimbingan dapat diselesaikan hanya melalui 4 langkah sederhana.
            </p>
          </div>

          <div className="workflow-grid">
            <div className="workflow-card">
              <div className="step-number">01</div>
              <h3>Login Akun</h3>
              <p>
                Masuk ke portal BIMAKA menggunakan akun mahasiswa atau dosen yang
                telah terdaftar.
              </p>
            </div>

            <div className="workflow-card">
              <div className="step-number">02</div>
              <h3>Ajukan Bimbingan</h3>
              <p>
                Pilih Dosen Pembimbing, tentukan tanggal serta jam bimbingan, dan
                unggah dokumen pendukung.
              </p>
            </div>

            <div className="workflow-card">
              <div className="step-number">03</div>
              <h3>Konfirmasi Dosen</h3>
              <p>
                Dosen akan memeriksa pengajuan dan memberikan konfirmasi atau penyesuaian
                jadwal.
              </p>
            </div>

            <div className="workflow-card">
              <div className="step-number">04</div>
              <h3>Sesi Bimbingan</h3>
              <p>
                Laksanakan bimbingan sesuai jadwal dan simpan hasil catatan bimbingan di portal.
              </p>
            </div>
          </div>
        </div>
      </section>

      {/* ================= FOOTER ================= */}
      <footer>
        <div className="container footer-content">
          <p>© 2026 BIMAKA. Sistem Informasi Bimbingan Akademik.</p>
        </div>
      </footer>
    </div>
  );
}

export default App;
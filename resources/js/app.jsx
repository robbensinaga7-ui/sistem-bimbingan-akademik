import React from "react";
import "../css/app.css";

function App() {
  return (
    <div className="landing-page">
      {/* ================= NAVBAR ================= */}
      <nav className="navbar">
        <div className="container navbar-content">
          <div className="logo">
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

          <a href="/login" className="login-button">
            Masuk
          </a>
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
              <a href="/login" className="primary-button">
                Mulai Bimbingan
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                  <line x1="5" y1="12" x2="19" y2="12"></line>
                  <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
              </a>

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

            {/* FLOATING DECORATIVE BADGE */}
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
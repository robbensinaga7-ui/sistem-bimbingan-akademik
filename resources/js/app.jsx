import React, { useState } from "react";
import "../css/app.css";

export default function App() {
  const [currentPage, setCurrentPage] = useState("home");

  return (
    <div className="landing-page page-entrance-anim">
      
      {/* NAVBAR ATAS */}
      <nav className="navbar">
        <div className="container navbar-content">
          <div className="logo" onClick={() => setCurrentPage("home")}>
            <div className="logo-icon glow-logo">B</div>
            <div className="logo-text">
              <h2>BIMAKA</h2>
              <span>Sistem Informasi Bimbingan Akademik</span>
            </div>
          </div>
          <div className="nav-menu">
            <a href="#beranda" className="active">Beranda</a>
            <a href="#tentang">Tentang</a>
            <a href="#fitur">Fitur</a>
          </div>
          <div style={{ display: "flex", gap: "12px", alignItems: "center" }}>
            <button 
              onClick={() => { window.location.href = "/login"; }} 
              className="login-button animated-btn"
            >
              Masuk
            </button>
            <div className="user-avatar-btn" onClick={() => { window.location.href = "/login"; }}>
              <span>👤</span>
            </div>
          </div>
        </div>
      </nav>

      {/* HERO SECTION UTAMA */}
      <section className="hero" id="beranda">
        <div className="container">
          <div className="hero-box-main">
            
            {/* Sisi Kiri: Teks & Paragraf yang sebelumnya tidak nampak */}
            <div className="hero-text slide-in-left">
              <div className="badge-portal">
                <span className="badge-dot"></span> Sistem Bimbingan Akademik Polibatam
              </div>
              <h1 className="hero-title" style={{ color: "#ffffff", fontSize: "40px", fontWeight: "800", lineHeight: "1.15", marginBottom: "12px" }}>
                Bimbingan Akademik <br />
                <span style={{ color: "#93c5fd" }}>Lebih Mudah & Terarah</span>
              </h1>
              
            
              <p className="hero-desc" style={{ color: "#ffffff", fontSize: "15px", lineHeight: "1.6", fontWeight: "600" }}>
  BIMAKA membantu mahasiswa dan dosen dalam mengelola proses bimbingan akademik secara efisien...
</p>
              
              <div className="hero-cta-group" style={{ display: "flex", gap: "15px", alignItems: "center" }}>
                <button onClick={() => { window.location.href = "/login"; }} className="primary-button animated-btn" style={{ background: "#ffffff", color: "#1e40af", padding: "12px 24px", borderRadius: "10px", fontWeight: "700", border: "none", cursor: "pointer" }}>
                  Mulai Bimbingan →
                </button>
                <button onClick={() => { window.location.href = "/login"; }} style={{ padding: "12px 24px", borderRadius: "10px", border: "2px solid #ffffff", background: "transparent", color: "#ffffff", fontWeight: "700", cursor: "pointer" }}>
                  Buat Akun Baru
                </button>
              </div>

              <div className="hero-metrics-footer" style={{ marginTop: "36px" }}>
                <div className="metric-col">
                  <h3>100%</h3>
                  <span>Digitalisasi Berkas</span>
                </div>
                <div className="metric-divider"></div>
                <div className="metric-col">
                  <h3>BIMAKA</h3>
                  <span>Sinkronisasi Otomatis</span>
                </div>
                <div className="metric-divider"></div>
                <div className="metric-col">
                  <h3>24/7</h3>
                  <span>Monitoring Riwayat</span>
                </div>
              </div>
            </div>

            {/* Sisi Kanan: Panel Ilustrasi Portal */}
            <div className="hero-right-cards slide-in-right" style={{ display: "flex", justifyContent: "center" }}>
              <div style={{ 
                width: "100%", 
                maxWidth: "380px", 
                height: "280px", 
                background: "rgba(255, 255, 255, 0.1)", 
                backdropFilter: "blur(12px)",
                border: "1px solid rgba(255, 255, 255, 0.2)",
                borderRadius: "24px", 
                display: "flex",
                flexDirection: "column",
                alignItems: "center",
                justifyContent: "center",
                color: "#fff",
                boxShadow: "0 20px 25px -5px rgba(0, 0, 0, 0.2)"
              }}>
                <div style={{ fontSize: "54px", marginBottom: "12px" }}>🎓</div>
                <h3 style={{ fontSize: "1.3rem", fontWeight: "bold" }}>Portal BIMAKA</h3>
                <p style={{ fontSize: "0.85rem", opacity: "0.85", marginTop: "4px" }}>Terintegrasi & Real-time</p>
              </div>
            </div>

          </div>
        </div>
      </section>

      {/* SECTION TENTANG BIMAKA */}
      <section id="tentang" style={{ padding: "80px 0", background: "#ffffff" }}>
        <div className="container" style={{ textAlign: "center", maxWidth: "850px" }}>
          <h2 style={{ fontSize: "2.2rem", color: "#0f172a", fontWeight: "bold", marginBottom: "20px" }}>Tentang BIMAKA</h2>
          <p style={{ color: "#334155", fontSize: "1.05rem", lineHeight: "1.8", fontWeight: "500" }}>
            BIMAKA (Bimbingan Akademik) adalah platform digital inovatif yang dikembangkan untuk memfasilitasi interaksi antara mahasiswa dan dosen pembimbing di Politeknik Negeri Batam, memastikan setiap proses konsultasi berjalan lancar, transparan, dan terdokumentasi dengan baik.
          </p>
        </div>
      </section>

      {/* SECTION FITUR UNGGULAN */}
      <section className="features-section" id="fitur">
        <div className="container">
          <div className="section-heading">
            <span className="section-label">✨ Fitur Unggulan</span>
            <h2 className="section-title">Kemudahan Bimbingan Akademik Terpadu</h2>
            <p className="section-desc">Infrastruktur digital berstandar institusional untuk mendukung kelancaran evaluasi studi dan skripsi mahasiswa.</p>
          </div>

          <div className="features-grid-4">
            <div className="feature-item-card hover-card">
              <div className="feat-icon-box">📁</div>
              <h3>Pendaftaran Bimbingan</h3>
              <p>Ajukan topik dan jadwal konsultasi skripsi atau akademik dengan dosen pembimbing secara terstruktur dan terdokumentasi.</p>
              <a href="/login" className="feat-link">Pelajari Alur →</a>
            </div>

            <div className="feature-item-card hover-card">
              <div className="feat-icon-box">📅</div>
              <h3>Jadwal Tersedia</h3>
              <p>Lihat ketersediaan waktu dosen pembimbing secara transparan dan tersinkronisasi otomatis dengan kalender akademik.</p>
              <a href="/login" className="feat-link">Cek Kalender →</a>
            </div>

            <div className="feature-item-card hover-card">
              <div className="feat-icon-box">🔔</div>
              <h3>Notifikasi Real-time</h3>
              <p>Dapatkan pembaruan status persetujuan, catatan revisi, dan pengingat sesi bimbingan secara instan ke email dan gawai.</p>
              <a href="/login" className="feat-link">Pusat Notifikasi →</a>
            </div>

            <div className="feature-item-card hover-card">
              <div className="feat-icon-box">📊</div>
              <h3>Laporan & Rekap Data</h3>
              <p>Catatan riwayat bimbingan tersimpan aman dan tersip otomatis untuk kebutuhan administrasi akademik serta yudisium.</p>
              <a href="/login" className="feat-link">Format Rekap →</a>
            </div>
          </div>
        </div>
      </section>

      {/* SECTION BANTUAN */}
      <section className="help-footer-banner">
        <div className="container help-box-flex">
          <div className="help-left">
            <span className="help-ico">❓</span>
            <div>
              <h4>Butuh bantuan menggunakan portal BIMAKA?</h4>
              <p>Panduan teknis dan buku pedoman mahasiswa & dosen pembimbing tersedia gratis.</p>
            </div>
          </div>
          <div className="help-right-btns">
            <button onClick={() => alert("Mengunduh Buku Pedoman PDF...")} className="btn-help-outline">Buku Pedoman (PDF)</button>
            <button onClick={() => alert("Mengarahkan ke Helpdesk Polibatam...")} className="btn-help-solid">Hubungi Helpdesk</button>
          </div>
        </div>
      </section>

      <footer>
        <div className="container">
          <p>© 2026 Politeknik Negeri Batam • Sistem Informasi Bimbingan Akademik (BIMAKA)</p>
        </div>
      </footer>
    </div>
  );
}
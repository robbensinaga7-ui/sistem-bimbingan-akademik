import React, { useState } from "react";
import "../css/app.css";

export default function App() {
  // Cukup state untuk halaman utama saja, karena login/register sudah dipindah ke Blade Laravel
  const [currentPage, setCurrentPage] = useState("home");

  // ================= LANDING PAGE UTAMA (MURNI BERANDA) =================
  return (
    <div className="landing-page page-entrance-anim">
      <nav className="navbar">
        <div className="container navbar-content">
          <div className="logo" onClick={() => setCurrentPage("home")}>
            <div className="logo-icon glow-logo">B</div>
            <div className="logo-text"><h2>BIMAKA</h2><span>Bimbingan Akademik</span></div>
          </div>
          <div className="nav-menu">
            <a href="#beranda" className="active">Beranda</a>
            <a href="#tentang">Tentang</a>
            <a href="#fitur">Fitur</a>
            <a href="#alur">Alur</a>
          </div>
          <div style={{ display: "flex", gap: "10px" }}>
            {/* Tombol Daftar diarahkan langsung ke route Laravel jika ada, atau biarkan */}
            <button 
              onClick={() => { window.location.href = "/login"; }} 
              className="secondary-button" 
              style={{ padding: "8px 16px", borderRadius: "8px", border: "1px solid #1e40af", background: "transparent", color: "#1e40af", cursor: "pointer", fontWeight: "600" }}
            >
              Daftar
            </button>
            {/* Tombol Masuk langsung mengarah ke halaman login Blade Laravel (/login) */}
            <button 
              onClick={() => { window.location.href = "/login"; }} 
              className="login-button animated-btn"
            >
              Masuk
            </button>
          </div>
        </div>
      </nav>

      {/* Hero Section dengan Ilustrasi / Gambar di Kanan */}
      <section className="hero" id="beranda" style={{ padding: "60px 0" }}>
        <div className="container" style={{ display: "grid", gridTemplateColumns: "1.2fr 0.8fr", gap: "40px", alignItems: "center" }}>
          
          {/* Sisi Kiri: Teks & Tombol */}
          <div className="hero-text slide-in-left">
            <div className="badge"><span className="badge-dot"></span> Sistem Bimbingan Akademik Polibatam</div>
            <h1>Bimbingan Akademik <br /><span className="gradient-text">Lebih Mudah & Terarah</span></h1>
            <p style={{ marginTop: "15px", marginBottom: "25px", color: "#475569", lineHeight: "1.6" }}>
              BIMAKA membantu mahasiswa dan dosen dalam mengelola proses bimbingan akademik secara efisien, terpusat, dan terstruktur dengan baik di Politeknik Negeri Batam.
            </p>
            <div style={{ display: "flex", gap: "15px" }}>
              <button onClick={() => { window.location.href = "/login"; }} className="primary-button animated-btn">
                Mulai Bimbingan →
              </button>
              <button onClick={() => { window.location.href = "/login"; }} className="secondary-button hover-bounce" style={{ padding: "12px 24px", borderRadius: "10px", border: "2px solid #1e40af", background: "#fff", color: "#1e40af", fontWeight: "600", cursor: "pointer" }}>
                Buat Akun Baru
              </button>
            </div>
          </div>

          {/* Sisi Kanan: Kotak Ilustrasi / Visual Estetik */}
          <div className="hero-image-container" style={{ display: "flex", justifyContent: "center" }}>
            <div style={{ 
              width: "100%", 
              maxWidth: "420px", 
              height: "320px", 
              background: "linear-gradient(135deg, #1e40af 0%, #3b82f6 100%)", 
              borderRadius: "24px", 
              boxShadow: "0 20px 25px -5px rgba(30, 64, 175, 0.2)",
              display: "flex",
              flexDirection: "column",
              alignItems: "center",
              justifyContent: "center",
              color: "#fff",
              position: "relative",
              overflow: "hidden"
            }}>
              <div style={{ fontSize: "64px", marginBottom: "15px" }}>🎓</div>
              <h3 style={{ fontSize: "1.5rem", fontWeight: "bold" }}>Portal BIMAKA</h3>
              <p style={{ fontSize: "0.9rem", opacity: "0.9", marginTop: "5px" }}>Terintegrasi & Real-time</p>
              
              {/* Efek dekorasi lingkaran transparan */}
              <div style={{ position: "absolute", width: "150px", height: "150px", background: "rgba(255,255,255,0.1)", borderRadius: "50%", top: "-40px", right: "-40px" }}></div>
              <div style={{ position: "absolute", width: "100px", height: "100px", background: "rgba(255,255,255,0.1)", borderRadius: "50%", bottom: "-30px", left: "-30px" }}></div>
            </div>
          </div>

        </div>
      </section>

      {/* Bagian Tentang */}
      <section id="tentang" style={{ padding: "80px 0", background: "#ffffff" }}>
        <div className="container" style={{ textAlign: "center", maxWidth: "800px" }}>
          <h2 style={{ fontSize: "2.5rem", color: "#0f172a", fontWeight: "bold", marginBottom: "20px" }}>Tentang BIMAKA</h2>
          <p style={{ color: "#475569", fontSize: "1.1rem", lineHeight: "1.8" }}>
            BIMAKA (Bimbingan Akademik) adalah platform digital inovatif yang dikembangkan untuk memfasilitasi interaksi antara mahasiswa dan dosen pembimbing di Politeknik Negeri Batam, memastikan setiap proses konsultasi berjalan lancar, transparan, dan terdokumentasi dengan baik.
          </p>
        </div>
      </section>

      {/* Bagian Fitur */}
      <section className="features-section" id="fitur" style={{ padding: "80px 0", background: "#f8fafc" }}>
        <div className="container">
          <div style={{ textAlign: "center", marginBottom: "50px" }}>
            <h2 style={{ fontSize: "2.5rem", color: "#0f172a", fontWeight: "bold" }}>Fitur Unggulan BIMAKA</h2>
            <p style={{ color: "#64748b", marginTop: "10px" }}>Dirancang khusus untuk efisiensi akademik Polibatam.</p>
          </div>
          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(280px, 1fr))", gap: "30px" }}>
            <div style={{ background: "#fff", padding: "30px", borderRadius: "16px", boxShadow: "0 4px 6px -1px rgba(0,0,0,0.1)" }}>
              <div style={{ fontSize: "32px", marginBottom: "15px" }}>📅</div>
              <h3 style={{ fontSize: "1.25rem", fontWeight: "bold", marginBottom: "10px" }}>Jadwal Fleksibel</h3>
              <p style={{ color: "#64748b", fontSize: "0.95rem" }}>Atur dan pilih jadwal konsultasi dengan dosen pembimbing secara real-time.</p>
            </div>
            <div style={{ background: "#fff", padding: "30px", borderRadius: "16px", boxShadow: "0 4px 6px -1px rgba(0,0,0,0.1)" }}>
              <div style={{ fontSize: "32px", marginBottom: "15px" }}>📂</div>
              <h3 style={{ fontSize: "1.25rem", fontWeight: "bold", marginBottom: "10px" }}>Riwayat Terpusat</h3>
              <p style={{ color: "#64748b", fontSize: "0.95rem" }}>Semua catatan bimbingan dan progress tugas akhir tersimpan dengan aman.</p>
            </div>
            <div style={{ background: "#fff", padding: "30px", borderRadius: "16px", boxShadow: "0 4px 6px -1px rgba(0,0,0,0.1)" }}>
              <div style={{ fontSize: "32px", marginBottom: "15px" }}>⚡</div>
              <h3 style={{ fontSize: "1.25rem", fontWeight: "bold", marginBottom: "10px" }}>Validasi Cepat</h3>
              <p style={{ color: "#64748b", fontSize: "0.95rem" }}>Dosen dapat menyetujui pengajuan bimbingan dan memberikan catatan revisi dengan instan.</p>
            </div>
          </div>
        </div>
      </section>

      {/* Bagian Alur */}
      <section id="alur" style={{ padding: "80px 0", background: "#ffffff" }}>
        <div className="container">
          <div style={{ textAlign: "center", marginBottom: "50px" }}>
            <h2 style={{ fontSize: "2.5rem", color: "#0f172a", fontWeight: "bold" }}>Alur Penggunaan BIMAKA</h2>
            <p style={{ color: "#64748b", marginTop: "10px" }}>Langkah mudah memulai bimbingan akademik.</p>
          </div>
          <div style={{ display: "grid", gridTemplateColumns: "repeat(auto-fit, minmax(220px, 1fr))", gap: "20px" }}>
            <div style={{ background: "#f8fafc", padding: "25px", borderRadius: "12px", border: "1px solid #e2e8f0", textAlign: "center" }}>
              <div style={{ fontSize: "24px", fontWeight: "bold", color: "#1e40af", marginBottom: "10px" }}>01</div>
              <h4 style={{ fontWeight: "bold", marginBottom: "8px" }}>Daftar / Masuk</h4>
              <p style={{ fontSize: "0.85rem", color: "#64748b" }}>Gunakan akun NIM/NIDN atau login sebagai admin.</p>
            </div>
            <div style={{ background: "#f8fafc", padding: "25px", borderRadius: "12px", border: "1px solid #e2e8f0", textAlign: "center" }}>
              <div style={{ fontSize: "24px", fontWeight: "bold", color: "#1e40af", marginBottom: "10px" }}>02</div>
              <h4 style={{ fontWeight: "bold", marginBottom: "8px" }}>Buat Pengajuan</h4>
              <p style={{ fontSize: "0.85rem", color: "#64748b" }}>Pilih jadwal dan topik bimbingan dengan dosen.</p>
            </div>
            <div style={{ background: "#f8fafc", padding: "25px", borderRadius: "12px", border: "1px solid #e2e8f0", textAlign: "center" }}>
              <div style={{ fontSize: "24px", fontWeight: "bold", color: "#1e40af", marginBottom: "10px" }}>03</div>
              <h4 style={{ fontWeight: "bold", marginBottom: "8px" }}>Validasi Dosen</h4>
              <p style={{ fontSize: "0.85rem", color: "#64748b" }}>Tunggu konfirmasi dan persetujuan dari dosen.</p>
            </div>
            <div style={{ background: "#f8fafc", padding: "25px", borderRadius: "12px", border: "1px solid #e2e8f0", textAlign: "center" }}>
              <div style={{ fontSize: "24px", fontWeight: "bold", color: "#1e40af", marginBottom: "10px" }}>04</div>
              <h4 style={{ fontWeight: "bold", marginBottom: "8px" }}>Konsultasi Selesai</h4>
              <p style={{ fontSize: "0.85rem", color: "#64748b" }}>Catatan bimbingan dan rekap tersimpan otomatis.</p>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
}
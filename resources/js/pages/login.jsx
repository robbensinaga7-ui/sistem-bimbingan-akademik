import React, { useState } from "react";
import "../css/app.css";

function Login({ onBackHome, onNavigateToDashboard }) {
  const [role, setRole] = useState("admin"); // 'mahasiswa', 'dosen', atau 'admin'
  const [identifier, setIdentifier] = useState("");
  const [password, setPassword] = useState("");

  const handleSubmit = (e) => {
    e.preventDefault();
    if (onNavigateToDashboard) {
      if (role === "admin") {
        onNavigateToDashboard("admin_dashboard");
      } else if (role === "mahasiswa") {
        onNavigateToDashboard("student_dashboard");
      } else {
        alert("Berhasil masuk sebagai Dosen Pembimbing!");
      }
    } else {
      alert(`Berhasil masuk sebagai ${role.toUpperCase()}!`);
    }
  };

  return (
    <div className="login-page-container">
      {/* ANIMASI BACKGROUND GLOWING BULAT */}
      <div className="glow-shape shape-blue"></div>
      <div className="glow-shape shape-purple"></div>

      <div className="login-wrapper animated-card">
        {/* PANEL KIRI: VISUAL & ILUSTRASI AKADEMIK */}
        <div className="login-visual-panel">
          <div className="visual-badge animated-badge">
            <span className="badge-dot-live"></span> BIMAKA Academic Portal
          </div>

          <div className="visual-hero-graphic">
            {/* GAMBAR / ILUSTRASI AKADEMIK MODERN */}
            <div className="illustration-wrapper">
              <img
                src="https://img.freepik.com/free-vector/graduation-concept-illustration_114360-8427.jpg"
                alt="Ilustrasi Akademik BIMAKA"
                className="academic-img-illustration"
              />
              {/* FLOATING BADGE DENGAN ANIMASI MELAYANG */}
              <div className="floating-mini-badge badge-top-right">
                <span className="badge-icon">📊</span>
                <div>
                  <strong>Real-time</strong>
                  <small>Monitoring</small>
                </div>
              </div>
              <div className="floating-mini-badge badge-bottom-left">
                <span className="badge-icon">✨</span>
                <div>
                  <strong>Terintegrasi</strong>
                  <small>Polibatam</small>
                </div>
              </div>
            </div>

            <div className="illustration-text">
              <h3>Bimbingan Terstruktur & Terarah</h3>
              <p>
                Kelola konsultasi tugas akhir dan bimbingan akademik secara terpusat, transparan, dan efisien.
              </p>
            </div>
          </div>

          <div className="visual-footer">
            <p>© 2026 Politeknik Negeri Batam. All Rights Reserved.</p>
          </div>
        </div>

        {/* PANEL KANAN: FORM LOGIN INTERAKTIF */}
        <div className="login-form-panel">
          <div className="login-header">
            <div className="login-logo glow-logo">B</div>
            <h2>Masuk ke BIMAKA</h2>
            <p>Pilih peran kamu untuk melanjutkan ke portal</p>
          </div>

          {/* TAB PILIHAN ROLE DENGAN EFEK TRIBAL/TAB ACTIVE */}
          <div className="role-selector-3">
            <button
              type="button"
              className={`role-btn-item ${role === "mahasiswa" ? "active" : ""}`}
              onClick={() => setRole("mahasiswa")}
            >
              <span className="role-emoji">🎓</span>
              <span>Mahasiswa</span>
            </button>
            <button
              type="button"
              className={`role-btn-item ${role === "dosen" ? "active" : ""}`}
              onClick={() => setRole("dosen")}
            >
              <span className="role-emoji">👨‍🏫</span>
              <span>Dosen</span>
            </button>
            <button
              type="button"
              className={`role-btn-item ${role === "admin" ? "active" : ""}`}
              onClick={() => setRole("admin")}
            >
              <span className="role-emoji">⚡</span>
              <span>Admin</span>
            </button>
          </div>

          <form onSubmit={handleSubmit} className="login-form-body">
            <div className="form-group">
              <label>
                {role === "mahasiswa"
                  ? "NIM (Nomor Induk Mahasiswa)"
                  : role === "dosen"
                  ? "NIDN / NIP Dosen"
                  : "Username Administrator"}
              </label>
              <input
                type="text"
                className="form-control styled-input"
                value={identifier}
                onChange={(e) => setIdentifier(e.target.value)}
                placeholder={
                  role === "mahasiswa"
                    ? "Contoh: 3312511075"
                    : role === "dosen"
                    ? "Contoh: 0012345678"
                    : "Masukkan ID / Username Admin"
                }
                required
              />
            </div>

            <div className="form-group">
              <label>Kata Sandi (Password)</label>
              <input
                type="password"
                className="form-control styled-input"
                value={password}
                onChange={(e) => setPassword(e.target.value)}
                placeholder="Masukkan kata sandi akun"
                required
              />
            </div>

            <div className="form-options">
              <label className="remember-me">
                <input type="checkbox" /> Ingat saya
              </label>
              <a href="#forgot" className="forgot-password">
                Lupa sandi?
              </a>
            </div>

            <button type="submit" className="submit-btn animated-btn">
              <span>Masuk sebagai {role === "mahasiswa" ? "Mahasiswa" : role === "dosen" ? "Dosen" : "Admin"}</span>
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
              </svg>
            </button>
          </form>

          <div className="back-to-home">
            {onBackHome ? (
              <button type="button" onClick={onBackHome} className="btn-back-link">
                ← Kembali ke Beranda Utama
              </button>
            ) : (
              <a href="/" className="btn-back-link">
                ← Kembali ke Beranda Utama
              </a>
            )}
          </div>
        </div>
      </div>
    </div>
  );
}

export default Login;
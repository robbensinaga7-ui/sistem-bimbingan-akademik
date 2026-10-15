import React, { useState } from "react";
import "../css/app.css";

function Login() {
  const [role, setRole] = useState("mahasiswa"); // 'mahasiswa' atau 'dosen'

  const handleSubmit = (e) => {
    e.preventDefault();
    alert(`Berhasil masuk sebagai ${role === "mahasiswa" ? "Mahasiswa" : "Dosen"}!`);
    // Nanti bisa diarahkan ke dashboard Laravel sesuai role
  };

  return (
    <div className="login-page-container">
      <div className="login-card">
        <div className="login-header">
          <div className="login-logo">B</div>
          <h2>Masuk ke BIMAKA</h2>
          <p>Sistem Informasi Bimbingan Akademik</p>
        </div>

        {/* Pilihan Role Login */}
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

        <form onSubmit={handleSubmit}>
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
          <a href="/">← Kembali ke Beranda Utama</a>
        </div>
      </div>
    </div>
  );
}

export default Login;
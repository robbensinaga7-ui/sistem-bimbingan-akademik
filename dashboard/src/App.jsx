import React from 'react'
import { BrowserRouter, Routes, Route } from 'react-router-dom'
import LandingPage from './landingpage'
import AdminDashboard from './components/admindashboard'

function App() {
  return (
    <BrowserRouter>
      <Routes>
        {/* Halaman Utama / Landing Page */}
        <Route path="/" element={<LandingPage />} />
        
        {/* Halaman Dashboard Admin */}
        <Route path="/admin" element={<AdminDashboard />} />
      </Routes>
    </BrowserRouter>
  )
}

export default App
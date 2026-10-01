import React from 'react'
import {
  MapPin,
  Instagram,
} from 'lucide-react'

const quickLinks = [
  'Beranda',
  'Tentang Kami',
  'Divisi',
  'Galeri',
  'Berita',
  'Open Recruitment',
]

const programKerja = [
  'Upgrading Internal',
  'Product Innovation',
  'Upgrading eksternal',
  'Riset Kolaboratif',
  'Study Club',
]

const socialMedia = [
  { icon: Instagram, label: 'Instagram', handle: '@mahakrenov.upb' },
]

const Footer = () => {
  return (
    <footer id="footer" className="bg-teal-900 text-teal-50">
      <div className="container-custom py-16">
        <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-10">
          <div>
            <a href="#beranda" className="flex items-center gap-2 mb-5">
              <div className="bg-teal-500 p-2 rounded-lg group-hover:bg-teal-600 transition-colors w-12 h-12 object-contain">
              <img src="/images/img2.png"
              alt="Logo Mahakrenov"
              className="w-full h-full object-contain"/>
            </div>
              <span className="text-lg font-extrabold text-white tracking-tight">
                MAHAKRENOV
              </span>
            </a>
            <p className="text-sm text-teal-200 leading-relaxed mb-5">
              Kelopok studi yang mewadahi para mahasiswa kreatif dan inovatif di bawah naungan
              Universitas Pelita Bangsa.
            </p>
            <div className="space-y-3 text-sm text-teal-100">
              <div className="flex items-start gap-3">
                <MapPin size={18} className="text-teal-400 flex-shrink-0 mt-0.5" />
                <span>
                  Universitas Pelita Bangsa,
                  Bekasi, Jawa Barat, Indonesia
                </span>
              </div>
            </div>
          </div>

          <div>
            <h4 className="text-white font-bold text-sm uppercase tracking-wider mb-5">
              Tautan Cepat
            </h4>
            <ul className="space-y-3">
              {quickLinks.map((link) => (
                <li key={link}>
                  <a href="#beranda" className="text-sm text-teal-200 hover:text-white transition-colors">
                    {link}
                  </a>
                </li>
              ))}
            </ul>
          </div>

          <div>
            <h4 className="text-white font-bold text-sm uppercase tracking-wider mb-5">
              Program Kerja
            </h4>
            <ul className="space-y-3">
              {programKerja.map((prog) => (
                <li key={prog}>
                  <a href="#divisi" className="text-sm text-teal-200 hover:text-white transition-colors">
                    {prog}
                  </a>
                </li>
              ))}
            </ul>
          </div>

          <div>
            <h4 className="text-white font-bold text-sm uppercase tracking-wider mb-5">
              Sosial Media
            </h4>
            <ul className="space-y-4">
              {socialMedia.map((soc) => {
                const Icon = soc.icon
                return (
                  <li key={soc.label} className="flex items-center gap-3">
                    <div className="bg-teal-800 p-2 rounded-md">
                      <Icon size={16} className="text-teal-300" />
                    </div>
                    <div>
                      <p className="text-xs text-teal-400">{soc.label}</p>
                      <p className="text-sm text-teal-100 font-medium">{soc.handle}</p>
                    </div>
                  </li>
                )
              })}
            </ul>
          </div>
        </div>
      </div>

      <div className="border-t border-teal-800">
        <div className="container-custom py-5 flex flex-col sm:flex-row items-center justify-between gap-3">
          <p className="text-xs text-teal-300 text-center sm:text-left">
            © 2026 Mahakrenov — Mahasiswa Kreatif Inovatif. Universitas Pelita
            Bangsa. All rights reserved.
          </p>
          <div className="flex items-center gap-5 text-xs text-teal-300">
            <a href="#faq" className="hover:text-white transition-colors">
              Kebijakan Privasi
            </a>
            <a href="#faq" className="hover:text-white transition-colors">
              Syarat & Ketentuan
            </a>
          </div>
        </div>
      </div>
    </footer>
  )
}

export default Footer
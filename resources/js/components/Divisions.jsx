import React from 'react'
import { FlaskConical, Briefcase, Megaphone, Camera } from 'lucide-react'

const divisions = [
  {
    icon: FlaskConical,
    title: 'Research and Development',
    desc: 'Mengembangkan penelitian dan gagasan inovatif berdasarkan masalah yang ada.',
  },
  
  {
    icon: Briefcase,
    title: 'Human Resources',
    desc: 'Mengelola seluruh aspek yang berkaitan dengan anggota.',
  },
 
  {
    icon: Megaphone,
    title: 'Quality Check',
    desc: 'Menjaga kualitas dari keseluruhan produk maupun program yang dibuat.',
  },
  {
    icon: Camera,
    title: 'Public Relations',
    desc: 'Menjalin hubungan publik dan mengelola publikasi media sosial organisasi.',
  },
]

const Divisions = () => {
  return (
    <section id="divisi" className="py-20 bg-white">
      <div className="container-custom">
        <div className="text-center max-w-2xl mx-auto mb-14">
          <span className="text-teal-500 font-bold text-sm uppercase tracking-widest">
            Divisi Kami
          </span>
          <h2 className="text-3xl lg:text-4xl font-extrabold text-gray-900 mt-3">
            Fokus Pengembangan Setiap Divisi
          </h2>
          <p className="text-gray-600 mt-4">
            Setiap divisi di Mahakrenov dirancang untuk mengasah potensi
            anggota sesuai minat dan bidang keahliannya masing-masing.
          </p>
        </div>

        <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
          {divisions.map((div, idx) => {
            const Icon = div.icon
            return (
              <div
                key={idx}
                className="group bg-white border border-teal-100 rounded-lg p-6 hover:shadow-xl hover:-translate-y-1 hover:border-teal-300 transition-all duration-300"
              >
                <div className="bg-teal-50 group-hover:bg-teal-500 w-14 h-14 rounded-lg flex items-center justify-center transition-colors duration-300">
                  <Icon size={28} className="text-teal-500 group-hover:text-white transition-colors duration-300" />
                </div>
                <h3 className="text-lg font-bold text-gray-900 mt-5">{div.title}</h3>
                <p className="text-sm text-gray-600 mt-2 leading-relaxed">{div.desc}</p>
              </div>
            )
          })}
        </div>
      </div>
    </section>
  )
}

export default Divisions
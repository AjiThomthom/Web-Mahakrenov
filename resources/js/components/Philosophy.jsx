
import React from 'react'
import {
  Target,
  Eye,
  HeartHandshake,
  CheckCircle2,
} from 'lucide-react'

const misiList = [
  'Menumbuhkan budaya riset dan inovasi di kalangan mahasiswa.',
  'Membangun kolaborasi lintas jurusan dan fakultas.',
  'Menyediakan wadah pengembangan soft skill dan hard skill.',
  'Mendorong lahirnya karya nyata yang berdampak bagi masyarakat.',
]

const Philosophy = () => {
  return (
    <section id="tentang" className="py-20 bg-teal-50">
      <div className="container-custom">
        <div className="grid lg:grid-cols-2 gap-12 items-start">

          {/* KOLOM KIRI - FOTO */}
          <div>
            <div className="rounded-xl overflow-hidden shadow-lg">
              <img
                src="/images/img3.jpeg"
                alt="Team Mahakrenov"
                className="w-full h-full object-contain"
              />
            </div>
          </div>

          {/* KOLOM KANAN - VISI, MISI, BUDAYA */}
          <div className="space-y-8">

            {/* JUDUL */}
            <div>
              <span className="text-teal-500 font-bold text-sm uppercase tracking-widest">
                Tentang Kami
              </span>

              <h2 className="text-3xl lg:text-4xl font-extrabold text-gray-900 mt-2">
                Visi & Misi Mahakrenov
              </h2>
            </div>

            {/* VISI */}
            <div className="bg-white rounded-lg border border-teal-100 p-6 shadow-sm">
              <div className="flex items-center gap-3 mb-3">
                <div className="bg-teal-50 p-2.5 rounded-lg">
                  <Eye className="text-teal-500" size={22} />
                </div>

                <h3 className="text-lg font-bold text-gray-900">
                  Visi
                </h3>
              </div>

              <p className="text-sm text-gray-600 leading-relaxed">
                Menjadi kelompok studi yang melahirkan generasi kreatif,
                inovatif, dan berdaya saing global di Universitas Pelita Bangsa.
              </p>
            </div>

            {/* MISI */}
            <div className="bg-white rounded-lg border border-teal-100 p-6 shadow-sm">
              <div className="flex items-center gap-3 mb-4">
                <div className="bg-teal-50 p-2.5 rounded-lg">
                  <Target className="text-teal-500" size={22} />
                </div>

                <h3 className="text-lg font-bold text-gray-900">
                  Misi
                </h3>
              </div>

              <ul className="space-y-3">
                {misiList.map((misi, idx) => (
                  <li key={idx} className="flex items-start gap-3">
                    <CheckCircle2
                      size={18}
                      className="text-teal-500 mt-0.5 flex-shrink-0"
                    />

                    <span className="text-sm text-gray-600 leading-relaxed">
                      {misi}
                    </span>
                  </li>
                ))}
              </ul>
            </div>

            {/* BUDAYA ORGANISASI - DI BAWAH MISI */}
            <div className="bg-white rounded-lg border border-teal-100 p-6 shadow-sm">
              <div className="flex items-center gap-3 mb-4">
                <div className="bg-teal-500 p-2.5 rounded-lg">
                  <HeartHandshake className="text-white" size={22} />
                </div>

                <h3 className="text-xl font-extrabold text-gray-900">
                  Budaya Organisasi
                </h3>
              </div>

              <p className="text-sm text-gray-600 leading-relaxed">
                Mahakrenov menjunjung tinggi nilai kolaborasi, integritas,
                dan semangat belajar berkelanjutan. Kami percaya bahwa ide
                terbaik lahir dari ruang diskusi yang terbuka dan saling
                menghargai antar anggota.
              </p>
            </div>

          </div>
        </div>
      </div>
    </section>
  )
}

export default Philosophy
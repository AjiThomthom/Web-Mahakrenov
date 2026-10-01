
import React from 'react'
import {
  ArrowRight,
  BookOpen,
  Users,
  Sparkles,
} from 'lucide-react'

const Hero = () => {
  return (
    <section
      id="beranda"
      className="relative bg-teal-50 overflow-hidden"
    >
      {/* Background Decoration */}
      <div className="absolute -top-24 -right-24 w-96 h-96 bg-teal-200 rounded-full opacity-40 blur-3xl"></div>
      <div className="absolute -bottom-32 -left-32 w-96 h-96 bg-teal-100 rounded-full opacity-60 blur-3xl"></div>

      <div className="container-custom relative py-16 lg:py-24">
        <div className="grid lg:grid-cols-2 gap-12 items-center">

          {/* KOLOM KIRI - TEKS */}
          <div className="relative z-10">

            <div className="inline-flex items-center gap-2 bg-white border border-teal-200 text-teal-600 text-xs font-semibold px-4 py-2 rounded-full shadow-sm mb-6">
              <Sparkles size={14} />
              Organisasi Kemahasiswaan Resmi
            </div>

            <h1 className="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight">
              Wadah Mahasiswa{' '}
              <span className="text-teal-500">Kreatif</span> &{' '}
              <span className="text-teal-500">Inovatif</span>
            </h1>

            <p className="mt-6 text-base lg:text-lg text-gray-600 leading-relaxed max-w-xl">
              MAHAKRENOV adalah rumah bagi mahasiswa yang ingin bertumbuh,
              berkarya, dan berkolaborasi lintas disiplin ilmu untuk
              menciptakan solusi nyata bagi kampus dan masyarakat melalui
              riset dan teknologi.
            </p>

            {/* BUTTON */}
            <div className="mt-8 flex flex-col sm:flex-row gap-4">

              <a
                href="#recruitment"
                className="flex items-center justify-center gap-2 bg-teal-500 hover:bg-teal-600 text-white font-semibold px-6 py-3.5 rounded-lg shadow-md transition-colors"
              >
                <Users size={18} />
                Gabung Sekarang
                <ArrowRight size={18} />
              </a>

              <a
                href="#divisi"
                className="flex items-center justify-center gap-2 bg-white hover:bg-teal-50 border border-teal-300 text-teal-600 font-semibold px-6 py-3.5 rounded-lg transition-colors"
              >
                <BookOpen size={18} />
                Pelajari Program
              </a>

            </div>
          </div>

          {/* KOLOM KANAN - GAMBAR */}
          <div className="relative z-10">

            <div className="rounded-2xl overflow-hidden shadow-2xl border-4 border-white">

              <img
                src="/images/img1.jpeg"
                alt="Kegiatan Mahakrenov"
                className="w-full h-[320px] sm:h-[400px] lg:h-[440px] object-cover object-center"
              />

            </div>

            {/* BADGE INOVASI */}
            <div className="absolute -bottom-6 -left-4 sm:-left-6 bg-white rounded-xl shadow-xl p-4 flex items-center gap-3 border border-teal-100">

              <div className="bg-teal-500 p-2.5 rounded-lg">
                <Sparkles className="text-white" size={20} />
              </div>

              <div>
                <p className="text-sm font-bold text-gray-800">
                  Inovasi
                </p>

                <p className="text-xs text-gray-500">
                  di Tingkat Universitas
                </p>
              </div>

            </div>

          </div>

        </div>
      </div>
    </section>
  )
}

export default Hero
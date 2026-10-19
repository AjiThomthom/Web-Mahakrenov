<section id="beranda" class="relative bg-slate-50 dark:bg-slate-950 overflow-hidden transition-colors duration-300">
    <!-- Ambient Blur Background -->
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#005B66]/10 dark:bg-[#005B66]/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-teal-400/10 dark:bg-teal-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container-custom relative py-16 lg:py-24">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            
            <!-- Column Kiri: Headline & CTA -->
            <div class="relative z-10">
                <div class="inline-flex items-center gap-2 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-[#005B66] dark:text-teal-400 text-xs font-semibold px-4 py-2 rounded-full shadow-sm mb-6">
                    <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                    </svg>
                    Organisasi Kemahasiswaan Resmi
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-slate-900 dark:text-white leading-tight tracking-tight">
                    Wadah Mahasiswa <br>
                    <span class="text-[#005B66] dark:text-teal-400">Kreatif</span> & <span class="text-[#005B66] dark:text-teal-400">Inovatif</span>
                </h1>

                <p class="mt-6 text-base lg:text-lg text-slate-600 dark:text-slate-300 leading-relaxed max-w-xl">
                    MAHAKRENOV adalah rumah bagi mahasiswa yang ingin bertumbuh, berkarya, dan berkolaborasi lintas disiplin ilmu untuk menciptakan solusi nyata bagi kampus dan masyarakat melalui riset dan teknologi.
                </p>

                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('register') }}" class="flex items-center justify-center gap-2 bg-[#005B66] hover:bg-[#004D56] text-white font-semibold px-6 py-3.5 rounded-xl shadow-md hover:shadow-lg transition-all">
                        Gabung Sekarang
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>

                    <a href="#divisi" class="flex items-center justify-center gap-2 bg-white dark:bg-slate-900 hover:bg-slate-100 dark:hover:bg-slate-800 border border-slate-200 dark:border-slate-800 text-slate-700 dark:text-slate-200 font-semibold px-6 py-3.5 rounded-xl transition-all">
                        Pelajari Program
                    </a>
                </div>
            </div>

            <!-- Column Kanan: Banner Foto -->
            <div class="relative z-10">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white dark:border-slate-800/80">
                    <img src="{{ asset('images/img1.jpeg') }}" alt="Kegiatan Mahakrenov" class="w-full h-[320px] sm:h-[400px] lg:h-[440px] object-cover object-center"/>
                </div>

                <!-- Floating Card -->
                <div class="absolute -bottom-6 -left-4 sm:-left-6 bg-white dark:bg-slate-900 rounded-2xl shadow-xl p-4 flex items-center gap-3 border border-slate-200 dark:border-slate-800">
                    <div class="bg-[#005B66] dark:bg-slate-800 p-2.5 rounded-xl">
                        <svg class="w-5 h-5 text-white dark:text-teal-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-slate-900 dark:text-white">Inovasi Berkelanjutan</p>
                        <p class="text-xs text-slate-500 dark:text-slate-400">Universitas Pelita Bangsa</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
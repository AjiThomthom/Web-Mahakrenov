@php
$misiList = [
    'Menumbuhkan budaya riset dan inovasi di kalangan mahasiswa.',
    'Membangun kolaborasi lintas jurusan dan fakultas.',
    'Menyediakan wadah pengembangan soft skill dan hard skill.',
    'Mendorong lahirnya karya nyata yang berdampak bagi masyarakat.',
];
@endphp

<section id="tentang" class="py-20 bg-slate-100/60 dark:bg-slate-900/50 transition-colors duration-300">
    <div class="container-custom">
        <div class="grid lg:grid-cols-2 gap-12 items-start">

            <!-- KOLOM KIRI - FOTO -->
            <div class="sticky top-28">
                <div class="rounded-2xl overflow-hidden shadow-lg border border-slate-200 dark:border-slate-800">
                    <img src="{{ asset('images/img3.jpeg') }}" alt="Team Mahakrenov" class="w-full h-auto object-cover"/>
                </div>
            </div>

            <!-- KOLOM KANAN - VISI, MISI, BUDAYA -->
            <div class="space-y-6">
                <div>
                    <span class="text-[#005B66] dark:text-teal-400 font-bold text-sm uppercase tracking-widest">Tentang Kami</span>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900 dark:text-white mt-2">Visi & Misi Mahakrenov</h2>
                </div>

                <!-- VISI -->
                <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/80 dark:border-slate-800 p-6 shadow-sm">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="bg-slate-100 dark:bg-slate-800 p-2.5 rounded-xl">
                            <svg class="w-5 h-5 text-[#005B66] dark:text-teal-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white">Visi</h3>
                    </div>
                    <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                        Menjadi kelompok studi yang melahirkan generasi kreatif, inovatif, dan berdaya saing global di Universitas Pelita Bangsa.
                    </p>
                </div>

                <!-- MISI -->
                <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/80 dark:border-slate-800 p-6 shadow-sm">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-slate-100 dark:bg-slate-800 p-2.5 rounded-xl">
                            <svg class="w-5 h-5 text-[#005B66] dark:text-teal-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white">Misi</h3>
                    </div>
                    <ul class="space-y-3">
                        @foreach($misiList as $misi)
                            <li class="flex items-start gap-3">
                                <svg class="w-4 h-4 text-[#005B66] dark:text-teal-400 mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed">{{ $misi }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- BUDAYA ORGANISASI -->
                <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/80 dark:border-slate-800 p-6 shadow-sm">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-[#005B66] p-2.5 rounded-xl">
                            <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white">Budaya Organisasi</h3>
                    </div>
                    <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                        Mahakrenov menjunjung tinggi nilai kolaborasi, integritas, dan semangat belajar berkelanjutan. Kami percaya bahwa ide terbaik lahir dari ruang diskusi yang terbuka dan saling menghargai antar anggota.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
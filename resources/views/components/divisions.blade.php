@php
$divisions = [
    [
        'title' => 'Research and Development',
        'desc' => 'Mengembangkan penelitian dan gagasan inovatif berdasarkan masalah yang ada.',
        'icon' => 'flask'
    ],
    [
        'title' => 'Human Resources',
        'desc' => 'Mengelola seluruh aspek yang berkaitan dengan anggota.',
        'icon' => 'briefcase'
    ],
    [
        'title' => 'Quality Check',
        'desc' => 'Menjaga kualitas dari keseluruhan produk maupun program yang dibuat.',
        'icon' => 'megaphone'
    ],
    [
        'title' => 'Public Relations',
        'desc' => 'Menjalin hubungan publik dan mengelola publikasi media sosial organisasi.',
        'icon' => 'camera'
    ],
];
@endphp

<section id="divisi" class="py-20 bg-white dark:bg-slate-950 transition-colors duration-300">
    <div class="container-custom">
        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="text-[#005B66] dark:text-teal-400 font-bold text-sm uppercase tracking-widest">Divisi Kami</span>
            <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900 dark:text-white mt-3">Fokus Pengembangan Setiap Divisi</h2>
            <p class="text-slate-600 dark:text-slate-400 mt-4 leading-relaxed">
                Setiap divisi di Mahakrenov dirancang untuk mengasah potensi anggota sesuai minat dan bidang keahliannya masing-masing.
            </p>
        </div>

        <!-- Division Cards Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($divisions as $div)
                <div class="group bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 rounded-2xl p-6 hover:shadow-xl hover:dark:shadow-[0_0_20px_rgba(0,91,102,0.3)] hover:-translate-y-1 hover:border-[#005B66] dark:hover:border-teal-500/50 transition-all duration-300">
                    
                    <!-- Icon Container -->
                    <div class="bg-slate-100 dark:bg-slate-800/80 group-hover:bg-[#005B66] dark:group-hover:bg-teal-500 w-14 h-14 rounded-xl flex items-center justify-center transition-colors duration-300">
                        @if($div['icon'] === 'flask')
                            <svg class="w-7 h-7 text-[#005B66] dark:text-teal-400 group-hover:text-white dark:group-hover:text-slate-950 transition-colors duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        @elseif($div['icon'] === 'briefcase')
                            <svg class="w-7 h-7 text-[#005B66] dark:text-teal-400 group-hover:text-white dark:group-hover:text-slate-950 transition-colors duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        @elseif($div['icon'] === 'megaphone')
                            <svg class="w-7 h-7 text-[#005B66] dark:text-teal-400 group-hover:text-white dark:group-hover:text-slate-950 transition-colors duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c.41 0 .782-.251.934-.633l.96-2.4a1.76 1.76 0 013.22 0l.96 2.4c.152.382.524.633.934.633H17a4 4 0 014 4v3a4 4 0 01-4 4h-1.832a1.002 1.002 0 00-.934.633l-.96 2.4a1.76 1.76 0 01-3.22 0l-.96-2.4a1.002 1.002 0 00-.934-.633H7a4 4 0 01-1.564-.317z" />
                            </svg>
                        @else
                            <svg class="w-7 h-7 text-[#005B66] dark:text-teal-400 group-hover:text-white dark:group-hover:text-slate-950 transition-colors duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        @endif
                    </div>

                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mt-5 group-hover:text-[#005B66] dark:group-hover:text-teal-400 transition-colors">{{ $div['title'] }}</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400 mt-2 leading-relaxed">{{ $div['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
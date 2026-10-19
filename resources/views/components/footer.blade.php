@php
    $isAuthPage = request()->routeIs('login') || request()->routeIs('register');
    
    // Fastlinks dinamis berdasarkan route
    if (request()->is('/')) {
        $navLinks = [
            ['label' => 'Beranda', 'href' => '#beranda'],
            ['label' => 'Tentang Kami', 'href' => '#tentang'],
            ['label' => 'Divisi', 'href' => '#divisi'],
            ['label' => 'Galeri', 'href' => route('gallery')],
            ['label' => 'Berita', 'href' => route('news')],
        ];
    } else {
        $navLinks = [
            ['label' => 'Beranda', 'href' => route('home')],
            ['label' => 'Galeri', 'href' => route('gallery')],
            ['label' => 'Berita', 'href' => route('news')],
        ];
    }

    $socialMedia = [['label' => 'Instagram', 'handle' => '@mahakrenov.upb', 'url' => 'https://instagram.com/mahakrenov.upb']];
@endphp

<footer id="footer" class="bg-[#003F47] dark:bg-slate-950 text-slate-200 border-t border-slate-800/80 transition-colors duration-300">
    @if(!$isAuthPage)
        <!-- Main Footer Links (Mode Halaman Publik Biasa) -->
        <div class="container-custom py-10">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
                
                <!-- Brand Info (5 cols) -->
                <div class="md:col-span-5 space-y-3">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2.5 group">
                        <div class="bg-[#005B66] p-1.5 rounded-lg w-9 h-9 flex items-center justify-center border border-teal-500/30 group-hover:scale-105 transition-transform">
                            <img src="{{ asset('images/img2.png') }}" alt="Logo Mahakrenov" class="w-full h-full object-contain rounded-md"/>
                        </div>
                        <div class="flex flex-col leading-tight">
                            <span class="text-base font-black text-white tracking-wide">MAHAKRENOV</span>
                            <span class="text-[8px] font-bold text-teal-300 tracking-wider uppercase">UPB BEKASI</span>
                        </div>
                    </a>
                    <p class="text-xs text-slate-300 leading-relaxed max-w-sm">
                        Kelompok studi mahasiswa kreatif & inovatif di bawah naungan Universitas Pelita Bangsa.
                    </p>
                    <div class="flex items-center gap-2 text-xs text-slate-300 pt-1">
                        <svg class="w-3.5 h-3.5 text-teal-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span class="truncate">Cikarang, Kab. Bekasi, Jawa Barat</span>
                    </div>
                </div>

                <!-- Fast Links (4 cols) -->
                <div class="md:col-span-4">
                    <h4 class="text-xs font-bold text-teal-300 uppercase tracking-wider mb-3">Navigasi Cepat</h4>
                    <ul class="flex flex-wrap gap-x-5 gap-y-2 text-xs">
                        @foreach($navLinks as $link)
                            <li>
                                <a href="{{ $link['href'] }}" class="text-slate-300 hover:text-white transition-colors">
                                    {{ $link['label'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Socials (3 cols) -->
                <div class="md:col-span-3">
                    <h4 class="text-xs font-bold text-teal-300 uppercase tracking-wider mb-3">Media Sosial</h4>
                    <div class="flex items-center gap-3">
                        @foreach($socialMedia as $soc)
                            <a href="{{ $soc['url'] }}" target="_blank" class="inline-flex items-center gap-2 text-xs bg-[#005B66]/60 hover:bg-[#005B66] text-white px-3 py-1.5 rounded-lg border border-teal-500/30 transition-all">
                                <svg class="w-3.5 h-3.5 text-teal-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>{{ $soc['handle'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    @endif

    <!-- Bottom Copyright Bar (Super Compact) -->
    <div class="border-t border-slate-800/80 bg-[#00262B] dark:bg-slate-950/90 py-4">
        <div class="container-custom flex flex-col sm:flex-row items-center justify-between gap-2 text-[11px] text-slate-400">
            <p class="text-center sm:text-left">
                © {{ date('Y') }} Mahakrenov UPB. All rights reserved.
            </p>
            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}" class="hover:text-teal-300 transition-colors">Beranda</a>
                <span>•</span>
                <a href="#" class="hover:text-teal-300 transition-colors">Kebijakan Privasi</a>
            </div>
        </div>
    </div>
</footer>
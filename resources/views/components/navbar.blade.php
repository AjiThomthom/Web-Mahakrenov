@php
    $isAuthPage = request()->routeIs('login') || request()->routeIs('register');
    
    // Penyesuaian menu berdasarkan halaman
    if (request()->is('/')) {
        $menuItems = [
            ['label' => 'Beranda', 'href' => '#beranda'],
            ['label' => 'Tentang Kami', 'href' => '#tentang'],
            [
                'label' => 'Divisi',
                'href' => '#divisi',
                'dropdown' => ['RnD', 'HR', 'QC', 'PR']
            ],
            ['label' => 'Galeri', 'href' => route('gallery')],
            ['label' => 'Berita', 'href' => route('news')],
        ];
    } else {
        $menuItems = [
            ['label' => 'Beranda', 'href' => route('home')],
            ['label' => 'Galeri', 'href' => route('gallery')],
            ['label' => 'Berita', 'href' => route('news')],
        ];
    }
@endphp

<header class="sticky top-0 z-50 bg-white/90 dark:bg-slate-900/90 backdrop-blur-md border-b border-slate-200 dark:border-slate-800/80 transition-colors duration-300 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 sm:h-20">
            
            <!-- Logo & Brand -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="relative p-1.5 rounded-xl w-10 h-10 sm:w-11 sm:h-11 flex items-center justify-center transition-all duration-300
                            bg-[#005B66] dark:bg-slate-900 
                            border border-transparent dark:border-teal-500/50 
                            ring-0 dark:ring-2 dark:ring-[#005B66]/60 
                            shadow-none dark:shadow-[0_0_12px_rgba(0,91,102,0.4)] 
                            group-hover:scale-105">
                    <img src="{{ asset('images/img2.png') }}" alt="Logo Mahakrenov" class="w-full h-full object-contain rounded-lg"/>
                </div>

                <div class="flex flex-col leading-tight">
                    <span class="text-lg sm:text-xl font-black text-[#005B66] dark:text-teal-400 tracking-tight">MAHAKRENOV</span>
                    <span class="text-[9px] text-slate-500 dark:text-slate-400 font-bold tracking-wider uppercase">MAHASISWA KREATIF INOVATIF</span>
                </div>
            </a>

            <!-- Desktop Navigation (Sembunyi di Halaman Auth) -->
            @if(!$isAuthPage)
                <nav class="hidden lg:flex items-center gap-1">
                    @foreach($menuItems as $item)
                        <div class="relative group">
                            <a href="{{ $item['href'] }}" class="flex items-center gap-1 px-3.5 py-2 rounded-lg text-sm font-semibold text-slate-700 dark:text-slate-200 hover:text-[#005B66] dark:hover:text-teal-400 hover:bg-slate-100 dark:hover:bg-slate-800/60 transition-colors">
                                {{ $item['label'] }}
                                @if(isset($item['dropdown']))
                                    <svg class="w-3.5 h-3.5 group-hover:rotate-180 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                @endif
                            </a>

                            @if(isset($item['dropdown']))
                                <div class="absolute top-full left-0 hidden group-hover:block w-48 bg-white dark:bg-slate-900 rounded-xl shadow-xl border border-slate-200 dark:border-slate-800 py-2 z-50">
                                    @foreach($item['dropdown'] as $sub)
                                        <a href="{{ request()->is('/') ? '#divisi' : route('home') . '#divisi' }}" class="block px-4 py-2 text-xs font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-[#005B66] dark:hover:text-teal-400 transition-colors">
                                            {{ $sub }}
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                </nav>
            @endif

            <!-- Action Area (Toggle Dark Mode & CTA) -->
            <div class="flex items-center gap-2 sm:gap-3">
                <!-- Theme Toggle Button -->
                <button id="theme-toggle-btn" type="button" class="p-2 sm:p-2.5 rounded-xl bg-slate-100 dark:bg-slate-800/80 text-slate-600 dark:text-amber-400 hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors border border-slate-200 dark:border-slate-700 cursor-pointer" title="Beralih Mode Gelap/Terang">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 block dark:hidden text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                </button>

                @if(!$isAuthPage)
                    @auth
                        <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}" class="hidden sm:flex items-center gap-2 bg-[#005B66] hover:bg-[#004D56] text-white font-semibold text-xs sm:text-sm px-4 py-2 sm:py-2.5 rounded-xl transition-all shadow-sm">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="hidden sm:flex items-center gap-2 bg-[#005B66] hover:bg-[#004D56] text-white font-semibold text-xs sm:text-sm px-4 py-2 sm:py-2.5 rounded-xl transition-all shadow-sm">
                            Masuk
                        </a>
                    @endauth

                    <!-- Mobile Menu Button -->
                    <button type="button" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="lg:hidden text-slate-700 dark:text-slate-200 p-2 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                @else
                    <a href="{{ route('home') }}" class="text-xs font-semibold text-slate-600 dark:text-slate-300 hover:text-[#005B66] dark:hover:text-teal-400">
                        ← Kembali ke Beranda
                    </a>
                @endif
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Drawer -->
    @if(!$isAuthPage)
        <div id="mobile-menu" class="hidden lg:hidden bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 px-4 pb-5 pt-2">
            @foreach($menuItems as $item)
                <div class="border-b border-slate-100 dark:border-slate-800/80">
                    <a href="{{ $item['href'] }}" class="block py-2.5 text-sm font-semibold text-slate-700 dark:text-slate-200 hover:text-[#005B66] dark:hover:text-teal-400">
                        {{ $item['label'] }}
                    </a>
                </div>
            @endforeach
            
            <div class="pt-3">
                @auth
                    <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}" class="flex items-center justify-center bg-[#005B66] text-white font-semibold text-xs py-2.5 rounded-xl">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="flex items-center justify-center bg-[#005B66] text-white font-semibold text-xs py-2.5 rounded-xl">
                        Masuk / Daftar
                    </a>
                @endauth
            </div>
        </div>
    @endif
</header>
<header class="nav bg-white px-6 py-4 flex justify-between items-center shadow-sm">
    <a href="/" class="text-xl font-extrabold text-teal-700">
        MAHAKRENOV <small class="text-xs text-gray-500 font-normal">UPB</small>
    </a>
    <nav class="navlinks flex items-center gap-4 text-sm font-medium">
        <a href="/" class="hover:text-teal-600">Beranda</a>
        <a href="/#tentang" class="hover:text-teal-600">Tentang</a>
        <a href="/gallery" class="hover:text-teal-600">Galeri</a>
        <a href="/news" class="hover:text-teal-600">Berita</a>
        
        @auth
            <a href="{{ auth()->user()->role === 'admin' ? '/admin' : '/dashboard' }}" class="text-teal-600 font-semibold">Dashboard</a>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="btn secondary">Keluar</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="hover:text-teal-600">Login</a>
            <a href="{{ route('register') }}" class="btn">Register</a>
        @endauth
    </nav>
</header>
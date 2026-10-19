@extends('layouts.app')

@section('content')
@php
    // Fallback otomatis jika $mode tidak dikirim controller atau ditentukan dari nama route
    $currentMode = $mode ?? (request()->routeIs('register') ? 'register' : 'login');
@endphp

<div class="py-16 bg-slate-50 dark:bg-slate-950 transition-colors duration-300 min-h-[85vh] flex items-center justify-center">
    <div class="w-full max-w-md px-4">
        
        <div class="bg-white dark:bg-slate-900 rounded-3xl shadow-xl border border-slate-200/80 dark:border-slate-800 p-8">
            
            <!-- Logo & Brand Header -->
            <div class="text-center mb-8">
                <a href="/" class="inline-flex items-center gap-3 group mb-3">
                    <div class="bg-[#005B66] dark:bg-slate-800 p-2 rounded-xl w-12 h-12 flex items-center justify-center shadow-sm">
                        <img src="{{ asset('images/img2.png') }}" alt="Logo Mahakrenov" class="w-full h-full object-contain rounded-lg"/>
                    </div>
                    <div class="flex flex-col text-left">
                        <span class="text-xl font-black text-[#005B66] dark:text-teal-400 tracking-tight">MAHAKRENOV</span>
                        <span class="text-[9px] font-bold text-slate-500 dark:text-slate-400 tracking-wider uppercase">UPB BEKASI</span>
                    </div>
                </a>
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white">
                    {{ $currentMode === 'register' ? 'Buat Akun Baru' : 'Selamat Datang' }}
                </h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                    {{ $currentMode === 'register' ? 'Daftar untuk bergabung dan mengajukan pendaftaran divisi.' : 'Masuk ke portal akun mahasiswa Mahakrenov.' }}
                </p>
            </div>

            <!-- Flash Alert Messages -->
            @if(session('error'))
                <div class="mb-5 p-3.5 rounded-xl bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-600 dark:text-red-400 text-xs">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-5 p-3.5 rounded-xl bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-600 dark:text-red-400 text-xs space-y-1">
                    @foreach($errors->all() as $err)
                        <p>• {{ $err }}</p>
                    @endforeach
                </div>
            @endif

            <!-- Form Autentikasi -->
            <form action="{{ $currentMode === 'register' ? route('register') : route('login') }}" method="POST" class="space-y-4">
                @csrf

                @if($currentMode === 'register')
                    <div>
                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-2">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" required autofocus
                            class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#005B66] dark:focus:ring-teal-400 transition-all"
                            placeholder="Masukkan nama lengkap">
                    </div>
                @endif

                <div>
                    <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-2">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required {{ $currentMode === 'login' ? 'autofocus' : '' }}
                        class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#005B66] dark:focus:ring-teal-400 transition-all"
                        placeholder="nama@email.com">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-2">Kata Sandi</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#005B66] dark:focus:ring-teal-400 transition-all"
                        placeholder="••••••••">
                </div>

                @if($currentMode === 'register')
                    <div>
                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-2">Konfirmasi Kata Sandi</label>
                        <input type="password" name="password_confirmation" required
                            class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#005B66] dark:focus:ring-teal-400 transition-all"
                            placeholder="••••••••">
                    </div>
                @endif

                <button type="submit" class="w-full py-3.5 px-4 bg-[#005B66] hover:bg-[#004D56] text-white text-sm font-bold rounded-xl transition-all shadow-md hover:shadow-lg mt-2">
                    {{ $currentMode === 'register' ? 'Daftar Akun' : 'Masuk Sekarang' }}
                </button>
            </form>

            <!-- Switch Mode Link -->
            <div class="mt-6 text-center text-xs text-slate-500 dark:text-slate-400">
                @if($currentMode === 'register')
                    Sudah memiliki akun? 
                    <a href="{{ route('login') }}" class="font-bold text-[#005B66] dark:text-teal-400 hover:underline">Masuk</a>
                @else
                    Belum memiliki akun? 
                    <a href="{{ route('register') }}" class="font-bold text-[#005B66] dark:text-teal-400 hover:underline">Daftar Akun</a>
                @endif
            </div>

        </div>

    </div>
</div>
@endsection
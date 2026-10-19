@extends('layouts.app')

@section('content')
<div class="py-10 bg-slate-50 dark:bg-slate-950 min-h-[85vh] transition-colors duration-300">
    <div class="container-custom">
        <div class="grid lg:grid-cols-12 gap-8 items-start">
            
            <!-- Sidebar Kiri User -->
            <div class="lg:col-span-3">
                <x-admin-sidebar />
            </div>

            <!-- Konten Utama Dashboard -->
            <div class="lg:col-span-9 space-y-6">
                
                <!-- Welcome Banner -->
                <div class="bg-gradient-to-r from-[#005B66] to-[#003F47] rounded-3xl p-6 sm:p-8 text-white shadow-xl relative overflow-hidden">
                    <div class="relative z-10">
                        <span class="px-3 py-1 rounded-full bg-white/20 text-teal-100 text-xs font-semibold">Mahasiswa</span>
                        <h1 class="text-2xl sm:text-3xl font-black mt-3">Halo, {{ auth()->user()->name }} 👋</h1>
                        <p class="text-teal-100 text-xs sm:text-sm mt-2 max-w-xl">
                            Selamat datang di portal anggota Mahakrenov. Pantau status pendaftaran divisi dan informasi internal organisasi kamu di sini.
                        </p>
                    </div>
                </div>

                <!-- Status Card Pendaftaran -->
                <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 sm:p-8 border border-slate-200/80 dark:border-slate-800 shadow-sm">
                    <h2 class="text-lg font-bold text-slate-900 dark:text-white mb-4">Status Pendaftaran Divisi</h2>

                    @if(isset($application) && $application)
                        <div class="p-5 rounded-2xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                            <div>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Divisi Pilihan</p>
                                <h3 class="text-lg font-bold text-slate-900 dark:text-white mt-1">{{ $application->division ?? 'Research and Development' }}</h3>
                                <p class="text-xs text-slate-400 mt-1">Diajukan pada {{ \Carbon\Carbon::parse($application->created_at)->format('d M Y') }}</p>
                            </div>

                            <div>
                                @if(($application->status ?? 'pending') === 'approved')
                                    <span class="px-4 py-2 rounded-xl bg-emerald-100 text-emerald-800 dark:bg-emerald-900/40 dark:text-emerald-300 font-bold text-xs">
                                        ✓ Diterima
                                    </span>
                                @elseif(($application->status ?? 'pending') === 'rejected')
                                    <span class="px-4 py-2 rounded-xl bg-red-100 text-red-800 dark:bg-red-900/40 dark:text-red-300 font-bold text-xs">
                                        ✕ Belum Lolos
                                    </span>
                                @else
                                    <span class="px-4 py-2 rounded-xl bg-amber-100 text-amber-800 dark:bg-amber-900/40 dark:text-amber-300 font-bold text-xs">
                                        ⏳ Menunggu Verifikasi
                                    </span>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="text-center py-8 border-2 border-dashed border-slate-200 dark:border-slate-800 rounded-2xl">
                            <p class="text-sm text-slate-600 dark:text-slate-400">Kamu belum mengajukan pendaftaran divisi.</p>
                            <a href="{{ route('user.apply') }}" class="inline-flex items-center gap-2 mt-4 px-5 py-2.5 rounded-xl bg-[#005B66] hover:bg-[#004D56] text-white text-xs font-bold transition-all shadow-md">
                                Ajukan Pendaftaran
                            </a>
                        </div>
                    @endif
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
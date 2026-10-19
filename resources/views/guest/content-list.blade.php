@extends('layouts.app')

@section('content')
<div class="py-12 bg-slate-50 dark:bg-slate-950 transition-colors duration-300 min-h-[80vh]">
    <div class="container-custom">
        
        <!-- Header Halaman -->
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-[#005B66] dark:text-teal-400 font-bold text-sm uppercase tracking-widest">
                {{ $type === 'gallery' ? 'Dokumentasi Kegiatan' : 'Informasi & Kabar Terbaru' }}
            </span>
            <h1 class="text-3xl lg:text-4xl font-black text-slate-900 dark:text-white mt-2">
                {{ $type === 'gallery' ? 'Galeri Mahakrenov' : 'Berita & Artikel' }}
            </h1>
            <p class="text-slate-600 dark:text-slate-400 mt-3 text-sm lg:text-base">
                {{ $type === 'gallery' ? 'Kumpulan momen dan karya inovasi seluruh anggota Mahakrenov.' : 'Ikuti perkembangan kegiatan, prestasi, dan pengumuman resmi Mahakrenov.' }}
            </p>
        </div>

        @if($type === 'gallery')
            <!-- GRID GALERI -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($items as $item)
                    <div class="group bg-white dark:bg-slate-900 rounded-2xl overflow-hidden border border-slate-200/80 dark:border-slate-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <div class="relative h-56 overflow-hidden bg-slate-100 dark:bg-slate-800">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-5">
                            <h3 class="font-bold text-lg text-slate-900 dark:text-white group-hover:text-[#005B66] dark:group-hover:text-teal-400 transition-colors">
                                {{ $item->title }}
                            </h3>
                            @if(!empty($item->description))
                                <p class="text-sm text-slate-600 dark:text-slate-400 mt-2 line-clamp-2">
                                    {{ $item->description }}
                                </p>
                            @endif
                            <p class="text-xs text-slate-400 dark:text-slate-500 mt-4">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center text-slate-500 dark:text-slate-400">
                        Belum ada galeri yang diunggah.
                    </div>
                @endforelse
            </div>

        @else
            <!-- GRID BERITA -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($items as $item)
                    <div class="group bg-white dark:bg-slate-900 rounded-2xl overflow-hidden border border-slate-200/80 dark:border-slate-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between">
                        <div>
                            @if(!empty($item->image))
                                <div class="relative h-48 overflow-hidden bg-slate-100 dark:bg-slate-800">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                            @endif
                            <div class="p-6">
                                <span class="px-2.5 py-1 text-xs font-bold rounded-md bg-[#005B66]/10 text-[#005B66] dark:bg-teal-500/10 dark:text-teal-400">
                                    Berita
                                </span>
                                <h3 class="font-bold text-lg text-slate-900 dark:text-white mt-3 group-hover:text-[#005B66] dark:group-hover:text-teal-400 transition-colors">
                                    {{ $item->title }}
                                </h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 mt-2 line-clamp-3 leading-relaxed">
                                    {{ $item->content }}
                                </p>
                            </div>
                        </div>
                        <div class="px-6 pb-6 pt-2 border-t border-slate-100 dark:border-slate-800/60">
                            <span class="text-xs text-slate-400 dark:text-slate-500">
                                Dipublikasikan {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center text-slate-500 dark:text-slate-400">
                        Belum ada berita terbaru saat ini.
                    </div>
                @endforelse
            </div>
        @endif

    </div>
</div>
@endsection
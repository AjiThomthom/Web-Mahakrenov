@php
$newsItems = [
    'Pendaftaran Anggota Baru Batch 3 Tahun 2026 Telah Dibuka!',
    'Webinar "Prompting AI" — 04 Oktober 2026',
];
@endphp

<div class="bg-teal-500 text-white overflow-hidden border-y border-teal-600">
    <div class="flex items-center">
        <div class="flex items-center gap-2 bg-teal-600 px-5 py-3 flex-shrink-0 z-10 shadow-lg">
            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 5c7.18 0 13 5.82 13 13M6 11a7 7 0 017 7m-6 0a1 1 0 11-2 0 1 1 0 012 0z" />
            </svg>
            <span class="text-xs font-bold uppercase tracking-wider">Info Terbaru</span>
        </div>
        <div class="relative flex-1 overflow-hidden py-3">
            <div class="whitespace-nowrap animate-marquee flex gap-16">
                @foreach(array_merge($newsItems, $newsItems) as $item)
                    <span class="text-sm font-medium">• {{ $item }}</span>
                @endforeach
            </div>
        </div>
    </div>
</div>
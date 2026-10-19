@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Laporan Statistik Pendaftaran</h2>
            <button onclick="window.print()" class="bg-teal-600 hover:bg-teal-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition-colors">
                Cetak / Simpan PDF
            </button>
        </div>

        @if(!$report)
            <p class="text-gray-500">Memuat laporan...</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4 mb-6">
                @foreach($report as $k => $v)
                    <div class="bg-gray-50 border border-gray-200 p-4 rounded-xl text-center">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">
                            {{ ucwords(str_replace('_', ' ', $k)) }}
                        </p>
                        <h3 class="text-2xl font-extrabold text-teal-700">{{ $v }}</h3>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
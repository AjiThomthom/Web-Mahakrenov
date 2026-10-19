@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Manajemen Pendaftaran Divisi</h2>

        @if(session('success'))
            <div class="mb-4 p-4 bg-teal-50 border border-teal-200 text-teal-700 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-200 text-xs font-semibold text-gray-500 uppercase tracking-wider bg-gray-50">
                        <th class="py-3 px-4">Nama Pelamar</th>
                        <th class="py-3 px-4">Email</th>
                        <th class="py-3 px-4">Divisi</th>
                        <th class="py-3 px-4">No. HP</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                    @forelse($items as $a)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-3 px-4 font-medium text-gray-900">{{ $a->user->name ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $a->user->email ?? '-' }}</td>
                            <td class="py-3 px-4 font-semibold text-teal-700">{{ $a->division }}</td>
                            <td class="py-3 px-4">{{ $a->phone }}</td>
                            <td class="py-3 px-4">
                                <span class="px-2.5 py-1 text-xs rounded-full font-bold 
                                    @if($a->status === 'diterima') bg-green-100 text-green-800
                                    @elseif($a->status === 'ditolak') bg-red-100 text-red-800
                                    @elseif($a->status === 'diproses') bg-blue-100 text-blue-800
                                    @else bg-amber-100 text-amber-800 @endif">
                                    {{ ucfirst($a->status) }}
                                </span>
                            </td>
                            <td class="py-3 px-4">
                                <form action="{{ url('/admin/applications/' . $a->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" class="text-xs border border-gray-300 rounded-md p-1.5 focus:outline-none focus:ring-2 focus:ring-teal-500">
                                        <option value="pending" {{ $a->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="diproses" {{ $a->status === 'diproses' ? 'selected' : '' }}>Diproses</option>
                                        <option value="diterima" {{ $a->status === 'diterima' ? 'selected' : '' }}>Diterima</option>
                                        <option value="ditolak" {{ $a->status === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-gray-500">Belum ada pendaftaran masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
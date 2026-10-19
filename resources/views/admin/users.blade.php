@extends('layouts.admin') {{-- Sesuaikan dengan nama layout admin kamu --}}

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ $type === 'dashboard' ? 'Ringkasan Dashboard Admin' : 'Manajemen Pengguna' }}
            </h2>
        </div>

        @if($type === 'dashboard')
            <!-- Ringkasan Kartu Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-teal-50 border border-teal-100 p-5 rounded-xl">
                    <span class="text-xs font-bold text-teal-600 uppercase tracking-wider">Total Pengguna</span>
                    <p class="text-3xl font-black text-teal-800 mt-2">{{ $totalUsers ?? 0 }}</p>
                </div>

                <div class="bg-blue-50 border border-blue-100 p-5 rounded-xl">
                    <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Total Pendaftar</span>
                    <p class="text-3xl font-black text-blue-800 mt-2">{{ $totalApps ?? 0 }}</p>
                </div>

                <div class="bg-amber-50 border border-amber-100 p-5 rounded-xl">
                    <span class="text-xs font-bold text-amber-600 uppercase tracking-wider">Pendaftaran Pending</span>
                    <p class="text-3xl font-black text-amber-800 mt-2">{{ $pendingApps ?? 0 }}</p>
                </div>
            </div>

            <h3 class="text-lg font-bold text-gray-700 mb-4">5 Pengguna Terbaru Registered</h3>
        @endif

        <!-- Tabel Pengguna -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-200 text-xs font-semibold text-gray-500 uppercase tracking-wider bg-gray-50">
                        <th class="py-3 px-4">Nama</th>
                        <th class="py-3 px-4">Email</th>
                        <th class="py-3 px-4">Role</th>
                        <th class="py-3 px-4">Tanggal Bergabung</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                    @forelse($users as $u)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-3 px-4 font-medium text-gray-900">{{ $u->name }}</td>
                            <td class="py-3 px-4">{{ $u->email }}</td>
                            <td class="py-3 px-4">
                                <span class="px-2.5 py-1 text-xs rounded-full font-bold {{ $u->role === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-teal-100 text-teal-800' }}">
                                    {{ ucfirst($u->role) }}
                                </span>
                            </td>
                            <td class="py-3 px-4">{{ \Carbon\Carbon::parse($u->created_at)->format('d M Y, H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-8 text-center text-gray-500">
                                Belum ada pengguna terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
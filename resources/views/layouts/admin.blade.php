@extends('layouts.app')

@section('layout_content')
    <x-site-nav />

    <main class="container py-8">
        <h2 class="text-2xl font-bold mb-6">Panel Admin</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-[220px_1fr] gap-6">
            <x-admin-sidebar />
            
            <section class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                @yield('content')
            </section>
        </div>
    </main>
@endsection
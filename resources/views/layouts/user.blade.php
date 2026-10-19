@extends('layouts.app')

@section('layout_content')
    <x-site-nav />

    <main class="container py-8">
        @auth
            <p class="text-sm text-gray-500 mb-4">Area User · {{ auth()->user()->name }}</p>
        @endauth

        @yield('content')
    </main>
@endsection
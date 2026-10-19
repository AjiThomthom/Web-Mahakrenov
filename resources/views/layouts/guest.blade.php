@extends('layouts.app')

@section('layout_content')
    <x-site-nav />

    <main class="container py-8">
        @yield('content')
    </main>
@endsection
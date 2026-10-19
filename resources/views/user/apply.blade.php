@extends('layouts.user')

@section('content')
<div class="card">
    <h1>Form Apply Mahakrenov</h1>

    @if(session('msg'))
        <p style="color: green; font-weight: bold;">{{ session('msg') }}</p>
    @endif

    <form class="stack" action="{{ url('/apply') }}" method="POST">
        @csrf
        <label>
            No. WhatsApp
            <input type="text" name="phone" value="{{ old('phone') }}" required>
        </label>

        <label>
            Pilihan Divisi
            <select name="division">
                @foreach(['Riset & Pengembangan', 'Media dan Informasi', 'Organisasi', 'Kewirausahaan'] as $div)
                    <option value="{{ $div }}" {{ old('division') == $div ? 'selected' : '' }}>{{ $div }}</option>
                @endforeach
            </select>
        </label>

        <label>
            Motivasi
            <textarea name="motivation" rows="5" required>{{ old('motivation') }}</textarea>
        </label>

        <button type="submit" class="btn">Kirim Pendaftaran</button>
    </form>
</div>
@endsection
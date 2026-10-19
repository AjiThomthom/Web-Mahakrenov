@extends('layouts.admin')

@section('content')
<div class="stack">
    <h2>{{ $type === 'gallery' ? 'Manajemen Galeri' : 'Manajemen Berita' }}</h2>

    <form class="card stack" action="{{ url('/admin/' . $type) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Tambah Konten</h3>

        <label>
            Judul
            <input type="text" name="title" required value="{{ old('title') }}">
        </label>

        @if($type === 'gallery')
            <label>
                Deskripsi
                <textarea name="description">{{ old('description') }}</textarea>
            </label>
        @else
            <label>
                Isi Berita
                <textarea name="body" rows="5" required>{{ old('body') }}</textarea>
            </label>
        @endif

        <label>
            Gambar
            <input type="file" name="image" accept="image/*">
        </label>

        <button type="submit" class="btn">Simpan</button>

        @if(session('msg'))
            <p style="color: green;">{{ session('msg') }}</p>
        @endif
    </form>

    <div class="card">
        <h3>Konten Tersimpan</h3>
        @forelse($items as $x)
            <div style="display: flex; justify-content: space-between; align-items: center; gap: 12px; padding: 10px 0; border-bottom: 1px solid #eee;">
                <span>{{ $x->title }}</span>
                <form action="{{ url('/admin/' . $type . '/' . $x->id) }}" method="POST" onsubmit="return confirm('Hapus konten ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn danger">Hapus</button>
                </form>
            </div>
        @empty
            <p class="muted">Belum ada konten tersimpan.</p>
        @endforelse
    </div>
</div>
@endsection
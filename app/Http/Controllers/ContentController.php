<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    /**
     * Menampilkan Galeri Publik.
     */
    public function publicGallery()
    {
        $galleries = Gallery::latest()->get();

        return view('guest.content-list', [
            'type'  => 'gallery',
            'items' => $galleries,
        ]);
    }

    /**
     * Menampilkan Berita Publik.
     */
    public function publicNews()
    {
        $news = News::latest()->get();

        return view('guest.content-list', [
            'type'  => 'news',
            'items' => $news,
        ]);
    }

    /**
     * Menampilkan Halaman Kelola Galeri (Admin).
     */
    public function adminGallery()
    {
        $items = Gallery::latest()->get();

        return view('admin.content-manager', [
            'type'  => 'gallery',
            'items' => $items,
        ]);
    }

    /**
     * Menampilkan Halaman Kelola Berita (Admin).
     */
    public function adminNews()
    {
        $items = News::latest()->get();

        return view('admin.content-manager', [
            'type'  => 'news',
            'items' => $items,
        ]);
    }

    /**
     * Menyimpan Galeri Baru (Admin).
     */
    public function storeGallery(Request $request)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image'       => ['required', 'image', 'max:5120'],
        ]);

        $imagePath = $request->file('image')->store('mahakrenov/gallery', 'public');

        Gallery::create([
            'title'       => $data['title'],
            'description' => $data['description'] ?? null,
            'image_path'  => Storage::disk('public')->url($imagePath),
            'user_id'     => $request->user()->id,
        ]);

        return back()->with('success', 'Galeri berhasil ditambahkan.');
    }

    /**
     * Menyimpan Berita Baru (Admin).
     */
    public function storeNews(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body'  => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:5120'],
        ]);

        $imagePath = $request->file('image')
            ? Storage::disk('public')->url($request->file('image')->store('mahakrenov/news', 'public'))
            : null;

        News::create([
            'title'      => $data['title'],
            'body'       => $data['body'],
            'image_path' => $imagePath,
            'user_id'    => $request->user()->id,
        ]);

        return back()->with('success', 'Berita berhasil dipublikasikan.');
    }

    /**
     * Menghapus Galeri (Admin).
     */
    public function destroyGallery($id)
    {
        $item = Gallery::findOrFail($id);
        $item->delete();

        return back()->with('success', 'Galeri berhasil dihapus.');
    }

    /**
     * Menghapus Berita (Admin).
     */
    public function destroyNews($id)
    {
        $item = News::findOrFail($id);
        $item->delete();

        return back()->with('success', 'Berita berhasil dihapus.');
    }
}
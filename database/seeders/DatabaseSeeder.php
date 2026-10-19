<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed User Admin Utama (Pastikan email terisi)
        $adminId = DB::table('users')->insertGetId([
            'name'       => env('DB_USERNAME', 'Ajithomthom'),
            'email'      => 'admin@mahakrenov.com',
            'password'   => Hash::make(env('DB_PASSWORD', 'mahakrenovpb123')),
            'role'       => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Seed Master Kabinet Awal (Cek tabel dulu)
        if (Schema::hasTable('mst_kabinet')) {
            DB::table('mst_kabinet')->insert([
                'periode'    => '2025/2026',
                'nama'       => 'Kabinet Inovasi & Karya',
                'is_active'  => true,
                'created_at' => now(),
                'created_by' => $adminId,
                'updated_at' => now(),
                'updated_by' => $adminId,
            ]);
        }

        // 3. Seed Sample Anggota
        if (Schema::hasTable('mst_anggota')) {
            DB::table('mst_anggota')->insert([
                'nim'        => '23000001',
                'nama'       => 'Ajithomthom',
                'prodi'      => 'Informatika',
                'foto'       => null,
                'status'     => 'Aktif',
                'created_at' => now(),
                'created_by' => $adminId,
                'updated_at' => now(),
                'updated_by' => $adminId,
            ]);
        }

        // 4. Seed CMS Kabinet
        if (Schema::hasTable('cms_kabinet')) {
            DB::table('cms_kabinet')->insert([
                'periode_mst_kabinet' => '2025/2026',
                'nim_mst_anggota'     => '23000001',
                'jabatan'             => 'Ketua Umum',
                'created_at'          => now(),
                'created_by'          => $adminId,
                'updated_at'          => now(),
                'updated_by'          => $adminId,
            ]);
        }

        // 5. Seed Sample Projects
        if (Schema::hasTable('cms_projek')) {
            DB::table('cms_projek')->insert([
                'judul'      => 'Mahakrenov Portal Web',
                'about'      => 'Platform media sosial profesional untuk Mahakrenov',
                'penjelasan' => 'Website resmi organisasi Mahakrenov berbasis Laravel 13, PostgreSQL, dan Tailwind CSS.',
                'link'       => 'https://mahakrenov.com',
                'thumbnail'  => null,
                'created_at' => now(),
                'created_by' => $adminId,
                'updated_at' => now(),
                'updated_by' => $adminId,
            ]);
        }

        // 6. Seed Sample Sertifikat
        if (Schema::hasTable('cms_sertifikat')) {
            DB::table('cms_sertifikat')->insert([
                'nomor_sertifikat' => 'MHK-AI-2026-001',
                'judul'            => 'Webinar AI Prompting & Automation',
                'nama_penerima'    => 'Peserta Teladan',
                'komentar'         => 'Sertifikat kelulusan event AI Mahakrenov',
                'created_at'       => now(),
                'created_by'       => $adminId,
                'updated_at'       => now(),
                'updated_by'       => $adminId,
            ]);
        }

        // 7. Seed Sample Galeri & Berita untuk Blade Landing Page
        if (Schema::hasTable('galleries')) {
            DB::table('galleries')->insert([
                'title'       => 'Kegiatan Upgrading Internal',
                'description' => 'Pelatihan internal anggota Mahakrenov UPB.',
                'image_path'  => '/images/img1.jpeg',
                'user_id'     => $adminId,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }

        if (Schema::hasTable('news')) {
            DB::table('news')->insert([
                'title'      => 'Pendaftaran Anggota Baru Mahakrenov Batch 3 Open!',
                'body'       => 'Mari bergabung menjadi bagian dari perubahan dan inovasi di Universitas Pelita Bangsa.',
                'image_path' => '/images/img3.jpeg',
                'user_id'    => $adminId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
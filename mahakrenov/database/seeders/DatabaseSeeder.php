<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed User Admin Utama
        $adminId = DB::table('users')->insertGetId([
            'name'       => env('DB_USERNAME', 'Ajithomthom'),
            'password'   => Hash::make(env('DB_PASSWORD', 'mahakrenovpb123')),
            'created_at' => now(),
            'update_at'  => now(),
        ]);

        // 2. Seed Master Kabinet Awal
        DB::table('mst_kabinet')->insert([
            'periode'    => '2025/2026',
            'nama'       => 'Kabinet Inovasi & Karya',
            'is_active'  => true,
            'created_at' => now(),
            'created_by' => $adminId,
            'update_at'  => now(),
            'update_by'  => $adminId,
        ]);

        // 3. Seed Sample Anggota
        DB::table('mst_anggota')->insert([
            'nim'        => '23000001',
            'nama'       => 'Ajithomthom',
            'prodi'      => 'Informatika',
            'foto'       => null,
            'status'     => 'Aktif',
            'created_at' => now(),
            'created_by' => $adminId,
            'update_at'  => now(),
            'update_by'  => $adminId,
        ]);

        // 4. Seed CMS Kabinet (Pivot Relasi Periode - NIM)
        DB::table('cms_kabinet')->insert([
            'periode_mst_kabinet' => '2025/2026',
            'nim_mst_anggota'     => '23000001',
            'jabatan'             => 'Ketua Umum',
            'created_at'          => now(),
            'created_by'          => $adminId,
            'update_at'           => now(),
            'update_by'           => $adminId,
        ]);

        // 5. Seed Sample Projects
        DB::table('cms_projek')->insert([
            'judul'      => 'Mahakrenov Portal Web',
            'about'      => 'Platform media sosial profesional untuk Mahakrenov',
            'penjelasan' => 'Website resmi organisasi Mahakrenov berbasis Laravel 13, PostgreSQL, dan Tailwind CSS.',
            'link'       => 'https://mahakrenov.com',
            'thumbnail'  => null,
            'created_at' => now(),
            'created_by' => $adminId,
            'update_at'  => now(),
            'update_by'  => $adminId,
        ]);

        // 6. Seed Sample Sertifikat (Untuk Scanner / Barcode Test)
        DB::table('cms_sertifikat')->insert([
            'nomor_sertifikat' => 'MHK-AI-2026-001',
            'judul'            => 'Webinar AI Prompting & Automation',
            'nama_penerima'    => 'Peserta Teladan',
            'komentar'         => 'Sertifikat kelulusan event AI Mahakrenov',
            'created_at'       => now(),
            'created_by'       => $adminId,
            'update_at'        => now(),
            'update_by'        => $adminId,
        ]);
    }
}   
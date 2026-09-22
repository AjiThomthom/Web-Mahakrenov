<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. TABEL USERS
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('password', 255);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('update_at')->useCurrent();
        });

        // 2. TABEL MASTER ANGGOTA
        Schema::create('mst_anggota', function (Blueprint $table) {
            $table->string('nim', 50)->primary();
            $table->string('nama', 255);
            $table->string('prodi', 100)->nullable();
            $table->string('foto', 255)->nullable();
            $table->string('status', 50)->nullable();
            
            $table->timestamp('created_at')->useCurrent();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('update_at')->useCurrent();
            $table->foreignId('update_by')->nullable()->constrained('users')->nullOnDelete();
        });

        // 3. TABEL MASTER KABINET
        Schema::create('mst_kabinet', function (Blueprint $table) {
            $table->string('periode', 50)->primary();
            $table->string('nama', 255);
            $table->boolean('is_active')->default(false);
            
            $table->timestamp('created_at')->useCurrent();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('update_at')->useCurrent();
            $table->foreignId('update_by')->nullable()->constrained('users')->nullOnDelete();
        });

        // 4. TABEL CMS KABINET (PIVOT)
        Schema::create('cms_kabinet', function (Blueprint $table) {
            $table->string('periode_mst_kabinet', 50);
            $table->string('nim_mst_anggota', 50);
            $table->string('jabatan', 100);

            $table->foreign('periode_mst_kabinet')->references('periode')->on('mst_kabinet')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('nim_mst_anggota')->references('nim')->on('mst_anggota')->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamp('created_at')->useCurrent();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('update_at')->useCurrent();
            $table->foreignId('update_by')->nullable()->constrained('users')->nullOnDelete();

            $table->primary(['periode_mst_kabinet', 'nim_mst_anggota']);
        });

        // 5. TABEL CMS PROJEK
        Schema::create('cms_projek', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255);
            $table->text('about');
            $table->text('penjelasan');
            $table->string('link', 255)->nullable();
            $table->string('thumbnail', 255)->nullable();
            
            $table->timestamp('created_at')->useCurrent();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('update_at')->useCurrent();
            $table->foreignId('update_by')->nullable()->constrained('users')->nullOnDelete();
        });

        // 6. TABEL CMS SERTIFIKAT
        Schema::create('cms_sertifikat', function (Blueprint $table) {
            $table->string('nomor_sertifikat', 100)->primary();
            $table->string('judul', 255);
            $table->string('nama_penerima', 255);
            $table->text('komentar')->nullable();
            
            $table->timestamp('created_at')->useCurrent();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('update_at')->useCurrent();
            $table->foreignId('update_by')->nullable()->constrained('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cms_sertifikat');
        Schema::dropIfExists('cms_projek');
        Schema::dropIfExists('cms_kabinet');
        Schema::dropIfExists('mst_kabinet');
        Schema::dropIfExists('mst_anggota');
        Schema::dropIfExists('users');
    }
};

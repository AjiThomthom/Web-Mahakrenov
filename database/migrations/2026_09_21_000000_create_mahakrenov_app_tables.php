<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. TABEL USERS (Auth Laravel + Role)
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('user');
            $table->rememberToken();
            $table->timestamps();
        });

        // 2. TABEL SESSIONS (Driver Session Database)
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        // 3. TABEL CACHE & CACHE LOCKS
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->mediumText('value');
            $table->bigInteger('expiration')->index();
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('owner');
            $table->bigInteger('expiration')->index();
        });

        // 4. TABEL APPLICATIONS (Form Pendaftaran Divisi)
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('phone', 30);
            $table->string('division', 120);
            $table->text('motivation');
            $table->enum('status', ['pending', 'diproses', 'diterima', 'ditolak'])->default('pending');
            $table->text('note')->nullable();
            $table->timestamps();
        });

        // 5. TABEL GALLERIES
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image_path');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        // 6. TABEL NEWS
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body');
            $table->string('image_path')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        // 7. TABEL MASTER ANGGOTA
        Schema::create('mst_anggota', function (Blueprint $table) {
            $table->string('nim', 50)->primary();
            $table->string('nama', 255);
            $table->string('prodi', 100)->nullable();
            $table->string('foto', 255)->nullable();
            $table->string('status', 50)->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        // 8. TABEL MASTER KABINET
        Schema::create('mst_kabinet', function (Blueprint $table) {
            $table->string('periode', 50)->primary();
            $table->string('nama', 255);
            $table->boolean('is_active')->default(false);
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        // 9. TABEL CMS KABINET (PIVOT)
        Schema::create('cms_kabinet', function (Blueprint $table) {
            $table->string('periode_mst_kabinet', 50);
            $table->string('nim_mst_anggota', 50);
            $table->string('jabatan', 100);

            $table->foreign('periode_mst_kabinet')->references('periode')->on('mst_kabinet')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('nim_mst_anggota')->references('nim')->on('mst_anggota')->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            $table->primary(['periode_mst_kabinet', 'nim_mst_anggota']);
        });

        // 10. TABEL CMS PROJEK
        Schema::create('cms_projek', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255);
            $table->text('about');
            $table->text('penjelasan');
            $table->string('link', 255)->nullable();
            $table->string('thumbnail', 255)->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        // 11. TABEL CMS SERTIFIKAT
        Schema::create('cms_sertifikat', function (Blueprint $table) {
            $table->string('nomor_sertifikat', 100)->primary();
            $table->string('judul', 255);
            $table->string('nama_penerima', 255);
            $table->text('komentar')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_sertifikat');
        Schema::dropIfExists('cms_projek');
        Schema::dropIfExists('cms_kabinet');
        Schema::dropIfExists('mst_kabinet');
        Schema::dropIfExists('mst_anggota');
        Schema::dropIfExists('news');
        Schema::dropIfExists('galleries');
        Schema::dropIfExists('applications');
        Schema::dropIfExists('cache_locks');
        Schema::dropIfExists('cache');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('users');
    }
};
# Mahakrenov Web - Setup Environment

## Cara Jalankan Project (Khusus Contributor/Frontend)

1. **Clone repository & siapkan file environment:**
   ```bash
   cp .env.example .env

2. **Menyalakan Docker Container:**
   ```bash
   docker compose up -d

3. **Install dependensi Composer & Generate Key:**
   ```bash
   docker compose exec app composer install
   docker compose exec app php artisan key:generate

4. **Build Struktur Database & Seed Data Awal:**
   ```bash
   docker compose exec app php artisan migrate:fresh --seed   

5. **Akses Aplikasi:**
   ```bash
   Buka browser di http://localhost:8080
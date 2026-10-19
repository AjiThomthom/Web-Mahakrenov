# Mahakrenov Web - Setup Environment

## Cara Jalankan Project

1. **Clone repository & siapkan file environment:**
   ```bash
   cp .env.example .env

2. **Menyalakan Docker Container (Pertama Kali):**
   ```bash
   sudo docker compose up -d --build
   ```
   kalo udah build nanti jalaninya nggak pake build lagi
   ```bash
   sudo docker compose up -d
   ```
   Kalo mau matiin
   ```bash
   sudo docker compose down
   

4. **Install dependensi Composer & Generate Key:**
   ```bash
   sudo docker compose exec app composer install
   sudo docker compose exec app php artisan key:generate

5. **Build Struktur Database & Seed Data Awal:**
   ```bash
   sudo docker compose exec app php artisan migrate:fresh --seed   

6. **Akses Aplikasi:**
   ```bash
   Buka browser di http://localhost:8080

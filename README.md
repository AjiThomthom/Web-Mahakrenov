# Mahakrenov Web - Setup Environment & Deployment Guide

Dokumentasi resmi untuk menjalankan dan mengelola lingkungan pengembangan (*development*) serta penyebaran (*deployment*) aplikasi web **Mahakrenov** berbasis Docker.

---

## 🚀 Cara Menjalankan Proyek di Localhost

### 1. Clone Repository & Konfigurasi Environment
Salin file `.env.example` menjadi `.env`:
`cp .env.example .env`

> **Catatan:** Sesuaikan konfigurasi database (`DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) di dalam file `.env` jika diperlukan.

---

### 2. Menyalakan Docker Container

**Pertama kali (dengan Build Image):**
`sudo docker compose up -d --build`

**Menjalankan container yang sudah pernah di-build:**
`sudo docker compose up -d`

**Menghentikan Docker Container:**
`sudo docker compose down`

---

### 3. Konfigurasi Awal Aplikasi (Persiapan Pertama Kali / Deployment)

Jalankan perintah-perintah berikut secara berurutan untuk mengatur izin direktori, memasang dependensi, membuat kunci aplikasi, dan menyiapkan basis data:

# Fix permission folder storage secara runtime
sudo docker compose exec app chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
sudo docker compose exec app chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Install dependencies composer & jalankan migrasi database
sudo docker compose exec app composer install --optimize-autoloader --no-dev
sudo docker compose exec app php artisan key:generate
sudo docker compose exec app php artisan storage:link
sudo docker compose exec app php artisan migrate:fresh --seed --force
sudo docker compose exec app php artisan config:clear
sudo docker compose exec app php artisan view:clear

---

### 4. Akses Aplikasi
Buka peramban (*browser*) dan akses alamat berikut:
👉 **http://localhost:8080**

---

## 🛠️ Perintah Berguna Lainnya

* **Melihat Log Aplikasi (Laravel):**
  `sudo docker compose logs -f app`

* **Melihat Log Web Server (Nginx):**
  `sudo docker compose logs -f webserver`

* **Reset Ulang Database (Fresh Data & Seed):**
  `sudo docker compose exec app php artisan migrate:fresh --seed`

* **Membersihkan Cache Secara Berkala:**
  `sudo docker compose exec app php artisan cache:clear`
  `sudo docker compose exec app php artisan config:clear`
  `sudo docker compose exec app php artisan view:clear`

# Panduan Struktur Folder & Edit Kode (Web Kontraktor)

Dokumen ini dibuat untuk merapikan pemahaman Anda tentang letak file-file penting di proyek ini, agar Anda bisa melakukan edit kode sendiri dengan mudah di masa depan tanpa kebingungan.

---

## 📂 Peta Folder Utama Laravel

Berikut adalah letak file-file yang paling sering diedit dalam proyek ini:

### 1. Tampilan Halaman (HTML & Blade)
Semua file tampilan berada di dalam folder **`resources/views/`**:
- **Layout Utama & Header/Footer**: 
  - [`resources/views/layouts/app.blade.php`](file:///d:/project_laravel/web-kontraktor/resources/views/layouts/app.blade.php) — Tempat mengedit **Logo, Menu Navigasi (Navbar), Tombol WhatsApp Floating, dan Footer** untuk halaman publik.
- **Komponen Beranda (Home Partials)**:
  - [`resources/views/partials/hero.blade.php`](file:///d:/project_laravel/web-kontraktor/resources/views/partials/hero.blade.php) — Bagian paling atas (slideshow foto proyek, judul utama, statistik 130+ proyek).
  - [`resources/views/partials/contact.blade.php`](file:///d:/project_laravel/web-kontraktor/resources/views/partials/contact.blade.php) — Bagian kontak di beranda (hanya berisi link media sosial).
  - [`resources/views/partials/portfolio.blade.php`](file:///d:/project_laravel/web-kontraktor/resources/views/partials/portfolio.blade.php) — Menampilkan daftar proyek dinamis dari database.
- **Halaman Statis Mandiri**:
  - [`resources/views/contact.blade.php`](file:///d:/project_laravel/web-kontraktor/resources/views/contact.blade.php) — Halaman khusus kontak lengkap (Maps, Alamat, Form Konsultasi/Inquiry).
  - [`resources/views/profile.blade.php`](file:///d:/project_laravel/web-kontraktor/resources/views/profile.blade.php) — Halaman Tentang Kami / Profil Perusahaan.
  - [`resources/views/services.blade.php`](file:///d:/project_laravel/web-kontraktor/resources/views/services.blade.php) — Halaman Layanan Kami.

### 2. Logika Program (Controllers)
Berada di dalam folder **`app/Http/Controllers/`**:
- **Admin Controllers** (`app/Http/Controllers/Admin/`):
  - [`SettingController.php`](file:///d:/project_laravel/web-kontraktor/app/Http/Controllers/Admin/SettingController.php) — Mengatur validasi & penyimpanan data pengaturan web (media sosial, deskripsi, dll).
  - [`ProjectController.php`](file:///d:/project_laravel/web-kontraktor/app/Http/Controllers/Admin/ProjectController.php) — Mengatur pengelolaan input proyek (tambah, edit, hapus foto proyek).
- **Public Controllers**:
  - [`HomeController.php`](file:///d:/project_laravel/web-kontraktor/app/Http/Controllers/HomeController.php) — Mengatur penampilan halaman publik dan pengiriman data form dari halaman `/kontak` ke database.

### 3. File Style (CSS)
Berada di dalam folder **`resources/css/`**:
- [`app.css`](file:///d:/project_laravel/web-kontraktor/resources/css/app.css) — File utama Tailwind CSS v4. Di sini terdapat setelan variabel warna `@theme` (seperti `--color-brand-primary` untuk hijau gelap) serta animasi kustom.

### 4. Rute Url (Routes)
Berada di dalam folder **`routes/`**:
- [`web.php`](file:///d:/project_laravel/web-kontraktor/routes/web.php) — Mendaftarkan alamat URL website (seperti `/kontak`, `/admin/settings`, dll) dan menghubungkannya dengan controller yang sesuai.

### 5. Media & Gambar Proyek
Berada di dalam folder **`public/`**:
- [`public/images/projects/`](file:///d:/project_laravel/web-kontraktor/public/images/projects/) — Tempat penyimpanan foto-foto proyek default.

---

## 🛠️ Cara Edit Kode Sendiri & Menjalankannya

Jika Anda melakukan perubahan pada file-file di atas di komputer lokal Anda:

1. **Gunakan Perintah Serve Bawaan (Khusus untuk Web Hostinger Anda yang index.php-nya di Root)**:
   Jalankan perintah ini di terminal untuk melihat perubahan tampilan web Anda secara lokal:
   ```bash
   php -S localhost:8000 -t public scratch/router.php
   ```
   *Buka browser di alamat: `http://localhost:8000`*

2. **Kompilasi Aset CSS/JS (Vite)**:
   Setiap kali Anda mengedit file CSS (`app.css`) atau file blade untuk kelas Tailwind baru, Anda wajib menjalankan kompilasi aset ini agar perubahan efek/warna/layout baru termuat:
   ```bash
   npm run build
   ```

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

<h1 align="center">📘 Sistem Penilaian Siswa</h1>
<p align="center">Aplikasi berbasis web untuk mencatat, mengelola, dan merekap nilai siswa menggunakan Laravel.</p>

---

## 🧾 Deskripsi Proyek

Sistem Penilaian Siswa adalah aplikasi berbasis Laravel yang dirancang untuk membantu guru dan kepala sekolah dalam mengelola data nilai siswa. Proyek ini mendukung banyak peran (admin, guru, kepala sekolah, siswa) dan menyediakan fitur CRUD lengkap, serta ekspor data ke Excel.

---

## 📌 Fitur Utama

- Autentikasi multi-role: admin, guru, kepala sekolah, dan siswa.
- Manajemen data:
  - Guru
  - Siswa
  - Mata Pelajaran
  - Kelas
  - Nilai
- Rekapitulasi nilai per siswa dan kelas
- Ekspor nilai ke format Excel
- Tampilan dashboard dan sidebar responsif
- Validasi form
- UI berbasis template AdminLTE/NiceAdmin

---

## 👤 Role & Login

| Role        | Username / Email         | Password  |
|-------------|--------------------------|-----------|
| Admin       | `admin@example.com`      | `test123` |
| Guru        | `guru@example.com`       | `test123` |
| Kepsek      | `kepsek@example.com`     | `test123` |
| Siswa       | `siswa@example.com`      | `test123` |

> ✳️ *Data login disesuaikan dengan seeder awal atau data manual pada database.*

---

## 📂 Struktur Folder Penting

```plaintext
├── app/
│   └── Models/             # Model Eloquent
│   └── Http/Controllers/   # Controller MVC
├── database/migrations/    # Struktur tabel
├── database/seeders/       # Seeder data awal
├── resources/views/        # Blade templates
├── routes/web.php          # Routing aplikasi
└── public/                 # Asset publik dan front-end


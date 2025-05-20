cat <<EOF > README.md
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
```

---

## 🚀 Cara Instalasi

> Pastikan kamu sudah menginstall:
> - PHP >= 8.1
> - Composer
> - MySQL / MariaDB
> - Node.js & NPM (untuk asset frontend)
> - XAMPP / Laragon / Laravel Valet (untuk server lokal)

### Langkah-langkah:

```bash
# Clone repository ini
git clone https://github.com/ryanariw/penilaian_siswa.git
cd penilaian_siswa

# Install dependency
composer install
npm install && npm run dev

# Copy environment file & generate app key
cp .env.example .env
php artisan key:generate

# Buat database secara manual lalu set di file .env
DB_DATABASE=nama_db
DB_USERNAME=root
DB_PASSWORD=

# Jalankan migrasi dan seeder (opsional)
php artisan migrate --seed

# Jalankan server
php artisan serve
```

---

## 🔒 Role Guarding

Penggunaan middleware disesuaikan dengan role user. Contoh:

```php
Route::middleware(['auth', 'role:guru'])->group(function () {
    Route::get('/nilai', [NilaiController::class, 'index']);
});
```

---

## 📤 Ekspor Data

Tersedia fitur ekspor nilai dan data guru dalam format Excel menggunakan `Maatwebsite\Excel`. Lokasi file ekspor bisa ditemukan di:

```bash
storage/app/exports/
```

---

## 🖼️ Screenshot (opsional)

Tambahkan screenshot UI kamu di folder `/screenshots` dan tampilkan di sini:

```markdown
![Dashboard](screenshots/dashboard.png)
![Data Nilai](screenshots/nilai.png)
```

---

## 🧪 Testing (opsional)

```bash
php artisan test
```

---

## 📄 Lisensi

Proyek ini menggunakan lisensi [MIT License](https://opensource.org/licenses/MIT).

---

## 📫 Kontak

> Dibuat oleh **Ryan Ari**  
> 🌐 GitHub: [@ryanariw](https://github.com/ryanariw)  
> ✉️ Email: ryanari545@gmail.com

---

## ✅ Status

Proyek ini sedang dalam pengembangan dan terbuka untuk kontribusi serta perbaikan.
EOF

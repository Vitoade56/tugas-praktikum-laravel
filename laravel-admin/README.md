# Laravel Admin

Aplikasi latihan praktikum **Framework Laravel** yang memakai template **SB Admin 2** (Bootstrap) dengan sistem templating Blade, CRUD data admin, serta migration dan seeder. Dibuat dengan Laravel 12, PHP 8.2, dan MySQL (XAMPP).

**Disusun oleh:** Vito Ade Chrisnanta / 2513020056

## Fitur

- **Sistem templating (hal 12):** satu layout bersama (header, sidebar, content, footer) yang dipakai semua halaman lewat `@extends`, `@section`, dan `@include`.
- **Lima halaman:** Home, Product, Service, Contact, About, dengan menu aktif di sidebar.
- **CRUD Admin (hal 19):** tambah, lihat, ubah, dan hapus data pada tabel `admins`, dengan validasi dan pesan notifikasi.
- **Migration dan Seeder (hal 27):** tabel dibuat lewat migration, data awal dibuat lewat seeder dengan Faker.

## Teknologi

- Laravel 12 dan PHP 8.2
- MySQL (XAMPP) dan phpMyAdmin
- SB Admin 2 (Bootstrap 4), disimpan di `public/sbadmin`
- Blade Template

## Kebutuhan

- PHP 8.2 atau lebih baru (XAMPP)
- Composer
- MySQL dan phpMyAdmin (XAMPP)
- Koneksi internet (font dimuat dari Google Fonts)

## Cara Menjalankan

1. Masuk ke folder proyek dan pasang dependensi:

```
cd laravel-admin
composer install
copy .env.example .env
php artisan key:generate
```

Di Linux atau macOS, ganti `copy` dengan `cp`.

2. Nyalakan **Apache** dan **MySQL** di XAMPP, lalu buat database kosong bernama `laravel_admin` di phpMyAdmin.

3. Ubah pengaturan database di file `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_admin
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=file
CACHE_STORE=file
```

4. Buat tabel, isi data awal, dan jalankan server:

```
php artisan migrate:fresh --seed
php artisan serve
```

5. Buka `http://127.0.0.1:8000` di browser.

Template SB Admin 2 sudah disertakan di folder `public/sbadmin`. Jika folder itu belum ada, unduh template dari https://startbootstrap.com/theme/sb-admin-2 lalu salin folder `css`, `js`, `vendor`, dan `img` ke `public/sbadmin`.

## Daftar URL

| URL | Keterangan |
|---|---|
| `/` | Home |
| `/product` | Halaman Product |
| `/service` | Halaman Service |
| `/contact` | Halaman Contact |
| `/about` | Halaman About |
| `/admin` | Daftar admin |
| `/admin/create` | Form tambah admin |
| `/admin/{id}/edit` | Form ubah admin |

Operasi simpan, ubah, dan hapus memakai method `POST`, `PUT`, dan `DELETE` pada URL `/admin` dan `/admin/{id}`. Semua route CRUD dibuat dengan `Route::resource('admin', AdminController::class)`.

## Struktur Tabel

Tabel `admins`:

| Kolom | Tipe | Keterangan |
|---|---|---|
| `id_admin` | int, auto increment | Primary key |
| `username` | varchar(100) | Nama pengguna |
| `password` | varchar(100) | Password (hash bcrypt) |
| `created_at` | timestamp | Waktu dibuat |
| `updated_at` | timestamp | Waktu diubah |

## Data Awal (Seeder)

- 1 admin tetap: username `admin`, password `admin123`.
- 5 admin acak dari Faker, dengan password `password`.
- 10 user acak dari Faker pada tabel `users`.

## File Penting

```
app/
  Http/Controllers/
    DashboardController.php    # lima halaman template
    AdminController.php        # CRUD admin
  Models/Admin.php
database/
  migrations/                  # users, cache, jobs, admins
  seeders/
    DatabaseSeeder.php
    AdminSeeder.php
resources/views/
  layouts/app.blade.php        # layout utama
  partials/                    # sidebar, header, footer
  admin/                       # index, create, edit
  home, product, service, contact, about
routes/web.php
public/sbadmin/                # template SB Admin 2
```

## Catatan

- File `.env` tidak ikut repository, jadi harus dibuat dari `.env.example`.
- Password disimpan dalam bentuk hash (bcrypt), bukan teks biasa.
- Perintah `migrate:fresh` menghapus semua tabel di database `laravel_admin`, lalu membuatnya ulang.
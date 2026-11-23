# Apps-Student

Aplikasi latihan praktikum **Framework Laravel** untuk mengelola data **student** dan **admin**. Halaman CRUD Student hanya bisa diakses setelah login sebagai admin, dengan autentikasi berbasis session dan middleware. Dibuat dengan Laravel 12, PHP 8.2, dan MySQL (XAMPP).

**Disusun oleh:** Vito Ade Chrisnanta / 2513020056

## Fitur

- **Migration** untuk tabel `students` dan `admins`.
- **Model dan Controller** untuk Student, serta Model untuk Admin dan `AuthController` untuk login.
- **Factory dan Seeder** untuk mengisi data dummy (lebih dari 5 data per tabel).
- **Autentikasi (hal 33):** login, logout, dan restrict pages berdasarkan data pada tabel `admins`.
- **CRUD Student:** tambah, lihat, ubah, dan hapus data student, dengan validasi dan pesan notifikasi.

## Teknologi

- Laravel 12 dan PHP 8.2
- MySQL (XAMPP) dan phpMyAdmin
- Bootstrap 5 (dimuat dari CDN)
- Blade Template

## Kebutuhan

- PHP 8.2 atau lebih baru (XAMPP)
- Composer
- MySQL dan phpMyAdmin (XAMPP)
- Koneksi internet (Bootstrap dimuat dari CDN)

## Cara Menjalankan

1. Masuk ke folder proyek dan pasang dependensi:

```
cd Apps-Student
composer install
copy .env.example .env
php artisan key:generate
```

Di Linux atau macOS, ganti `copy` dengan `cp`.

2. Nyalakan **Apache** dan **MySQL** di XAMPP, lalu buat database kosong bernama `apps_student` di phpMyAdmin.

3. Ubah pengaturan database di file `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=apps_student
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=file
CACHE_STORE=file
```

4. Buat tabel, isi data dummy, dan jalankan server:

```
php artisan migrate:fresh --seed
php artisan serve
```

5. Buka `http://127.0.0.1:8000` di browser. Pengunjung yang belum login akan diarahkan ke halaman login.

## Akun Uji

| Username | Password |
|---|---|
| `admin` | `admin123` |

Lima admin lain dibuat acak oleh Factory dengan password `password`.

## Alur Autentikasi

1. Admin mengisi username dan password di halaman `/login`.
2. `AuthController` mencari admin pada tabel `admins`, lalu mencocokkan password dengan `Hash::check`.
3. Jika cocok, `admin_id` dan `admin_username` disimpan di session, lalu admin diarahkan ke `/students`.
4. Middleware `IsLogin` (alias `islogin`) memeriksa session pada setiap halaman Student. Jika belum login, pengunjung dialihkan ke `/login`.
5. Logout menghapus session dan mengarahkan kembali ke `/login`.

Contoh: membuka `/students` langsung tanpa login akan menampilkan halaman login, bukan data student.

## Daftar URL

| Method | URL | Keterangan | Login |
|---|---|---|---|
| GET | `/` | Diarahkan ke `/students` | Ya |
| GET | `/login` | Halaman login | Tidak |
| POST | `/login` | Proses login | Tidak |
| POST | `/logout` | Logout | Tidak |
| GET | `/students` | Daftar student | Ya |
| GET | `/students/create` | Form tambah student | Ya |
| POST | `/students` | Simpan student baru | Ya |
| GET | `/students/{id}/edit` | Form ubah student | Ya |
| PUT | `/students/{id}` | Simpan perubahan student | Ya |
| DELETE | `/students/{id}` | Hapus student | Ya |

## Struktur Tabel

Tabel `students`:

| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | bigint, auto increment | Primary key |
| `nim` | varchar(20) | Unik |
| `nama` | varchar(100) | Nama student |
| `jurusan` | varchar(100) | Jurusan |
| `alamat` | varchar(255) | Alamat |
| `created_at`, `updated_at` | timestamp | Waktu dibuat dan diubah |

Tabel `admins`:

| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | bigint, auto increment | Primary key |
| `username` | varchar(100) | Unik |
| `password` | varchar(255) | Password (hash bcrypt) |
| `created_at`, `updated_at` | timestamp | Waktu dibuat dan diubah |

## Data Dummy (Seeder dan Factory)

- 1 admin tetap (`admin` / `admin123`) dan 5 admin acak dari `AdminFactory`.
- 10 student acak dari `StudentFactory` (NIM, nama, jurusan, dan alamat dibuat dengan Faker).

## File Penting

```
app/
  Http/Controllers/
    AuthController.php         # login dan logout
    StudentController.php      # CRUD student
  Http/Middleware/IsLogin.php  # pembatas halaman
  Models/
    Student.php
    Admin.php
bootstrap/app.php              # alias middleware islogin
database/
  migrations/                  # students dan admins
  factories/                   # StudentFactory, AdminFactory
  seeders/DatabaseSeeder.php
resources/views/
  layouts/app.blade.php
  auth/login.blade.php
  students/                    # index, create, edit, _form
routes/web.php
```

## Catatan

- File `.env` tidak ikut repository, jadi harus dibuat dari `.env.example`.
- Password disimpan dalam bentuk hash (bcrypt), bukan teks biasa.
- Perintah `migrate:fresh` menghapus semua tabel di database `apps_student`, lalu membuatnya ulang.
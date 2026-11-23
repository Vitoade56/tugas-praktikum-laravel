#  tugas-praktikum-laravel

Kumpulan latihan praktikum **Framework Laravel** untuk mata kuliah Pemrograman Web (Sistem Informasi 2C). Seluruh latihan dibuat dengan Laravel 12, PHP 8.2, dan MySQL (XAMPP).

**Disusun oleh:** Vito Ade Chrisnanta / 2513020056

## Struktur Repository

| Folder | Isi |
|---|---|
| `mahasiswa-controller/` | Latihan awal: Controller dan Routing |
| `laravel-admin/` | Sistem Templating, CRUD, Migration dan Seeder |
| `Apps-Student/` | Autentikasi (login, logout, restrict pages) dan CRUD Student |

## Daftar Bab dan Fitur

| Bab | Folder | Hasil |
|---|---|---|
| Controller dan Routing | `mahasiswa-controller` | `/daftar/mahasiswa` menampilkan tabel mahasiswa, `/kalkulator/segitiga` menghitung luas segitiga lewat form |
| Sistem Templating (hal 12) | `laravel-admin` | Layout Blade (header, sidebar, content, footer) dengan template SB Admin 2, lima halaman: Home, Product, Service, Contact, About |
| Membuat CRUD (hal 19) | `laravel-admin` | CRUD tabel `admins` pada URL `/admin`, Model dan Controller dibuat lewat artisan |
| Tentang Migration (hal 27) | `laravel-admin` | Migration tabel `users` dan `admins`, seeder dengan Faker, `migrate:fresh --seed` |
| Membuat Autentikasi (hal 33) | `Apps-Student` | Migration `students` dan `admins`, Model, Factory, Seeder, login dan logout dengan session, middleware `IsLogin`, CRUD Student |

## Kebutuhan

- PHP 8.2 atau lebih baru (XAMPP)
- Composer
- MySQL dan phpMyAdmin (XAMPP)
- Git
- Koneksi internet (Bootstrap dan font dimuat dari CDN)

## Cara Menjalankan

Ambil repository ini:

```
git clone https://github.com/VinoAde57/praktikum-laravel.git
cd praktikum-laravel
```

Perintah `cd` pada setiap bagian di bawah dijalankan dari folder utama repository (`praktikum-laravel`).

### 1. Apps-Student (autentikasi dan CRUD Student)

```
cd Apps-Student
composer install
copy .env.example .env
php artisan key:generate
```

Di Linux atau macOS, ganti `copy` dengan `cp`.

1. Buat database kosong bernama `apps_student` di phpMyAdmin.
2. Ubah pengaturan di file `.env`:

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

3. Buat tabel dan isi data dummy, lalu jalankan server:

```
php artisan migrate:fresh --seed
php artisan serve
```

Buka `http://127.0.0.1:8000`.

### 2. laravel-admin (templating, CRUD, migration)

Langkahnya sama dengan Apps-Student, dengan database bernama `laravel_admin`:

```
cd laravel-admin
composer install
copy .env.example .env
php artisan key:generate
```

Ubah `DB_DATABASE=laravel_admin` di `.env` (pengaturan lainnya sama seperti di atas), buat database `laravel_admin` di phpMyAdmin, lalu:

```
php artisan migrate:fresh --seed
php artisan serve
```

Template SB Admin 2 disimpan di `public/sbadmin`. Jika folder itu belum ada, unduh template dari https://startbootstrap.com/theme/sb-admin-2 lalu salin folder `css`, `js`, `vendor`, dan `img` ke `public/sbadmin`.

### 3. mahasiswa-controller (Controller dan Routing)

```
cd mahasiswa-controller
composer install
copy .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
php artisan serve
```

Di Windows PowerShell, perintah `touch` dapat diganti dengan `New-Item database\database.sqlite -ItemType File`.

## Akun Uji

| Username | Password |
|---|---|
| `admin` | `admin123` |

Data admin lainnya dibuat acak oleh Factory dengan password `password`.

## Daftar URL

**Apps-Student**

| URL | Keterangan |
|---|---|
| `/login` | Halaman login admin |
| `/logout` (POST) | Logout |
| `/students` | Daftar student (harus login) |
| `/students/create` | Tambah student |
| `/students/{id}/edit` | Edit student |

**laravel-admin**

| URL | Keterangan |
|---|---|
| `/` | Home |
| `/product`, `/service`, `/contact`, `/about` | Halaman template |
| `/admin` | Data admin (CRUD) |

**mahasiswa-controller**

| URL | Keterangan |
|---|---|
| `/daftar/mahasiswa` | Daftar mahasiswa |
| `/kalkulator/segitiga` | Kalkulator luas segitiga |

## Aturan Commit

Setiap bab di-commit dengan pesan yang sesuai babnya, contohnya:

```
[ADD] sistem templating
[ADD] fitur Crud
[ADD] migration dan seeder
[ADD] autentikasi login logout dan CRUD student (Apps-Student)
```

## Catatan

- File `.env` tidak ikut repository, jadi harus dibuat dari `.env.example` di setiap proyek.
- Password disimpan dalam bentuk hash (bcrypt), bukan teks biasa.
- Perintah `migrate:fresh` menghapus semua tabel di database yang dipakai, lalu membuatnya ulang.

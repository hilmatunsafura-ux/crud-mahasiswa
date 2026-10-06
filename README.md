# CRUD Data Mahasiswa (Laravel 12)

Aplikasi CRUD sederhana untuk mengelola data mahasiswa.
Dibuat dengan Laravel 12, Tailwind CSS, dan MySQL.

## Fitur
- Tambah data mahasiswa
- Lihat daftar mahasiswa (dengan pencarian dan pagination)
- Edit data mahasiswa
- Hapus data mahasiswa

## Cara menjalankan
1. Clone repository ini
2. `composer install`
3. Salin `.env.example` menjadi `.env`, lalu atur koneksi database MySQL
4. `php artisan key:generate`
5. `php artisan migrate`
6. `php artisan serve`
7. Buka `http://127.0.0.1:8000/mahasiswa`

## Struktur data (tabel mahasiwa)
nama, tanggal_lahir, npm, prodi, jenis_kelamin, alamat

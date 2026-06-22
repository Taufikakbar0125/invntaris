# 📦 Sistem Inventaris Kantor

Sistem Inventaris Kantor adalah aplikasi berbasis web yang dirancang untuk mengelola aset, data pegawai, dan ruangan secara efisien. Aplikasi ini dibangun menggunakan **Laravel 12** dan **Filament v3** sebagai admin panel yang modern, responsif, dan mudah digunakan.

---

## ✨ Fitur Utama

- **📊 Dashboard Statistik Interaktif**:
  - Ringkasan total barang, pegawai, dan ruangan.
  - Statistik kondisi barang (Baik, Rusak Ringan, Rusak Berat) beserta indikator visual.
  - Persentase distribusi barang berdasarkan kategori.
- **🖥️ Manajemen Inventaris (CRUD)**:
  - Pencatatan barang lengkap dengan kode unik, nama, kategori, tanggal beli, harga perolehan, penanggung jawab, kondisi, dan lokasi.
  - Pencarian cepat dan filter berdasarkan kategori & kondisi.
- **👥 Manajemen Pegawai (CRUD)**:
  - Database pegawai lengkap dengan User ID, nama lengkap, dan jabatan.
  - Opsi pembuatan pegawai baru secara langsung (*inline*) saat menambah/mengedit inventaris.
- **🏢 Manajemen Ruangan (CRUD)**:
  - Pendataan ruangan/posisi penempatan barang.
  - Opsi penambahan ruangan baru secara langsung (*inline*) saat menambah/mengedit inventaris.
- **📥 Import Excel**:
  - Mengunggah file Excel (.xlsx) untuk menambahkan data inventaris dalam jumlah banyak sekaligus.
- **📤 Export Excel**:
  - Mengunduh data inventaris terpilih menjadi file Excel secara instan.

---

## 🛠️ Persyaratan Sistem

Pastikan perangkat Anda sudah terpasang:
- **PHP** `>= 8.2`
- **Composer** (untuk dependensi PHP)
- **Node.js & NPM** (untuk kompilasi aset front-end)
- Database (SQLite bawaan, atau MySQL/PostgreSQL)

---

## 🚀 Instalasi & Setup Cepat

Ikuti langkah-langkah berikut untuk menjalankan proyek ini secara lokal:

1. **Clone / Buka Direktori Proyek**:
   ```bash
   cd Sistem-Inventaris_local
   ```

2. **Jalankan Setup Otomatis**:
   Proyek ini dilengkapi dengan skrip setup terintegrasi. Cukup jalankan perintah berikut:
   ```bash
   composer run setup
   ```
   *Skrip ini akan otomatis:*
   - Mengunduh dependensi PHP (`composer install`).
   - Membuat file `.env` dari `.env.example` jika belum ada.
   - Membuat kunci aplikasi (`php artisan key:generate`).
   - Menjalankan migrasi database (`php artisan migrate --force`).
   - Mengunduh dependensi frontend (`npm install`) dan melakukan build aset (`npm run build`).

3. **Buat Akun Administrator**:
   Untuk masuk ke panel Filament, buat akun admin baru dengan perintah:
   ```bash
   php artisan make:filament-user
   ```
   Ikuti petunjuk di terminal untuk memasukkan nama, alamat email, dan kata sandi.

---

## 💻 Menjalankan Aplikasi

Jalankan perintah berikut untuk memulai server pengembangan secara bersamaan (Vite, Laravel Server, Queue, dan Logs):

```bash
composer run dev
```

Buka browser Anda dan akses aplikasi di:
- **Halaman Utama**: `http://localhost:8000`
- **Panel Admin / Dashboard**: `http://localhost:8000/admin`

---

## 📝 Format File Import Excel

Saat menggunakan fitur **Import Excel**, pastikan file `.xlsx` Anda memiliki baris header dengan nama kolom yang tepat sebagai berikut:

| kode_barang | nama_barang | kategori | tgl_pengadaan | harga_barang | penanggung_jawab | kondisi | lokasi |
| :--- | :--- | :--- | :--- | :--- | :--- | :--- | :--- |
| BRG001 | Laptop Asus | Elektronik | 2026-06-22 | 15000000 | USR-001 | Baik | Ruang IT |

*Catatan:*
- **kategori** harus bernilai salah satu dari: `Elektronik`, `Furniture`, `Kendaraan`, atau `ATK`.
- **tgl_pengadaan** dapat berformat tanggal Excel biasa atau string `YYYY-MM-DD`.
- **penanggung_jawab** diisi dengan ID Karyawan (contoh: `USR-001`).
- **kondisi** harus bernilai salah satu dari: `Baik`, `Rusak Ringan`, atau `Rusak Berat`.

---

## 📂 Struktur Folder Utama

- `app/Models/` — Model database (`Inventory.php`, `Employee.php`, `Room.php`).
- `app/Filament/Resources/` — Konfigurasi halaman dan form admin panel.
- `app/Filament/Widgets/` — Widget dashboard visual.
- `app/Imports/` — Logika pemrosesan file import Excel.
- `database/migrations/` — Skema database relasional.
- `routes/web.php` — Route aplikasi utama.

# 📚 Perfeelus - Sistem Informasi Perpustakaan (MVC Native)

**Perfeelus** adalah aplikasi web manajemen perpustakaan yang dibangun menggunakan **PHP Native** dengan konsep **Object-Oriented Programming (OOP)** dan arsitektur **MVC (Model-View-Controller)**.

Aplikasi ini dibuat untuk memenuhi tugas **Pemrograman Web Lanjut**, dengan fokus pada pembuatan kerangka kerja (framework) mini sendiri tanpa menggunakan framework populer, serta penerapan routing manual menggunakan `.htaccess` dan desain responsif (*Mobile First*).

---

## 🔥 Fitur Utama

1.  **Arsitektur MVC & Modular:** Pemisahan kode yang rapi antara Logika (Controller), Data (Model), dan Tampilan (View).
2.  **Routing App:** Implementasi *Pretty URL* (contoh: `/buku/detail/1`) menggunakan `.htaccess`.
3.  **CRUD Lengkap + AJAX:**
    * **Create:** Tambah data buku via Modal Pop-up.
    * **Read:** Menampilkan daftar dan detail buku.
    * **Update:** Edit data tanpa reload halaman menggunakan **jQuery AJAX**.
    * **Delete:** Hapus data dengan konfirmasi keamanan.
4.  **Sistem Pencarian:** Filter buku berdasarkan Judul atau Penulis.
5.  **Multi-Role Authentication:**
    * **Admin:** Akses penuh (CRUD, Login/Logout).
    * **User:** Akses terbatas (Hanya Read & Search).
6.  **Proteksi View:** Tombol Admin disembunyikan otomatis jika user biasa yang login.
7.  **Flasher:** Sistem notifikasi status (Berhasil/Gagal) menggunakan Session.

---

## 📸 Screenshots

| Halaman Utama (Home) | Daftar Buku (Admin) |
| :---: | :---: |
| ![img](https://github.com/Fathir4118/UAS_PEMROGRAMAN_WEB/blob/main/img/IMG-20260111-WA0017.jpg) | ![img](https://github.com/Fathir4118/UAS_PEMROGRAMAN_WEB/blob/main/img/IMG-20260111-WA0015.jpg) |

| Edit data | Login Page |
| :---: | :---: |
| ![img]() | ![img]() |

| tambah data | detail data |
| :---: | :---: |
| ![img](https://github.com/Fathir4118/UAS_PEMROGRAMAN_WEB/blob/main/img/IMG-20260111-WA0014.jpg) | ![img]() |

| database users | database buku |
| :---: | :---: |
| ![img]() | ![img]() |

---

## 📂 Struktur Folder

```text
perpustakaan/
├── app/                  # LOGIKA BACKEND
│   ├── config/           # Konfigurasi DB & Base URL
│   ├── controllers/      # Logika Alur (Penghubung View & Model)
│   ├── core/             # Framework Inti (Router, DB Wrapper)
│   ├── models/           # Logika Database (SQL)
│   └── views/            # Tampilan HTML
├── public/               # FRONTEND PUBLIC
│   ├── css/
│   ├── js/               # Script AJAX & Custom JS
│   ├── img/
│   └── index.php         # Entry Point
└── .htaccess             # Routing Rules
```

---

## 🧠 Penjelasan File Inti (Core System)

Bagian ini menjelaskan logika utama dari framework MVC yang digunakan dalam aplikasi ini:

### 1. `app/core/App.php` (The Router)
File ini adalah jantung aplikasi yang bertugas menangkap URL dari browser, memecahnya (*Parsing*) menjadi Array, lalu menentukan **Controller**, **Method**, dan **Parameter** mana yang harus dijalankan secara otomatis.
* **Contoh:** URL `/buku/ubah/5` akan memanggil Controller **Buku**, Method **ubah**, dengan ID **5**.

### 2. `app/core/Controller.php` (Base Controller)
Merupakan class induk yang diwarisi oleh semua Controller lain dalam aplikasi. Memiliki dua fungsi utama:
* **`view()`**: Digunakan untuk memanggil file tampilan di folder *views*.
* **`model()`**: Digunakan untuk menghubungkan logika database melalui class model yang spesifik.

### 3. `app/core/Database.php` (Database Wrapper)
Class khusus yang membungkus koneksi database menggunakan **PDO (PHP Data Object)**. 
* Menggunakan sistem **Prepared Statement** untuk mencegah serangan *SQL Injection*.
* Mengelola koneksi database agar tetap efisien dan dapat digunakan kembali di seluruh Model.

### 4. `app/core/Flasher.php`
Class statis yang menangani pesan notifikasi (*Flash Message*) menggunakan Session. Memberikan umpan balik instan kepada pengguna (seperti pesan "Data Berhasil Ditambahkan") setelah melakukan aksi tertentu.

### 5. `public/js/script.js` (AJAX Logic)
Menangani interaksi *frontend* tanpa perlu memuat ulang (*reload*) halaman. Pada fitur **Ubah Data**, script ini melakukan request JSON ke server untuk mengisi form Modal secara otomatis.

---

## 🚀 Cara Instalasi & Menjalankan

Ikuti langkah-langkah berikut untuk menjalankan aplikasi di lingkungan server lokal Anda:

### 1. Persiapan Folder
Letakkan folder project `perpustakaan` ke dalam direktori server lokal Anda:
* **XAMPP**: `C:\xampp\htdocs\perpustakaan`
* **Laragon**: `C:\laragon\www\perpustakaan`

### 2. Setup Database
Buka **phpMyAdmin** melalui browser (`http://localhost/phpmyadmin`), kemudian:
1. Buat database baru dengan nama **`db_perpustakaan`**.
2. Klik tab **SQL**, lalu salin dan jalankan kode berikut untuk membuat tabel:

```sql
-- Tabel Users untuk sistem login
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user'
);

-- Tabel Buku untuk manajemen data
CREATE TABLE buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(100) NOT NULL,
    penulis VARCHAR(100) NOT NULL,
    penerbit VARCHAR(100) NOT NULL,
    tahun INT(4) NOT NULL
);

-- Data Default (Login)
INSERT INTO users (username, password, role) VALUES 
('admin', 'admin123', 'admin'),
('user', 'user123', 'user');
phpmyadmin).
```

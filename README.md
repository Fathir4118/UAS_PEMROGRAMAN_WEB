# UAS_PEMROGRAMAN_WEB

# 📚 Perfeelus - Sistem Informasi Perpustakaan (MVC Native)

**Perfeelus** adalah aplikasi web manajemen perpustakaan sederhana yang dibangun menggunakan **PHP Native** dengan konsep **OOP** dan arsitektur **MVC (Model-View-Controller)**. Aplikasi ini dibuat tanpa menggunakan framework backend (seperti Laravel/CI) untuk mendemonstrasikan pemahaman mendalam tentang cara kerja framework, routing, dan manajemen database.

Aplikasi ini didesain **Responsive (Mobile First)** menggunakan Bootstrap 5 dan dilengkapi fitur keamanan role (Admin & User).

---

## 📸 Screenshots
*(Silakan ganti link gambar di bawah dengan screenshot aplikasi kamu sendiri)*

| Halaman Home | Daftar Buku (Admin) |
| :---: | :---: |
| ![Home Page](https://via.placeholder.com/400x200?text=Screenshot+Home) | ![List Buku](https://via.placeholder.com/400x200?text=Screenshot+Daftar+Buku) |

| Modal Tambah Data | Halaman Login |
| :---: | :---: |
| ![Modal Input](https://via.placeholder.com/400x200?text=Screenshot+Modal) | ![Login Page](https://via.placeholder.com/400x200?text=Screenshot+Login) |

---

## 🔥 Fitur Utama

### 1. Arsitektur MVC & Modular
* **Routing App:** Menggunakan `.htaccess` untuk memecah URL (Pretty URL) menjadi `Controller / Method / Parameter`.
* **OOP:** Semua logika dibungkus dalam Class dan Object.
* **Database Wrapper:** Menggunakan PDO dengan sistem *Prepared Statements* (Aman dari SQL Injection).

### 2. Manajemen Data (CRUD) & Fitur
* **Create:** Menambah data buku via Modal Pop-up.
* **Read:** Menampilkan daftar buku dan Detail buku.
* **Update:** Edit data menggunakan **AJAX (jQuery)** sehingga data tampil di modal tanpa reload halaman.
* **Delete:** H

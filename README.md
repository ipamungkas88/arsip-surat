<div align="center">

# 📄 Arsip Surat

**Aplikasi web sederhana untuk mengarsipkan dan mengelola surat resmi di lingkungan desa**

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.3+-777BB4?style=flat-square&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=flat-square&logo=mysql)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-4.0-06B6D4?style=flat-square&logo=tailwindcss)
![Vite](https://img.shields.io/badge/Vite-7.0-646CFF?style=flat-square&logo=vite)
![SweetAlert2](https://img.shields.io/badge/SweetAlert2-11.x-FF6B6B?style=flat-square)

</div>

---

## 🎯 Tujuan

Membantu digitalisasi dokumen surat agar lebih mudah dicari, aman, dan efisien dalam pengelolaan arsip kantor desa.

## ✨ Fitur Utama

-   📤 **Upload & manajemen surat** (PDF, max 10MB)
-   🔍 **Pencarian surat** secara real-time
-   👁️ **Preview & download PDF** langsung di aplikasi
-   🗂️ **CRUD kategori surat** dengan mudah
-   🔒 **Validasi & keamanan upload** file
-   📱 **Tampilan responsive** (desktop & mobile)

## 🚀 Cara Menjalankan

### 📋 **Langkah Instalasi**

1. **Clone repository**

    ```bash
    git clone https://github.com/ipamungkas88/arsip-surat.git
    cd arsip-surat
    ```

2. **Install dependencies**

    ```bash
    composer install
    npm install
    ```

3. **Setup environment**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Konfigurasi database**

    > Edit file `.env` dan sesuaikan pengaturan database Anda

5. **Migrasi & seed database**

    ```bash
    php artisan migrate
    php artisan db:seed
    ```

6. **Buat storage link**

    ```bash
    php artisan storage:link
    ```

7. **Jalankan aplikasi**

    ```bash
    npm run dev
    php artisan serve
    ```

    > Akses aplikasi di: http://localhost:8000

---

## 🖼️ Preview Aplikasi

### 🏠 Dashboard

_Halaman utama dengan daftar arsip dan fitur pencarian_

![Dashboard](public/images/image.png)

### 📤 Upload Surat

_Form upload dokumen dengan validasi lengkap_

![Upload](public/images/unggah.png)

### 👁️ Preview Surat

_Preview PDF dengan opsi download_

![Preview](public/images/lihat.png)

### ✏️ Edit Surat

_Halaman edit untuk memperbarui data surat_

![Edit](public/images/edit.png)

### 🗂️ Manajemen Kategori

_CRUD kategori untuk mengorganisir surat_

![Kategori](public/images/kategori.png)

**Tambah Kategori**
![Tambah Kategori](public/images/tambahkategori.png)

**Edit Kategori**
![Edit Kategori](public/images/editkategori.png)

### ℹ️ Halaman About

_Informasi aplikasi dan pengembang_

![About](public/images/about.png)

---

<div align="center">

**Dibuat dengan ❤️ menggunakan Laravel**

[![GitHub](https://img.shields.io/badge/GitHub-ipamungkas88-181717?style=flat-square&logo=github)](https://github.com/ipamungkas88)

</div>

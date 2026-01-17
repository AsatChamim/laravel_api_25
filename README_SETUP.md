# 🚀 Panduan Setup Laravel API

## ✅ Yang Sudah Diperbaiki

1. ✅ File `.env` sudah dibuat dengan konfigurasi lengkap
2. ✅ Script setup otomatis sudah disiapkan
3. ✅ Semua file konfigurasi sudah benar

## 📋 Langkah-langkah Setup (PENTING!)

### Opsi 1: Menggunakan File Batch (PALING MUDAH)

1. **Buka Command Prompt** (bukan PowerShell)
   - Tekan `Win + R`
   - Ketik `cmd` dan tekan Enter

2. **Masuk ke folder Laravel:**
   ```cmd
   cd "D:\05. SEM5\PB_Kerangka Kerja\laravel_api_25"
   ```

3. **Jalankan file setup:**
   ```cmd
   setup.bat
   ```
   
   File ini akan otomatis:
   - Install dependencies Composer
   - Generate application key
   - Cache configuration
   - Run database migrations
   - Start Laravel server

### Opsi 2: Manual Setup

Jika file batch tidak berfungsi, jalankan perintah berikut satu per satu:

```cmd
cd "D:\05. SEM5\PB_Kerangka Kerja\laravel_api_25"

REM 1. Install dependencies
composer install

REM 2. Generate application key
php artisan key:generate

REM 3. Cache configuration
php artisan config:cache

REM 4. Run migrations
php artisan migrate

REM 5. Start server
php artisan serve
```

### Opsi 3: Menggunakan PHP Script

```cmd
cd "D:\05. SEM5\PB_Kerangka Kerja\laravel_api_25"
php run_setup.php
```

## 🌐 Mengakses Aplikasi

Setelah server berjalan, akses:

- **Web:** http://localhost:8000
- **API Base URL:** http://localhost:8000/api/v1

## 📡 Endpoint API yang Tersedia

### Public Routes (Tidak perlu token)

```
POST   /api/v1/login          - Login user
POST   /api/v1/register        - Register user baru
GET    /api/v1/halo            - Test endpoint
```

### Protected Routes (Perlu token di header)

```
POST   /api/v1/logout         - Logout user
GET    /api/v1/user           - Get user info
```

### Resource Routes

```
GET    /api/v1/products              - List semua products
POST   /api/v1/products             - Create product baru
GET    /api/v1/products/{id}        - Get product by ID
PUT    /api/v1/products/{id}        - Update product
DELETE /api/v1/products/{id}       - Delete product

GET    /api/v1/vendors              - List semua vendors
POST   /api/v1/vendors              - Create vendor baru
GET    /api/v1/vendors/{id}         - Get vendor by ID
PUT    /api/v1/vendors/{id}         - Update vendor
DELETE /api/v1/vendors/{id}        - Delete vendor

GET    /api/v1/ProductVarian        - List semua product variants
POST   /api/v1/ProductVarian        - Create variant baru
GET    /api/v1/ProductVarian/{id}   - Get variant by ID
PUT    /api/v1/ProductVarian/{id}    - Update variant
DELETE /api/v1/ProductVarian/{id}    - Delete variant

GET    /api/v1/product_categorie    - List semua categories
POST   /api/v1/product_categorie    - Create category baru
GET    /api/v1/product_categorie/{id} - Get category by ID
PUT    /api/v1/product_categorie/{id} - Update category
DELETE /api/v1/product_categorie/{id} - Delete category
```

## 🔐 Cara Menggunakan Protected Routes

Setelah login, Anda akan mendapat token. Gunakan token tersebut di header:

```
Authorization: Bearer {your_token_here}
```

Contoh dengan cURL:
```bash
curl -H "Authorization: Bearer your_token_here" http://localhost:8000/api/v1/user
```

## 🗄️ Database

Aplikasi menggunakan **SQLite** database yang sudah dikonfigurasi di:
- File: `database/database.sqlite`
- Konfigurasi: `.env` (DB_CONNECTION=sqlite)

## ⚠️ Troubleshooting

### Error: "No application encryption key has been specified"
**Solusi:** Jalankan `php artisan key:generate`

### Error: "Class not found" atau "Composer autoload"
**Solusi:** Jalankan `composer install`

### Error: "SQLSTATE: database not found"
**Solusi:** Pastikan file `database/database.sqlite` ada, atau jalankan `php artisan migrate`

### Error: "Permission denied" pada storage
**Solusi:** Pastikan folder `storage` dan `bootstrap/cache` bisa ditulis

### Server tidak bisa dijalankan
**Solusi:** 
1. Pastikan port 8000 tidak digunakan aplikasi lain
2. Coba port lain: `php artisan serve --port=8001`

## 📝 File-file Penting

- `.env` - Konfigurasi aplikasi
- `setup.bat` - Script setup otomatis
- `start.bat` - Script untuk start server saja
- `run_setup.php` - PHP script untuk setup
- `CARA_JALANKAN.txt` - Panduan singkat

## 🎯 Quick Start

**Cara tercepat untuk menjalankan:**

1. Buka Command Prompt
2. Jalankan: `cd "D:\05. SEM5\PB_Kerangka Kerja\laravel_api_25" && setup.bat`

Selesai! Server akan otomatis berjalan di http://localhost:8000

---

**Selamat coding! 🎉**

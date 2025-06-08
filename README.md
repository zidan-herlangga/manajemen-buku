# 📚 Aplikasi Manajemen Buku - Laravel 10

Proyek ini dibuat untuk memenuhi tugas Web Programming 2 dengan menggunakan Laravel 10. Aplikasi ini mendemonstrasikan fitur **CRUD (Create, Read, Update, Delete)** dengan **relasi antar tabel** menggunakan `books` dan `categories`.

---

## 🔧 Fitur Aplikasi

- Autentikasi Login (Dummy / Database)
- CRUD Buku
- CRUD Kategori
- Relasi Buku ↔ Kategori
- Pencarian Buku berdasarkan Judul
- Filter Buku berdasarkan Kategori
- UI Modern dengan Bootstrap
- Halaman Welcome

---

## 📂 Struktur Tabel

### 📘 Tabel `books`
| Field       | Tipe Data    |
|-------------|--------------|
| id          | bigint       |
| category_id | foreign key  |
| title       | string       |
| author      | string       |
| year        | integer      |

### 🗂️ Tabel `categories`
| Field | Tipe Data |
|-------|-----------|
| id    | bigint    |
| name  | string    |

---

## 🔐 Akun Login Dummy

```txt
Username: admin
Password: admin
```

---

## Instalasi & Menjalankan

1. Clone Repository
```bash
git clone https://github.com/zidan-herlangga/manajemen-buku.git
cd manajemen-buku
```

2. Install Dependency
```bash
composer install
```

3. Copy File `.env`
```bash
cp .env.example .env
```

4. Generate Key
```bash
php artisan key:generate
```

5. Jalankan Server
```bash
php artisan serve
```

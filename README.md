# Rumah Sakit Bhayangkara Lemdiklat

Website informasi Rumah Sakit Bhayangkara Lemdiklat yang dilengkapi dengan Admin CMS untuk mengelola informasi dokter, jadwal pelayanan, unit/poli, serta galeri kegiatan rumah sakit.

## Tech Stack

- PHP 8.3
- CodeIgniter 4
- MySQL 8
- Bootstrap 5
- Bootstrap Icons
- Font Awesome
- HTML5
- CSS3
- JavaScript

## Features

### Public Website

- Beranda
- Jadwal Dokter
- Filter jadwal dokter berdasarkan poli dan hari
- Unit / Poli
- Detail Unit / Poli
- Galeri Kegiatan
- Detail kegiatan

### Admin CMS

- Admin Login & Logout
- Dashboard
- CRUD Dokter
- CRUD Jadwal Dokter
- CRUD Unit / Poli
- CRUD Galeri
- Upload foto kegiatan
- Status aktif / nonaktif
- Form validation
- CSRF protection
- Session-based authentication

## Database

Project menggunakan MySQL dengan struktur database:

```text
users
doctors
polyclinics
doctor_schedules
galleries
```

Relasi utama:

```text
Doctors
   │
   └── Doctor Schedules
             │
             └── Polyclinics
```

## Requirements

Pastikan environment sudah memiliki:

- PHP >= 8.1
- Composer
- MySQL
- Git

## Installation

### 1. Clone Repository

```bash
git clone https://github.com/ncsiqbal/rs-bhayangkara-lemdiklat.git
cd rs-bhayangkara-lemdiklat
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Setup Environment

Copy file environment:

```bash
cp env .env
```

Generate encryption key:

```bash
php spark key:generate
```

### 4. Setup Database

Buat database MySQL:

```sql
CREATE DATABASE rs_bhayangkara;
```

Kemudian buka file `.env` dan sesuaikan konfigurasi:

```env
database.default.hostname = localhost
database.default.database = rs_bhayangkara
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

### 5. Run Migration

```bash
php spark migrate
```

### 6. Seed Data

Untuk memasukkan data dokter, unit/poli, jadwal dokter, dan galeri:

```bash
php spark db:seed HospitalSeeder
```

Untuk membuat akun administrator:

```bash
php spark db:seed AdminSeeder
```

> `AdminSeeder` hanya perlu dijalankan pada database yang belum memiliki akun administrator tersebut.

### 7. Run Application

```bash
php spark serve
```

Website akan tersedia di:

```text
http://localhost:8080
```

Admin panel:

```text
http://localhost:8080/admin/login
```

## Admin Account

Akun administrator dibuat menggunakan:

```bash
php spark db:seed AdminSeeder
```

Credentials admin dapat dilihat pada:

```text
app/Database/Seeds/AdminSeeder.php
```

## Project Structure

```text
app/
├── Config/
│
├── Controllers/
│   ├── AdminAuth.php
│   ├── AdminDashboard.php
│   ├── AdminDoctors.php
│   ├── AdminDoctorSchedules.php
│   ├── AdminGalleries.php
│   ├── AdminPolyclinics.php
│   ├── Doctors.php
│   ├── Galleries.php
│   ├── Home.php
│   └── Polyclinics.php
│
├── Database/
│   ├── Migrations/
│   └── Seeds/
│
├── Models/
│   ├── Doctor.php
│   ├── DoctorSchedule.php
│   ├── Gallery.php
│   ├── Polyclinic.php
│   └── User.php
│
└── Views/
    ├── admin/
    ├── doctors/
    ├── galleries/
    ├── layouts/
    ├── polyclinics/
    └── home.php

public/
└── uploads/
    └── gallery/
```

## Security

Project menerapkan beberapa mekanisme keamanan dasar:

- Password hashing menggunakan PHP password hashing
- Session-based authentication
- CSRF protection
- Input validation
- File upload validation
- Admin role validation
- Environment configuration melalui `.env`

## Main Routes

### Public

| Method | Route | Description |
|---|---|---|
| GET | `/` | Beranda |
| GET | `/jadwal-dokter` | Jadwal dokter |
| GET | `/unit-poli` | Daftar unit / poli |
| GET | `/unit-poli/{id}` | Detail unit / poli |
| GET | `/galeri` | Galeri kegiatan |
| GET | `/galeri/{id}` | Detail kegiatan |

### Admin

| Method | Route | Description |
|---|---|---|
| GET | `/admin/login` | Admin login |
| GET | `/admin/dashboard` | Dashboard |
| GET | `/admin/doctors` | Kelola dokter |
| GET | `/admin/schedules` | Kelola jadwal |
| GET | `/admin/polyclinics` | Kelola unit / poli |
| GET | `/admin/galleries` | Kelola galeri |

## Architecture

Project menggunakan pendekatan **MVC (Model-View-Controller)** dari CodeIgniter 4.

```text
User
 │
 ▼
Routes
 │
 ▼
Controller
 │
 ├──── Model ──── Database
 │
 ▼
View
 │
 ▼
Browser
```

Admin CMS menggunakan controller dan view terpisah dari public website untuk menjaga struktur aplikasi tetap terorganisir.

## LIVE DEMO: 
https://rs-bhayangkara-lemdiklat-production.up.railway.app



## Development Notes

Project ini dibuat sebagai technical test untuk posisi IT di Rumah Sakit Bhayangkara Lemdiklat.

Fokus pengembangan:

- Database-driven website
- Admin Content Management System
- CRUD management
- Doctor schedule management
- Gallery management
- Responsive interface
- MVC architecture
- Basic web security

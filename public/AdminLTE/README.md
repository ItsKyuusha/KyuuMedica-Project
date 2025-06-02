# KyuuMedica - Appointment System in Hospital

KyuuMedica adalah sistem informasi penjadwalan janji temu (appointment system) di lingkungan rumah sakit atau klinik berbasis web. Sistem ini dibangun menggunakan Laravel 12 dan AdminLTE, dengan tujuan untuk memudahkan pengelolaan jadwal periksa pasien, data dokter, poli, serta catatan pemeriksaan.

## 📌 Fitur Utama

### 👤 Pasien
- Pendaftaran sebagai pasien baru
- Pendaftaran ke poli dengan memilih dokter dan melihat jadwal
- Mendapatkan nomor rekam medis otomatis

### 👨‍⚕️ Dokter
- Mengelola data pribadi
- Menentukan jadwal periksa
- Melihat daftar pasien yang akan diperiksa
- Memberikan catatan dan resep obat
- Menghitung biaya pemeriksaan

### 👨‍💼 Admin
- Manajemen data dokter, pasien, poli, dan obat
- Dashboard statistik

## ⚙️ Teknologi

- **Backend:** Laravel 12 (PHP)
- **Frontend:** AdminLTE (HTML, Bootstrap, JS)
- **Database:** MySQL
- **Authentication:** Laravel Auth Scaffolding

## 🧾 Database Schema

- **users:** menyimpan data user dan autentikasi
- **pasien:** data pasien, termasuk no_rm otomatis
- **poli:** daftar poli
- **dokter:** data dokter dan relasi ke poli
- **jadwal_periksa:** jadwal dokter
- **daftar_poli:** pendaftaran pasien ke jadwal
- **periksa:** data hasil periksa dan biaya
- **obat:** daftar obat
- **detail_periksa:** relasi obat dalam satu pemeriksaan

## 🔐 Role & Akses

| Role   | Akses                                                                 |
|--------|-----------------------------------------------------------------------|
| Admin  | CRUD Data Dokter, Pasien, Poli, Obat. Lihat Dashboard                 |
| Dokter | Lihat pasien, atur jadwal, input pemeriksaan dan catatan obat         |
| Pasien | Daftar sebagai pasien baru, daftar ke poli sesuai jadwal dokter      |

## 🏁 Cara Menjalankan Proyek

1. Clone repository
```bash
git clone https://github.com/username/kyuumedica.git
cd kyuumedica

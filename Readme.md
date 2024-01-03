## Proyek ATM Sederhana dengan Bootstrap, MySQL, dan PHP

Selamat datang di Repositori Proyek ATM Sederhana! Proyek ini sedang dalam pengembangan menggunakan Bootstrap, MySQL, dan PHP untuk menciptakan platform ATM dengan antarmuka web.

## Tentang Proyek

⚠️ **Status Proyek:** Selesai

Proyek ATM Sederhana ini telah selesai dikembangkan menggunakan Bootstrap, MySQL, dan PHP untuk menciptakan platform ATM dengan antarmuka web.

## Teknologi yang Digunakan

- **Frontend:** Bootstrap (HTML, CSS)
- **Backend:** PHP
- **Database:** MySQL

## Instalasi

1. Clone repositori ini ke direktori web server Anda.

   ```
   git clone https://github.com/fifovalle/atm-sederhana.git
   ```

2. Impor skema basis data dari folder `database` ke MySQL.

   ```
   mysql -u username -p nama_database < database/atm_sederhana.sql
   ```

3. Konfigurasi koneksi basis data. Edit file `config.php` di dalam direktori `includes` sesuai pengaturan MySQL.

   ```php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'username');
   define('DB_PASSWORD', 'password');
   define('DB_NAME', 'nama_database');
   ```

4. Buka aplikasi melalui web browser.

## Fitur yang Tersedia

- [x] Pendaftaran pengguna
- [x] Login pengguna
- [x] Penarikan tunai
- [x] Transfer antar akun
- [x] Menabung
- [x] Edit nasabah
- [x] Hapus nasabah
- [x] Grafik transaksi
- [x] Saldo awal
- [x] Jumlah uang yang dimiliki
- [x] Riwayat transaksi

## Hubungi Saya 📬

Jika Anda ingin berdiskusi, bekerja sama, atau sekadar berkenalan, hubungi saya melalui [email](mailto:fifanaufal10@gmail.com) atau [Whatsapp](https://wa.me/+6281223652490).

Terima kasih atas dukungan dan kunjungan Anda! 🌟

<div align="center">
  &copy; 2023 Naufal FIFA
</div>

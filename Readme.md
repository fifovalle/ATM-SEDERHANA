## Proyek ATM Sederhana dengan Bootstrap, MySQL, dan PHP

![Screenshot 2024-01-03 135817](https://github.com/fifovalle/ATM-SEDERHANA/assets/90078068/c231bbad-f090-404a-99bb-2c0075deaad0)
![Screenshot 2024-01-03 135823](https://github.com/fifovalle/ATM-SEDERHANA/assets/90078068/5690249a-89fb-46c0-a9e1-a0fca76467f1)
![Screenshot 2024-01-03 135935](https://github.com/fifovalle/ATM-SEDERHANA/assets/90078068/77c36a4d-6097-4bee-9056-658901d55590)
![Screenshot 2024-01-03 135838](https://github.com/fifovalle/ATM-SEDERHANA/assets/90078068/fead46d2-02e7-4ef5-ade1-8731edfe5367)
![Screenshot 2024-01-03 135942](https://github.com/fifovalle/ATM-SEDERHANA/assets/90078068/30fc4543-a79b-4a6f-8526-28ea85c40b1e)
![Screenshot 2024-01-03 135947](https://github.com/fifovalle/ATM-SEDERHANA/assets/90078068/a8a915d5-1be1-4ef1-adc1-56e9fbfc426a)

Selamat datang di Repositori Proyek ATM Sederhana! Proyek ini dibuat menggunakan Bootstrap, MySQL, dan PHP untuk menciptakan platform ATM dengan antarmuka web.

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

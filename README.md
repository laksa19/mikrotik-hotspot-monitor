# MIKROTIK HOTSPOT MONITOR
Mikrotik Hotspot Monitor untuk Mikrotik yang tidak support User Manager

## TENTANG  MIKROTIK HOTSPOT MONITOR

1. Aplikasi ini menggunakan dua koneksi ke Mikrotik
    - API port 8728 
      (routeros-api : https://wiki.mikrotik.com/wiki/API_PHP_class)
    - SSH port 2219 disarankan untuk mengganti port default ssh di Mikrotik Anda. 
      (SSH2 : http://phpseclib.sourceforge.net/ssh/intro.html)

2. Pastikan Jam dan Tanggal di Mikrotik sudah update sesuai wilayah masing-masing. Dan isi Rate Limit pada User Profile "default". Untuk pengaturan Jam dan Tanggal bisa baca di sini http://www.mikrotik.co.id/artikel_lihat.php?id=55

## FITUR  MIKROTIK HOTSPOT MONITOR

1. Menampilkan User Hotspot yang aktif dan masa aktifnya.
2. Membuat, edit dan hapus User Profile.
3. Menampilkan User Hotspot berdasarkan User Profile.
4. Menghapus User Hotspot berdasarkan Username.
5. Generate 1 Voucher.
6. Generate 21 Voucher.
7. Cetak Voucher. *Sebaiknya menggunakan kertas A4.

## PENGGUNAAN  MIKROTIK HOTSPOT MONITOR
1. Aplikasi ini bisa dijalankan menggunakan web server dengan PHP minimum versi 5.3.3. *Belum support PHP v7.

    Download web server :
    * Windows USBWebserver : www.usbwebserver.net/downloads/USBWebserver%20v8.6.zip
    * Android Web Server : 
      - https://play.google.com/store/apps/details?id=com.andi.serverweb&hl=en (berbayar)
      - https://m.allfreeapk.com/search.html?q=bit-web-server-php-mysql-pma (gratis)
      - https://play.google.com/store/apps/details?id=com.alfanla.android.pws (gratis, berbayar, berisi iklan)

2. Untuk pertama kali Anda perlu menyesuaikan konfigurasi pada laman setup, dengan login terlebih dahulu
   menggunakan akun default. 
   
   http://localhost/mikhmon/login.php atau http://localhost:8080/mikhmon/login.php
   
      - Username : admin 
      - Password : 1234
    
3. Selanjutnya test koneksi ke Mikrotik, klik tombol tes koneksi (<--->) yaitu tombol kedua dari kiri. Jika koneksi gagal, maka akan muncul notifikasi error (ciri-ciri koneksi gagal, laman dimuat lebih dari 30 detik). Kembali ke laman setup dan sesuaikan kembali konfigurasi Anda.

4. Beberapa video untuk panduan.

       https://drive.google.com/open?id=0B-nJrksLMgOzUXdFNlp2dVdXQkU
       https://www.youtube.com/watch?v=k-mbO-7Yuck
       https://www.youtube.com/watch?v=SyX5qRcNyj8
       https://www.youtube.com/watch?v=ob0uYW2wT9k

## Changelog 
03-10-2017

  1. Upload pertama.
  
04-10-2017

  1. Penyesuaian config.php
  2. Penyesuaian index.php
  3. Penambahan User Lists, sekarang menjadi 5
  4. Penyederhanaan pembuatan Profile
  5. Penambahan fitur pada generate voucher
       - Batasan Durasi (Limit Uptime)
       - Batasan Kuota (Limit Bytes Out)
  6. Penyesuaian cetak voucher

05-10-2017

  1. Penambahan setup.php untuk memudahkan edit file config.php
  2. Penambahan halaman login.
  3. Beberapa penyesuaian lainnya.

06-10-2017

   Menambahkan hak akses user :  1. Administrator,  2. Operator.

07-10-2017

   1. Menambahkan opsi untuk auto reload laman index (perubahan: index.php).
   2. Perbaikan dan penambahan setup aplikasi (perubahan : config.php, login.php, setup.php, conntest.php, resetconfig.php).

09-10-2017

   Perbaikan Setup (perubahan : index.php, setup.php).
   
10-10-2017

   Penambahan form untuk pengaturan warna di cetak voucher (Perubahan: printv.php, genvouchers.php, vcolorconf.php, vcolors.php).

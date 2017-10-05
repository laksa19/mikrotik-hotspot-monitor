# MIKROTIK HOTSPOT MONITOR
Mikrotik Hotspot Monitor untuk Mikrotik yang tidak support User Manager

## TENTANG  MIKROTIK HOTSPOT MONITOR

1. Aplikasi ini menggunakan dua koneksi ke mikrotik
    - API port 8728
    - SSH port 2219 [disarankan untuk mengganti port default ssh di Mikrotik Anda.]

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
1. Aplikasi ini bisa dijalankan menggunakan web server dengan PHP versi 5

    Download web server :
    * Windows USBWebserver : www.usbwebserver.net/downloads/USBWebserver%20v8.6.zip
    * Android Web Server : 
      - https://play.google.com/store/apps/details?id=com.andi.serverweb&hl=en (berbayar)
      - https://m.allfreeapk.com/search.html?q=bit-web-server-php-mysql-pma (gratis)
      - https://play.google.com/store/apps/details?id=com.alfanla.android.pws (gratis, berbayar, berisi iklan)

2. Untuk pertama kali Anda perlu menyesuaikan file config.php dengan Mikrotik Anda, pada bagian berikut
    - $iphost="111.111.111.111";    // ip Mikrotik
    - $sshport="2219";              // port ssh Mikrotik
    - $userhost="admin";            // username Mikrotik
    - $passwdhost="password";       // password Mikrotik
    
    sesuaikan yang ada dalam tanda kutip ( " " ).
3. Selanjutnya login dengan username dan password Mikrotik yang telah disesuaikan tadi.

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
  2. Perbaikan di file berikut 
       - index.php
       - genvoucher.php
       - genvouches.php
       - uprofileadd.php
       - uprofileset.php
       - printvs.php
       - vouchers.php


# mikrotik-hotspot-monitor
Mikrotik Hotspot Monitor untuk Mikrotik yang tidak support User Manager


I. Aplikasi ini menggunakan dua koneksi ke mikrotik
  1. API port 8728
  2. SSH port 2219 [disarankan untuk mengganti port default ssh di Mikrotik Anda.]

II. Pastikan Jam dan Tanggal di Mikrotik sudah update sesuai wilayah masing-masing. Dan isi Rate Limit pada User Profile "default"

III. Sesuaikan pengaturan di file config.php

Fitur:
1. Menampilkan User Hotspot yang aktif dan masa aktifnya.
2. Membuat, edit dan hapus User Profile.
3. Menampilkan User Hotspot berdasarkan User Profile.
4. Menghapus User Hotspot berdasarkan Username.
5. Generate 1 Voucher.
6. Generate 21 Voucher.
7. Cetak Voucher. *Sebaiknya menggunakan kertas A4.

Cek Update di : https://github.com/laksa19/mikrotik-hotspot-monitor

Aplikasi ini bisa dijalankan menggunakan web server dengan PHP versi 5

Download web server :
- Windows USBWebserver : www.usbwebserver.net/downloads/USBWebserver%20v8.6.zip
- Android Web Server : 
    1. https://play.google.com/store/apps/details?id=com.andi.serverweb&hl=en
    2. https://play.google.com/store/apps/details?id=com.alfanla.android.pws

Changelog :
  - 03-10-2017
      1. Upload pertama.
  - 04-10-2017
      1. Penyesuaian config.php
      2. Penyesuaian index.php
      3. Penambahan User Lists, sekarang menjadi 5
      4. Penyederhanaan pembuatan Profile
      5. Penambahan fitur pada generate voucher
	      1. Batasan Durasi (Limit Uptime)
	      2. Batasan Kuota (Limit Bytes Out)
      6. Penyesuaian cetak voucher

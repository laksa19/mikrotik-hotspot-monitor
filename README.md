# MIKROTIK HOTSPOT MONITOR (MIKHMON)
Mikrotik Hotspot Monitor adalah aplikasi web PHP untuk menggantikan User Manager yang tidak didukung dibeberapa tipe RB Mikrotik.

## TENTANG  

1. Aplikasi ini menggunakan port API untuk terhubung ke Mikrotik
    - API port 8728 
      ([routeros-api](https://wiki.mikrotik.com/wiki/API_PHP_class))

2. Pastikan port API sudah aktif dan Jam Tanggal di Mikrotik sudah update sesuai wilayah masing-masing. Untuk pengaturan Jam dan Tanggal bisa baca [di sini](http://www.mikrotik.co.id/artikel_lihat.php?id=55).

3. RouterOS yang didukung versi 6.3+

## FITUR  
1. Multi platform (Windows, GNU/Linux, Android)
2. Menampilkan User Hotspot yang aktif dan masa aktifnya.
3. Menambah, edit dan hapus User Profile.
4. Menampilkan daftar User Hotspot berdasarkan User Profile.
5. Menghapus User Hotspot berdasarkan Username.
6. Generate Voucher.
    - Generate Kode Voucher.
    - Generate User Password.
    - Generate Custom User Password.
    
    (Generate Kode Voucher/User Password maksimal 99 untuk sekali generate)
8. Cetak Voucher. (Ukuran kertas A4 atau F4)
9. Custom warna Voucher
10. Menghapus otomatis user hotspot expired.
10. Tools :
    - Add Remove DNS Static untuk blok website.
    - Log Hotspot Mikrotik.
    - History.
    - Status, untuk cek voucher dari sisi client.
    
## PENGGUNAAN  
1. Aplikasi ini bisa dijalankan menggunakan web server dengan PHP.

    Download web server :
    - Windows Web Server [USBWebserver](http://www.usbwebserver.net/downloads/USBWebserver%20v8.6.zip "USBWebserver")
    - Android Web Server [PlayStore Bit Web Server](https://play.google.com/store/apps/details?id=com.andi.serverweb&hl=en "Bit Web Server") (berbayar), [allfreeapk.com Bit Web Server](https://m.allfreeapk.com/search.html?q=bit-web-server-php-mysql-pma "Bit Web Server") (gratis)
    

2. Install Web Server

    Web Server Windows
    - Download USBWebserver, buat folder webserver di drive D:, extract USBWebserver ke folder tersebut.
    - Download Mikrotik Hotspot Monitor, extract folder mikhmon ke folder root webserver.
    - Jalankan USBWebserver kemudian buka di browser http://localhost:8080/mikhmon/
    
    Web Server Android
    - Download Bit Web Server, install di Android.
    - Download Mikrotik Hotspot Monitor, extract folder mikhmon ke folder www memory internal Android.
    - Jalankan Bit Web Server kemudian buka di browser http://localhost:8080/mikhmon/
    
3. Login dengan user admin Mikhmon (user: admin | pass:  1234).

4. Sesuaikan User Profile, nama usaha harga voucher di laman setup.

5. Tambahkan User Profile ke Mikrotik dari aplikasi Mikhmon. Seelah itu aplikasi siap untuk generate voucher.

    Tutorial lebih lengkap kunungi [laksa19.github.io](http://laksa19.github.io/)

6. Template hotspot.
     - Logo hotspot dapat diganti dengan format (logo.png) yang diletakkan di folder "img".
     - Edit file "paket-wifi.csv" untuk menampilkan daftar paket wifi.
     
7. Logo di cetak voucher di letakkan di folder img dalam folder app dengan format (logo.png).

## Changelog 

### Versi 2018

13-1-2018

1. Perbaikan Generate Voucher (Penambahan pilihan panajang Username). Untuk Kode Voucher 2x panjang Username.
2. Perubahan Setup Voucher Note menjadi DNS NAME. (Sesuaikan DNS Name di laman Setup).
3. Perbaikan Cetak Voucher.
4. Penambahan QR Code di cetak Voucher

10-1-2018

Perbaikan untuk dukungan login by mac. Setelah update Mikhmon, silahkan update user profile dari Mikhmon.

9-1-2018

1. Perubahan form user profile. Rate limit Upload/Downlod menjadi input manual. Bertujuan agar lebih leluasa membuat rate limit.
2. Perubahan Log Hotspot. Sekarang menampilkan log terbaru diuruan teratas.

1-7-2018

1. Penambahan Byte Out di laman Dashboard.
2. Penambahan 5 User Profile.
3. Penambahan Durasi dan Kuota masing-masing 5.
4. Penambahan Sisa Kuota di status dan logout template hotspot.

5-1-2018

1. Penambahan notifikasi update.
2. Perbaikan laman status.
3. Drop support mikhmon-standalone.

4-1-2018

Perbaikan cetak voucher (perbaikan detail voucher dan penambahan logo).

1-1-2018

Perbaikan laman status untuk cek voucher.

29-12-2017
    
   1. Full menggunakan RouterOS API (Tidak memerlukan koneksi SSH lagi).
   2. Perbaikan di generate voucher. (custom jumlah voucher 1-99 untuk sekali generate).
   3. Perbaikan di cetak voucher.
   4. Perbaikan Setup.
   5. Perbaikan laman dashboard.
   6. Perbaikan laman status (untuk cek masa aktif voucher)

### Versi 2017

16-12-2017

   1. Penambahan 5 profile, total 10 profile yang bisa digunakan untuk berbagai macam paket hotspot wifi.
   2. Penambahan kolom server hotspot ditiap form generate voucher, ini memungkinkan untuk membuat voucher atau user hotspot dengan batasan server hotspot. Jadi voucher hanya bisa digunakan di server hotspot tertentu. Catatan: Sesuaikan nama server  hotspot Mikrotik di laman setup mikhmon.
   3. Perbaikan tampilan desktop, kini dibuat lebih lebar untuk tampilan desktop dan menyesuakan layar saat digunakan di Android.
   4. Perubahan laman dashboard, Header tabel sisa voucher sekarang menggunakan nama profile, bertujuan untuk memudahkan admin mengenali sisa voucher.

29-11-2017

   Perbaikan form setup, konfirmasi pada saat reset config.

28-11-2017

   1. Penambahan form Log Hotspot.
   2. Penambahan form History Remove User, untuk melacak user yang telah dihapus.

26-11-2017

   1. Update setting warna voucher agar tetap menyimpan settingan sebelumnya.
   2. Penambahan cetak di setiap form generate 1 voucher.
   
21-11-2017

   1. Drop operator dan perbaikan resetconfig.
   2. Add Remove DNS Static untuk blok website.
   
10-11-2017

   Penambahan generate user password manual input. (Perubahan di mikhmon: index.php, genkv.php, genkvs.php, genupm.php, genvoucher.php, genvouchers.php, profileadd.php, profilerm.php, profileset.php, vcolorconf.php).

09-11-2017

   Perubahan struktur menu.

07-11-2017

   Perbaikan tamplate hotspot. Penjelasan dibagian [PENGGUNAAN](https://github.com/laksa19/mikrotik-hotspot-monitor#penggunaan) poin 6.

05-11-2017

   Penambahan laman status untuk cek masa aktif vouvher pelanggan. (Perubahan di status: index.php, api.php).

04-11-2017

   1. Penambahan fitur ganerate kode voucher, jadi pelanggan hanya memasukkan kode login saja untuk login. (Perubahan di mikhmon: index.php, file baru: genkv.php, genkvs.php, kvouchers.php, printkvs.php).
   2. Upload template hotspot untuk mendukung login menggunakan kode voucher.

28-10-2017

   1. Perbaikan di file setup.php.
   2. Penambahan jam Mikrotik, untuk mengetahui apakah jam di Mikrotik sudah sesuai. (Perubahan: index.php).

10-10-2017

   Penambahan form untuk pengaturan warna di cetak voucher (Perubahan: printv.php, genvouchers.php, vcolorconf.php, vcolors.php).

09-10-2017

   Perbaikan Setup (perubahan : index.php, setup.php).

07-10-2017

   1. Menambahkan opsi untuk auto reload laman index (perubahan: index.php).
   2. Perbaikan dan penambahan setup aplikasi (perubahan : config.php, login.php, setup.php, conntest.php, resetconfig.php).

06-10-2017

   Menambahkan hak akses user :  1. Administrator,  2. Operator.
   
05-10-2017

  1. Penambahan setup.php untuk memudahkan edit file config.php
  2. Penambahan halaman login.
  3. Beberapa penyesuaian lainnya.  
  
04-10-2017

  1. Penyesuaian config.php
  2. Penyesuaian index.php
  3. Penambahan User Lists, sekarang menjadi 5
  4. Penyederhanaan pembuatan Profile
  5. Penambahan fitur pada generate voucher
       - Batasan Durasi (Limit Uptime)
       - Batasan Kuota (Limit Bytes Out)
  6. Penyesuaian cetak voucher

03-10-2017

  1. Upload pertama.

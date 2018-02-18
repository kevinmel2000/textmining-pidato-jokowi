# Text Mining Pidato Presiden Joko Widodo Tahun 2017
Selamat datang di laman source code proyek pengumpulan dan penyarian data pidato Joko Widodo.

## Syarat
Agar dapat menggunakan source code ini, anda perlu software berikut terinstal di komputer:
1. PHP 5.4+
2. Rapidminer Studio 8.0

## Setup PHP
Dalam proyek ini digunakan scraper berbasis PHP. Scraper ini berfungsi mengambil teks pidato Joko Widodo yang terdapat di website resminya, www.setkab.go.id.
Scraper menggunakan library http/guzzle. Pastikan dependensinya.
Begitu selesai, jalankan di terminal dengan perintah php scraper.php. Hasilnya adalah satu file csv berisi pidato Joko Widodo.

## Setup Rapidminer
Begitu memperoleh data pidato Joko Widodo, Rapidminer digunakan untuk mengekstrak istilah yang sering dipakai.
Untuk menjalankan proses ini, pasang terlebih dulu ekstensi text mining pada rapidminer.
Kemudian, jalankan proses TermExtract terlebih dahulu, baru kemudian TermVisualize

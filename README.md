# WMH (Wifi Monitoring Hotspot)

[![Forks](https://img.shields.io/badge/forks-44-blue)](https://github.com/yandinovriandi/WMH)
[![Stars](https://img.shields.io/badge/stars-13-yellow)](https://github.com/yandinovriandi/WMH)


WMH (Wireless Monitoring Hotspot) adalah sebuah aplikasi berbasis web yang dibangun dengan menggunakan framework Laravel, Ajax, dan MikroTik API. Aplikasi ini dirancang untuk memonitor dan mengelola hotspot online, jumlah pengguna hotspot, dan juga pengguna PPPoE (Point-to-Point Protocol over Ethernet).

Dengan WMH, Anda dapat dengan mudah memantau keadaan hotspot yang sedang online. Aplikasi ini menyediakan informasi real-time tentang jumlah pengguna yang terhubung ke hotspot Anda. Anda dapat melihat jumlah pengguna aktif, informasi detail tentang setiap pengguna, dan juga status koneksi mereka.

Selain itu, WMH juga menyediakan fitur untuk memonitor pengguna PPPoE. Anda dapat melihat daftar pengguna PPPoE yang terdaftar dan melihat detail penggunaan mereka, seperti jumlah data yang dikonsumsi atau waktu koneksi mereka.

Selain fitur pemantauan, WMH juga memberikan kemampuan untuk melihat pendapatan yang dihasilkan dari layanan hotspot Anda. Aplikasi ini menghitung pendapatan berdasarkan jumlah pengguna, paket yang mereka beli, atau biaya yang ditetapkan untuk waktu penggunaan. Dengan informasi ini, Anda dapat menganalisis pendapatan Anda dan mengelola bisnis hotspot Anda dengan lebih efisien.

WMH menggunakan teknologi Ajax untuk memperbarui data secara real-time tanpa perlu me-refresh halaman. Ini memungkinkan Anda untuk melihat pembaruan data secara instan tanpa gangguan.

Secara keseluruhan, WMH memberikan kemudahan dan kemampuan untuk memonitor dan mengelola hotspot online, pengguna hotspot, pengguna PPPoE, dan melihat pendapatan dari layanan yang Anda tawarkan. Aplikasi ini dapat meningkatkan efisiensi dan pengelolaan bisnis hotspot Anda dengan memberikan informasi yang relevan dan real-time.
 
## Instalasi 
- clone repository 
```bash
git clone https://github.com/yandinovriandi/WMH.git wifi-management
```
```bash
cd wifi-management
```
```bash
composer i
```
```bash
cp .env.example .env
```
```bash
php artisan key:generate
```
```bash
composer i
```
```bash
php artisan migrate
```
Jika anda belum membuat database, maka anda akan otomatis di buatkan oleh laravel. cukup mengikuti perintah pada terminal anda.
```bash
php artisan serve
```
## Penggunaan

Sedang dalam persiapan.

## Kontribusi

Kami menyambut kontribusi dari komunitas. Jika Anda ingin berkontribusi, ikuti langkah-langkah berikut:

1. Fork repositori ini
2. Buat cabang baru (`git checkout -b nama-cabang`)
3. Lakukan perubahan pada cabang tersebut
4. Commit perubahan (`git commit -m "Deskripsi perubahan"`)
5. Push ke cabang Anda (`git push origin nama-cabang`)
6. Buka permintaan tarik (pull request) ke repositori ini

## Lisensi

Anda dapat merubah kode apapun tapi jangan hilangkan link repo kode ini berasal.

---
Dibuat oleh [yandi novriandi](https://github.com/yandinovriandi)

CARA MENJALANKAN PROJECT SIM DISTRIBUSI BANSOS

1. Persiapan Folder
Pindahkan folder project ini (misalnya bernama bansos) ke dalam direktori server lokal Anda:
  - Jika menggunakan Laragon: taruh di dalam folder C:\laragon\www\
  - Jika menggunakan XAMPP: taruh di dalam folder C:\xampp\htdocs\

2. Jalankan Server
Buka aplikasi Laragon atau XAMPP, kemudian jalankan (Start) layanan Apache dan MySQL.

3. Import Database
   - Buka pengelola database (seperti phpMyAdmin atau HeidiSQL).
   - Buat database baru dengan nama: bansos_db
   - Lakukan proses Import, lalu pilih file bansos_db.sql yang ada di dalam project ini. Tunggu sampai proses selesai.

4. Cek Koneksi Database
Buka file koneksi.php menggunakan teks editor (Notepad, VS Code, dll). Pastikan pengaturan koneksinya sudah sesuai dengan komputer Anda.
Contoh: mysqli_connect("localhost", "root", "", "bansos_db");
(Ubah port, username, atau password jika server lokal Anda menggunakan pengaturan yang berbeda).

5. Buka di Browser
Buka aplikasi browser (Chrome, Edge, dll), lalu ketikkan URL berikut di kolom pencarian:
http://localhost/bansos/
(Sesuaikan kata 'bansos' dengan nama folder project Anda).

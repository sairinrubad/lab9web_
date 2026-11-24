# Jawaban Analisis & Pertanyaan Pemahaman - Praktikum 9 PHP Modular

* **Nama:** Sairin Bin Rubad
* **NIM:** 312510134
* **Kelas:** I.25.2A

---

## Bagian D: Analisis Hasil Template Layout
1. **Bagian mana yang digunakan bersama oleh semua halaman?**
   Bagian struktur awal dokumen HTML (`<!DOCTYPE html>`, `<head>`, pemanggilan CSS), bagian `<header>`, menu navigasi `<nav>`, serta bagian penutup `<main>`, `<footer>`, dan penutup tag `</body></html>`.
2. **Apa yang terjadi jika teks navigasi diubah pada `header.php`?**
   Perubahan teks atau tautan navigasi pada `header.php` akan otomatis terbarui dan berlaku pada seluruh halaman yang menyertakan `header.php` (`home.php`, `profil.php`, `kontak.php`) tanpa perlu mengedit masing-masing file halaman.
3. **Mengapa konten halaman tidak diletakkan seluruhnya di `header.php`?**
   Karena setiap halaman memiliki isi/konten utama yang unik dan berbeda-beda. Jika diletakkan di `header.php`, seluruh halaman akan menampilkan isi yang sama sehingga menghilangkan fungsi utama pemisahan template dan konten.
4. **Apa manfaat menggunakan `require_once` dibanding menyalin kode header ke setiap halaman?**
   * Menghindari duplikasi kode (*DRY - Don't Repeat Yourself*).
   * Mempermudah pemeliharaan dan perubahan desain antarmuka secara terpusat.
   * Menjamin file template wajib tersedia (`require`) dan mencegah pemuatan ganda (`_once`) yang dapat memicu error deklarasi ulang.

---

## Bagian L: Pertanyaan Pemahaman
1. **Pengertian modularisasi program dan minimal tiga manfaatnya:**
   Modularisasi program adalah teknik memecah aplikasi menjadi bagian-bagian kecil (modul) yang terpisah berdasarkan fungsi atau tanggung jawab masing-masing.
   * **Manfaat 1 (Reusability):** Komponen seperti header, footer, koneksi database, dan helper function dapat digunakan ulang di banyak halaman.
   * **Manfaat 2 (Maintainability):** Perubahan atau perbaikan bug cukup dilakukan pada satu file modul terkait tanpa mengganggu keseluruhan sistem.
   * **Manfaat 3 (Kolaborasi Tim):** Pengembang dalam satu tim dapat mengerjakan modul yang berbeda secara paralel tanpa konflik kode pada satu file besar.

2. **Perbedaan `include` dan `require` ketika file yang dipanggil tidak ditemukan:**
   * `include` menghasilkan pesan peringatan (*E_WARNING*), tetapi eksekusi baris kode berikutnya tetap dilanjutkan.
   * `require` menghasilkan kesalahan fatal (*E_COMPILE_ERROR*), sehingga eksekusi skrip langsung dihentikan seketika.

3. **Mengapa `require_once` sesuai digunakan untuk memuat konfigurasi database?**
   Karena koneksi database adalah komponen kritis; jika file tidak ditemukan aplikasi harus berhenti (`require`). Selain itu, akhiran `_once` memastikan file konfigurasi hanya dimuat satu kali dalam satu siklus permintaan sehingga mencegah pembuatan koneksi ganda atau error deklarasi ulang variabel/konstanta.

4. **Perbedaan parameter, argumen, dan nilai `return` pada function:**
   * **Parameter:** Variabel penampung yang ditulis di dalam tanda kurung saat mendeklarasikan function.
   * **Argumen:** Nilai aktual yang dikirimkan ke dalam function saat function tersebut dipanggil.
   * **Nilai `return`:** Hasil keluaran yang dikembalikan oleh function kepada kode pemanggil agar dapat disimpan ke variabel, diolah kembali, atau digunakan dalam ekspresi logika.

5. **Mengapa header dan footer sebaiknya dipisahkan dari konten halaman?**
   Agar elemen antarmuka yang bersifat seragam di seluruh halaman cukup dikelola di satu tempat, konsistensi tampilan terjaga, ukuran file masing-masing halaman tetap ringkas, dan fokus kode halaman hanya pada logika serta konten spesifiknya.

6. **Fungsi `index.php` pada pola routing yang dipraktikkan:**
   `index.php` bertindak sebagai *Front Controller* (pintu masuk tunggal aplikasi) yang menerima permintaan URL, membaca parameter `page`, memvalidasi rute terhadap daftar *whitelist*, serta merangkai tampilan dari template (`header.php` & `footer.php`) dengan modul konten yang sesuai.

7. **Mengapa router sebaiknya menggunakan whitelist rute?**
   Untuk membatasi akses hanya pada halaman-halaman yang secara resmi didaftarkan dan diizinkan oleh aplikasi, sekaligus memudahkan pengelolaan respon halaman `404 Not Found` apabila pengguna mengakses rute yang tidak valid.

8. **Risiko jika input `page` langsung digabungkan menjadi path file yang di-`require`:**
   Membuka celah keamanan serius berupa **Path Traversal / Local File Inclusion (LFI)** (misalnya `?page=../../config/database` atau file sensitif sistem), di mana penyerang dapat memaksa server memuat atau mengeksekusi file sembarang yang tidak seharusnya diakses publik.

9. **Fungsi aturan `RewriteCond` dan `RewriteRule` pada `.htaccess`:**
   * `RewriteCond`: Menentukan syarat kondisi sebelum penulisan ulang URL dijalankan (misalnya `!-f` dan `!-d` memastikan permintaan bukan file fisik atau direktori fisik yang memang ada di server).
   * `RewriteRule`: Mendefinisikan pola pengalihan URL bersih (seperti `/user/list`) agar diteruskan secara internal ke `index.php?page=user/list`.

10. **Bagian aplikasi CRUD yang paling tepat dipindahkan ke `config`, `views`, `helpers`, dan `modules`:**
    * **`config/`:** Kredensial dan inisialisasi koneksi database (PDO/MySQLi) serta konstanta pengaturan aplikasi.
    * **`views/`:** Template layout bersama (`header.php`, `footer.php`), halaman statis/dashboard, serta halaman error (`404.php`).
    * **`helpers/`:** Fungsi-fungsi umum yang dipakai lintas modul seperti *output escaping* (`e()`), format mata uang/tanggal, validasi input, dan *flash message*.
    * **`modules/`:** Logika bisnis dan antarmuka spesifik per fitur CRUD (misalnya `modules/user/` berisi `list.php`, `add.php`, `edit.php`, dan `delete.php`).

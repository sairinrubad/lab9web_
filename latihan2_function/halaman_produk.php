<?php
require_once __DIR__ . '/helpers.php';
$harga = 250000;
$jumlah = 2;
$total = hitungTotal($harga, $jumlah);
$diskon = hitungDiskon($total, 15);
$deskripsi = "Laptop Lenovo ThinkPad X1 Carbon cocok untuk pemrograman web dan komputasi sehari-hari.";
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Halaman Produk - Function</title></head>
<body>
    <h2>Pengujian Function di Halaman Produk</h2>
    <p>Deskripsi Singkat: <?= e(ringkasTeks($deskripsi, 45)); ?></p>
    <p>Harga Satuan: <?= formatRupiah($harga); ?></p>
    <p>Total (<?= $jumlah; ?> unit): <?= formatRupiah($total); ?></p>
    <p>Diskon (15%): <?= formatRupiah($diskon); ?></p>
    <p>Total Bayar: <strong><?= formatRupiah($total - $diskon); ?></strong></p>
</body>
</html>

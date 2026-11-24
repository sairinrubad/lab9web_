<?php
require_once __DIR__ . '/helpers.php';
$email = "sairin.rubad@pelitabangsa.ac.id";
$nilai = 92;
$suhuC = 30;
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Halaman Akademik - Function</title></head>
<body>
    <h2>Pengujian Function di Halaman Akademik</h2>
    <p>Email Mahasiswa: <?= e($email); ?> (Status: <strong><?= validasiEmail($email) ? 'Valid' : 'Tidak Valid'; ?></strong>)</p>
    <p>Nilai Akhir: <?= $nilai; ?> &rarr; Predikat: <strong><?= tentukanStatusNilai($nilai); ?></strong></p>
    <p>Suhu Ruangan: <?= $suhuC; ?>&deg;C = <strong><?= konversiCelciusKeFahrenheit($suhuC); ?>&deg;F</strong></p>
</body>
</html>

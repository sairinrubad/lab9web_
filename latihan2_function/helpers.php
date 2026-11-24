<?php
function formatRupiah(float $angka): string {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function hitungDiskon(float $harga, float $persen = 10): float {
    return $harga * ($persen / 100);
}

function validasiEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function ringkasTeks(string $teks, int $batas = 50): string {
    if (strlen($teks) <= $batas) {
        return $teks;
    }
    return substr($teks, 0, $batas) . '...';
}

function konversiCelciusKeFahrenheit(float $c): float {
    return ($c * 9 / 5) + 32;
}

function tentukanStatusNilai(float $nilai): string {
    if ($nilai >= 85) return 'A (Sangat Baik)';
    if ($nilai >= 75) return 'B (Baik)';
    if ($nilai >= 60) return 'C (Cukup)';
    return 'D (Kurang)';
}

function hitungTotal(float $harga, int $jumlah): float {
    return $harga * $jumlah;
}

function e(string $nilai): string {
    return htmlspecialchars($nilai, ENT_QUOTES, 'UTF-8');
}
?>

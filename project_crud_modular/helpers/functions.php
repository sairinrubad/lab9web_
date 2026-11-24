<?php
function e(string $nilai): string {
    return htmlspecialchars($nilai, ENT_QUOTES, 'UTF-8');
}

function formatRupiah(float $angka): string {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function hitungDiskon(float $harga, float $persen = 10): float {
    return $harga * ($persen / 100);
}

function validasiEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function ringkasTeks(string $teks, int $batas = 60): string {
    if (strlen($teks) <= $batas) {
        return $teks;
    }
    return substr($teks, 0, $batas) . '...';
}

function setFlash(string $tipe, string $pesan): void {
    $_SESSION['flash'] = ['tipe' => $tipe, 'pesan' => $pesan];
}

function tampilkanFlash(): string {
    if (!isset($_SESSION['flash'])) return '';
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
    $warna = $flash['tipe'] === 'sukses' ? '#d4edda' : '#f8d7da';
    $teks  = $flash['tipe'] === 'sukses' ? '#155724' : '#721c24';
    return "<div style='padding:12px; margin-bottom:15px; border-radius:4px; background:$warna; color:$teks;'>"
         . e($flash['pesan']) . "</div>";
}

function isActive(string $route, string $currentPage): string {
    return $route === $currentPage ? 'active' : '';
}

function csrfToken(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(16));
    }
    return $_SESSION['csrf_token'];
}
?>

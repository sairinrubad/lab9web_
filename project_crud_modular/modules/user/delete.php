<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Metode tidak diizinkan. Penghapusan data wajib menggunakan POST.');
}

$id = (int)($_POST['id'] ?? 0);
$token = $_POST['csrf_token'] ?? '';

if (!hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
    setFlash('gagal', 'Token CSRF tidak valid!');
    header('Location: index.php?page=user/list');
    exit;
}

$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$id]);
setFlash('sukses', 'Data pengguna berhasil dihapus.');
header('Location: index.php?page=user/list');
exit;

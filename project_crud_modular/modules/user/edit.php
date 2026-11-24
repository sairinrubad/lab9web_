<?php
$id = (int)($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();

if (!$user) {
    setFlash('gagal', 'Data pengguna tidak ditemukan.');
    header('Location: index.php?page=user/list');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama  = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $nim   = trim($_POST['nim'] ?? '');
    $kelas = trim($_POST['kelas'] ?? '');

    if ($nama === '' || !validasiEmail($email)) {
        setFlash('gagal', 'Nama dan email valid wajib diisi.');
    } else {
        $upd = $pdo->prepare("UPDATE users SET nama = ?, email = ?, nim = ?, kelas = ? WHERE id = ?");
        $upd->execute([$nama, $email, $nim, $kelas, $id]);
        setFlash('sukses', 'Data pengguna berhasil diperbarui!');
        header('Location: index.php?page=user/list');
        exit;
    }
}
?>
<section>
    <h2>Edit Pengguna</h2>
    <form method="post" action="index.php?page=user/edit&id=<?= $id; ?>" class="form-box">
        <input type="hidden" name="csrf_token" value="<?= csrfToken(); ?>">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" value="<?= e($user['nama']); ?>" required>
        <label>Email</label>
        <input type="email" name="email" value="<?= e($user['email']); ?>" required>
        <label>NIM</label>
        <input type="text" name="nim" value="<?= e($user['nim']); ?>" required>
        <label>Kelas</label>
        <input type="text" name="kelas" value="<?= e($user['kelas']); ?>" required>
        <button type="submit" class="btn">Update</button>
        <a href="index.php?page=user/list" class="btn btn-secondary">Batal</a>
    </form>
</section>

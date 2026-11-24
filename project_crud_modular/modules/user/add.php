<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama  = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $nim   = trim($_POST['nim'] ?? '');
    $kelas = trim($_POST['kelas'] ?? '');

    if ($nama === '' || !validasiEmail($email) || $nim === '' || $kelas === '') {
        setFlash('gagal', 'Input tidak valid. Pastikan semua kolom terisi dan format email benar.');
    } else {
        $stmt = $pdo->prepare("INSERT INTO users (nama, email, nim, kelas) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nama, $email, $nim, $kelas]);
        setFlash('sukses', 'Data pengguna berhasil ditambahkan!');
        header('Location: index.php?page=user/list');
        exit;
    }
}
?>
<section>
    <h2>Tambah Pengguna</h2>
    <form method="post" action="index.php?page=user/add" class="form-box">
        <input type="hidden" name="csrf_token" value="<?= csrfToken(); ?>">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" required>
        <label>Email</label>
        <input type="email" name="email" required>
        <label>NIM</label>
        <input type="text" name="nim" required>
        <label>Kelas</label>
        <input type="text" name="kelas" required>
        <button type="submit" class="btn">Simpan</button>
        <a href="index.php?page=user/list" class="btn btn-secondary">Batal</a>
    </form>
</section>

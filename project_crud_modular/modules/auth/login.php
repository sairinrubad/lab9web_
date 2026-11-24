<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['user_login'] = 'Sairin Bin Rubad';
        setFlash('sukses', 'Login berhasil!');
        header('Location: index.php?page=user/list');
        exit;
    } else {
        setFlash('gagal', 'Username atau password salah (gunakan admin / admin123).');
    }
}
?>
<section>
    <h2>Login Aplikasi</h2>
    <form method="post" action="index.php?page=auth/login" class="form-box">
        <label>Username</label>
        <input type="text" name="username" placeholder="admin" required>
        <label>Password</label>
        <input type="password" name="password" placeholder="admin123" required>
        <button type="submit" class="btn">Masuk</button>
    </form>
</section>

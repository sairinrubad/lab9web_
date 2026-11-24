<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem CRUD PHP Modular - Sairin Bin Rubad</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Aplikasi CRUD PHP Modular</h1>
        <p>Mahasiswa: <strong>Sairin Bin Rubad</strong> | NIM: <strong>312510134</strong> | Kelas: <strong>I.25.2A</strong></p>
    </header>
    <nav>
        <a href="index.php?page=dashboard" class="<?= isActive('dashboard', $page ?? ''); ?>">Dashboard</a>
        <a href="index.php?page=user/list" class="<?= isActive('user/list', $page ?? ''); ?>">Data Pengguna</a>
        <a href="index.php?page=user/add" class="<?= isActive('user/add', $page ?? ''); ?>">Tambah Pengguna</a>
        <a href="index.php?page=about" class="<?= isActive('about', $page ?? ''); ?>">Tentang</a>
        <?php if (!empty($_SESSION['user_login'])): ?>
            <a href="index.php?page=auth/logout" style="margin-left:auto; color:#c0392b;">Logout (<?= e($_SESSION['user_login']); ?>)</a>
        <?php else: ?>
            <a href="index.php?page=auth/login" class="<?= isActive('auth/login', $page ?? ''); ?>" style="margin-left:auto;">Login</a>
        <?php endif; ?>
    </nav>
    <main>
    <?= tampilkanFlash(); ?>

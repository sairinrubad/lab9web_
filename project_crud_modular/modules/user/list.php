<?php
$stmt = $pdo->query("SELECT * FROM users ORDER BY id DESC");
$users = $stmt->fetchAll();
?>
<section>
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h2>Daftar Pengguna</h2>
        <a href="index.php?page=user/add" class="btn">+ Tambah Pengguna</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>NIM</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($users)): ?>
                <tr><td colspan="6" style="text-align:center;">Belum ada data pengguna.</td></tr>
            <?php else: ?>
                <?php foreach ($users as $i => $row): ?>
                <tr>
                    <td><?= $i + 1; ?></td>
                    <td><?= e($row['nama']); ?></td>
                    <td><?= e($row['email']); ?></td>
                    <td><?= e($row['nim']); ?></td>
                    <td><?= e($row['kelas']); ?></td>
                    <td>
                        <a href="index.php?page=user/edit&id=<?= (int)$row['id']; ?>">Edit</a> |
                        <form method="post" action="index.php?page=user/delete" style="display:inline;" onsubmit="return confirm('Yakin hapus data ini?');">
                            <input type="hidden" name="id" value="<?= (int)$row['id']; ?>">
                            <input type="hidden" name="csrf_token" value="<?= csrfToken(); ?>">
                            <button type="submit" class="btn-link-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</section>

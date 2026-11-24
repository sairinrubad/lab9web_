<?php
unset($_SESSION['user_login']);
setFlash('sukses', 'Anda telah berhasil logout.');
header('Location: index.php?page=dashboard');
exit;

<?php
session_start();

// Hapus semua variabel sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Arahkan ke halaman depan (index.php)
header("Location: ../index.php");
exit;
?>
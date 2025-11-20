<?php
session_start();
session_unset();  // Hapus semua data session
session_destroy(); // Hancurkan session

header("Location: index.php");

// Hapus semua session
session_unset();
session_destroy();

// Kembali ke halaman login
header("Location: login.php");
exit;
?>

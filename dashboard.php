<?php
session_start();

// Pastikan user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Commit 5 – Setup Awal
echo "<h2>--POLGAN MART--</h2>";
echo "<p>Selamat datang, " . $_SESSION['username'] . "!</p><hr>";

// Data produk (array)
$kode_barang = ["B1", "B2", "B3", "B4", "B5"];
$nama_barang = ["lembu", "kambing", "angsa", "bebek", "ayam"];
$harga_barang = [25000, 16000, 48000, 37000, 19000];
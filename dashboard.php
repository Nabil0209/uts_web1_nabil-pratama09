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

// Commit 6 – Logika Penjualan Random
$beli = [];
$jumlah = [];
$total = [];

for ($i = 0; $i < count($kode_barang); $i++) {
    // Random apakah barang dibeli (0 atau 1)
    $beli[$i] = rand(0, 1);
    if ($beli[$i] == 1) {
        $jumlah[$i] = rand(1, 5); // jumlah acak 1–5
        $total[$i] = $harga_barang[$i] * $jumlah[$i];
    } else {
        $jumlah[$i] = 0;
        $total[$i] = 0;
    }
}

// Commit 7 – Perhitungan Total
$grandtotal = 0;
echo "<h3>Daftar Pembelian:</h3>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Kode</th><th>Nama Barang</th><th>Harga</th><th>Jumlah</th><th>Total</th></tr>";

foreach ($kode_barang as $i => $kode) {
    if ($beli[$i] == 1) {
        echo "<tr>";
        echo "<td>$kode</td>";
        echo "<td>{$nama_barang[$i]}</td>";
        echo "<td>Rp" . number_format($harga_barang[$i], 0, ',', '.') . "</td>";
        echo "<td>{$jumlah[$i]}</td>";
        echo "<td>Rp" . number_format($total[$i], 0, ',', '.') . "</td>";
        echo "</tr>";
        $grandtotal += $total[$i];
    }
}
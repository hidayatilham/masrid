<?php
$host = 'localhost'; // Ubah dengan host Anda
$user = 'root';      // Ubah dengan username database Anda
$pass = '';          // Ubah dengan password database Anda
$db   = 'db_rpssaya'; // Ubah dengan nama database Anda

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Mengecek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

<?php
session_start();
require 'configdb.php'; // Memuat konfigurasi database

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'dosen') {
    header('Location: login.php');
    exit();
}

// Mendapatkan nama pengguna dari sesi
$nama = $_SESSION['nama'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dosen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            padding: 20px;
        }
        .navbar {
            background: #dc3545;
            color: #fff;
            padding: 10px;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }
        .navbar a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="#">Dashboard Dosen</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($nama); ?>!</h1>
        <p>This is the lecturer dashboard. You can manage courses, grades, and communicate with students here.</p>
    </div>
</body>
</html>

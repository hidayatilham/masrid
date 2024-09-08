<?php
session_start();
require 'configdb.php'; // Memuat konfigurasi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Query untuk memeriksa apakah username dan password valid
    $query = "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Menyimpan informasi user dalam session
        $_SESSION['id'] = $user['id'];
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirect berdasarkan role
        switch ($user['role']) {
            case 'admin':
                header('Location: admin_dashboard.php');
                break;
            case 'dosen':
                header('Location: dosen_dashboard.php');
                break;
            case 'mahasiswa':
                header('Location: mahasiswa_dashboard.php');
                break;
            default:
                echo "Role tidak dikenali.";
                break;
        }
        exit();
    } else {
        echo "Username atau password salah.";
    }
}

mysqli_close($koneksi);
?>

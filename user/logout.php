<?php
session_start(); // Memulai session

// Bersihkan variabel session
$_SESSION = array();

// Cek jika session menggunakan cookies
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Menghancurkan semua session
session_destroy();

// Redirect ke halaman login atau halaman utama setelah logout
header("Location: ../login-page/LoginUser.php"); // Sesuaikan dengan path file login Anda
exit();
?>
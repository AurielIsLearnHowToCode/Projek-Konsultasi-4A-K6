<?php
session_start(); // Memulai session di awal script
include "../service/database.php";

$loginfailed = "";

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Menggunakan prepared statements untuk mencegah SQL Injection
    $stmt = $db->prepare("SELECT * FROM guru WHERE nip=? AND password=?");
    $stmt->bind_param("ss", $username, $password); // 'ss' menunjukkan bahwa kedua parameter adalah string
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $_SESSION['loggedin'] = true; // Menyimpan status login di session
        $_SESSION['username'] = $username; // Menyimpan username di session jika diperlukan
        header("location: ../user/deadline.php");
        exit();
    } else {
        $loginfailed = "Akun tidak ditemukan";
    }

    $stmt->close();
    $db->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles/log.css">
</head>
<body>
    <div class="login-container">
        <h1>NUGAS</h1>
        <div class="user-icon"></div>
<form action="log.php" method="post">
    <input type="text" name="username" placeholder="NIP">
    <input type="password" name="password" placeholder="Password">
    <button type="submit" name="login">Login</button>
</form>

    </div>
</body>
</html>

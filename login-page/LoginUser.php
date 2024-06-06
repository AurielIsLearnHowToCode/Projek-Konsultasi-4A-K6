<?php
session_start(); // Memulai session di awal script
include "../service/database.php";

$loginfailed = "";

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Menggunakan prepared statements untuk mencegah SQL Injection
    $stmt = $db->prepare("SELECT * FROM siswa WHERE nis=? AND password=?");
    $stmt->bind_param("ss", $username, $password); // 'ss' menunjukkan bahwa kedua parameter adalah string
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $_SESSION['loggedin'] = true; // Menyimpan status login di session
        $_SESSION['username'] = $result['Nama']; // Menyimpan username di session jika diperlukan
        header("location: ../user/home.html");
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
    <title>Nugas: Platform for your assignment reminder</title>
    <link rel="stylesheet" href="styles/LoginUser.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">

</head>
<body>

    <div class="login-container">
        <img src="../Assets/nugas.png" alt="Logo NUGAS" style="width: 150px;"> 
        <div class="user-icon"><span class="ph--user-bold"></span></div>
        <P>User</P>
        <form action="LoginUser.php" method="post" class="inputan">
            <input type="text" name="username" placeholder="NIP">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>


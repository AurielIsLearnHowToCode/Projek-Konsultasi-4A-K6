<?php
    session_start();
    include "../service/database.php";
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header('Location: ../login-page/LoginGuru.php'); // Redirect ke halaman login jika tidak ada session login
        exit;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nugas: Input Tugas</title>
    <link rel="stylesheet" href="styles/input-event.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">
        
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="../Assets/nugas.png" alt="Logo NUGAS" style="width: 150px;">
        </div>
        <a href="homeguru.php">Dashboard</a>
        <a href="mapel.php">Mata Pelajaran</a>
        <a href="event.php">Event</a>
    </div>
    <form action="process-input-event.php" class="form-container" method="post">
        <textarea id="deskripsi" name="deskripsi" placeholder="Deskripsi event..."></textarea>
        <div class="button-container">
            <button type="submit" name="announcement" class="button-announcement">Announcement</button>
            <button type="submit" name="input_event" class="button-input-event">Input As Event</button>
        </div>
    </form>
</body>
</html>

<?php
session_start();
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../LoginSiswa/index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa</title>
    <link rel="stylesheet" href="deadline.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="nusag.png" alt="Logo NUGAS" style="width: 150px;">
        </div>
        <a href="../Dashboard/index.php">Dashboard</a>
        <a href="../Mapel/index.php">Mata Pelajaran</a>
        <a href="../Event/index.php">Event</a>
    </div>

    <div class="announcement">
        <div class="time">
            <a id="realtime-clock">12:00</a>
        </div>
        <a id="announcement-text">Important</a>
    </div>

    <div class="main-container">
        <div class="task-container today">
            <a>Due Today</a>
            <div id="tasks-today"></div>
        </div>

        <div class="task-container week">
            <a>Due This Week</a>
            <div id="tasks-week"></div>
        </div>

        <div class="task-container month">
            <a>Due This Month</a>
            <div id="tasks-month"></div>
        </div>
    </div>

    <div class="pengguna" onclick="togglePenggunaContent()">
    <span>Siswa</span>
    <div class="pengguna-content"></div>
    <div class="logout-content">
        <a href="logout.php">Logout</a>
    </div>
</div>
<div class="overlay" onclick="togglePenggunaContent()"></div>

    <script src="script.js"></script>
</body>
</html>

<?php
    session_start();
    include "../service/database.php";
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header('Location: ../login-page/LoginUser.php'); // Redirect ke halaman login jika tidak ada session login
        exit;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nugas: Dashboard Siswa</title>
    <link rel="stylesheet" href="styles/event.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">
    <script src="../Assets/clock.js"></script>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="../Assets/nugas.png" alt="Logo NUGAS" style="width: 150px;"> 
        </div>
        <a href="home.php">Dashboard</a>
        <a href="mapel.php">Mata Pelajaran</a>
        <a href="event.php">Event</a>
    </div>

    <div class="announcement">
        <div class="time">
            <a id="realtime-clock">12:00</a>
        </div>
        <marquee><a id="announcement-text">
            <?php
                $sql = "SELECT * FROM notifikasi WHERE Jenis = 'announcement'";
                $query = mysqli_query($db, $sql);
                while($result = mysqli_fetch_assoc($query)){
                    echo "------|  (".$result['created_at'].") ".$result['Pesan_Pemberitahuan']."  |------";
                }
            ?>
        </a></marquee>
    </div>

    <div class="content-box">
        <?php
            $sql = "SELECT * FROM notifikasi";
            $query = mysqli_query($db, $sql);
            while($result = mysqli_fetch_array($query)){
                echo "<div class='box'>";
                echo "<p>".$result['Pesan_Pemberitahuan']."</p>";
                echo "<p style='color: black;'>".$result['created_at']."</p>";
                echo "</div>";
            }
        ?>
        <div class="event-label">
            <span>Event</span>
            <div class="line"></div>
        </div>
        <div class="white-box"></div>
    </div>
</body>
</html>

<?php
session_start();
include "../service/database.php";
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../login-page/LoginUser.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa</title>
    <link rel="stylesheet" href="../user/styles/deadline1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="../Assets/clock.js"></script>
    <script src="../Assets/user-btn.js"></script>
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

    <div class="pengguna" onclick="togglePenggunaContent()">
        <span><?php echo $_SESSION['username'] ?></span>
        <div class="pengguna-content"></div>
        <div class="logout-content">
            <a href="logout.php">Logout</a>
        </div>
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

    <div class="main-container">
        <div class="task-container today">
            <a>Due Today</a>
            <div id="tasks-today">
                <?php
                    $sql = "SELECT kpm.Nama as 'mapel', t.Nama as 'deskripsi' FROM tugas as t join kp_mapel as kpm on t.ID_kp = kpm.ID_kp WHERE deadline BETWEEN DATE(NOW()) AND DATE_ADD(DATE(NOW()), INTERVAL 1 DAY);";
                    $query = mysqli_query($db, $sql);
                    while($result = mysqli_fetch_assoc($query)){
                        echo "<div class='matematika'>";
                        echo "<span>".$result['mapel']."</span>";
                        echo "<div id='matematikaContent'>";
                        echo "<span>".$result['deskripsi']."</span>";
                        echo "</div>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>

        <div class="task-container week">
            <a>Due This Week</a>
            <div id="tasks-week">
                <?php
                    $sql = "SELECT kpm.Nama as 'mapel', t.Nama as 'deskripsi' FROM tugas as t join kp_mapel as kpm on t.ID_kp = kpm.ID_kp WHERE deadline BETWEEN DATE(NOW()) AND DATE_ADD(DATE(NOW()), INTERVAL 7 DAY);";
                    $query = mysqli_query($db, $sql);
                    while($result = mysqli_fetch_assoc($query)){
                        echo "<div class='matematika'>";
                        echo "<span>".$result['mapel']."</span>";
                        echo "<div id='matematikaContent'>";
                        echo "<span>".$result['deskripsi']."</span>";
                        echo "</div>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>

        <div class="task-container month">
            <a>Due This Month</a>
            <div id="tasks-month">
                <?php
                    $sql = "SELECT kpm.Nama as 'mapel', t.Nama as 'deskripsi' FROM tugas as t join kp_mapel as kpm on t.ID_kp = kpm.ID_kp WHERE deadline BETWEEN DATE(NOW()) AND DATE_ADD(DATE(NOW()), INTERVAL 30 DAY);";
                    $query = mysqli_query($db, $sql);
                    while($result = mysqli_fetch_assoc($query)){
                        echo "<div class='matematika'>";
                        echo "<span>".$result['mapel']."</span>";
                        echo "<div id='matematikaContent'>";
                        echo "<span>".$result['deskripsi']."</span>";
                        echo "</div>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="overlay" onclick="togglePenggunaContent()"></div>
    <script src="styles/deadline.js"></script>
    <script src="../Assets/clock&announcement.js"></script>
</body>
</html>

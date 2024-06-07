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
    <title>Nugas: Deadline Tugas</title>
    <link rel="stylesheet" href="styles/deadline.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">
    <script src="styles/deadline.js"></script>
    <script src="../Assets/user-btn.js"></script>
    <script src="../Assets/clock.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
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


    <div class="today">
        <a>Due Today</a>
    </div>

    <div class="week">
        <a>Due This Week</a>
    </div>

    <div class="month">
        <a>Due This Month</a>
    </div>

    <div class="matematika" onclick="toggleMatematikaContent()">
        <span>Matematika</span>
        <div id="matematikaContent" class="matematika-content">
            <span>Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum</span>
        </div>
    </div>

    <div class="matematika2" onclick="toggleMatematikaContent2()">
        <span>Matematika</span>
        <div id="matematikaContent2" class="matematika2-content">
            <span>Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum</span>
        </div>
    </div>

    <div class="matematika3" onclick="toggleMatematikaContent3()">
        <span>Matematika</span>
        <div id="matematikaContent3" class="matematika3-content">
            <span>Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum</span>
        </div>
    </div>

    <div class="bindo" onclick="togglebindoContent()">
        <span>Bahasa Indonesia</span>
        <div id="bindoContent" class="bindo-content">
            <span>Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum</span>
        </div>
    </div>

    <div class="bindo2" onclick="togglebindo2Content()">
        <span>Bahasa Indonesia</span>
        <div id="bindo2Content" class="bindo2-content">
            <span>Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum</span>
        </div>
    </div>

    <div class="pengguna" onclick="togglePenggunaContent()">
        <span><?php echo $_SESSION['username'] ?></span>
        <div id="penggunaContent" class="pengguna-content">
        </div>
        <div class="logout-content">
            <a href="../login-page/logout.php">Logout</a>
        </div>
    </div>
    <div class="overlay"></div>


</body>
</html>
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
        <link rel="stylesheet" href="styles/dashboard.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
        <script src="../Assets/clock.js"></script>
        <script src="../Assets/user-btn.js"></script>
    </head>

    <body>
    <div class ="header">    
        <div class="navbar">
            <div class="logo">
                <img src="../Assets/nugas.png" alt="Logo NUGAS" style="width: 150px;"> 
            </div>

            <div class="menu">
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

            <div class ="icon">

            </div>
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
        
        <div class="board">
    <?php
        $sql = "SELECT count(*) as 'today' FROM tugas WHERE deadline BETWEEN DATE(NOW()) AND DATE_ADD(DATE(NOW()), INTERVAL 1 DAY);";
        $query = mysqli_query($db, $sql);
        $hasil = mysqli_fetch_array($query);
    ?>
        <div class="item-board">
            <?php echo "<h3>".$hasil['today']."</h3>"; ?>
            <p class="yellow">Due Today</p>
        </div>

    <?php
        $sql = "SELECT count(*) as 'week' FROM tugas WHERE deadline BETWEEN DATE(NOW()) AND DATE_ADD(DATE(NOW()), INTERVAL 7 DAY);";
        $query = mysqli_query($db, $sql);
        $hasil = mysqli_fetch_array($query);
    ?>
        <div class="item-board">
            <?php echo "<h3>".$hasil['week']."</h3>"; ?>
            <p class="green">Due This Week</p>
        </div>

    <?php
        $sql = "SELECT count(*) 'month' FROM tugas WHERE deadline BETWEEN DATE(NOW()) AND DATE_ADD(DATE(NOW()), INTERVAL 30 DAY);";
        $query = mysqli_query($db, $sql);
        $hasil = mysqli_fetch_array($query);
    ?>
        <div class="item-board">
            <?php echo "<h3>".$hasil['month']."</h3>"; ?>
            <p class="blue">Due This Month</p>
        </div>
    </div>
    
    <div class="button">
        <a href="deadline.php" class="btn-1">View All Tasks</a>
    </div>

    <div class="subcontainer">
        <div class="subjudul">
            <p>Mata Pelajaran</p>
            <p>Recap</p>
        </div>
    </div>
    
    <div class="maincontent">
        <div class="contentkiri">
            <div class="judulkiri">
                <h3>Senin</h3>
                <div class="button2">
                    <button class="btn-2">
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                    </div>
            </div>
            <div class="isikiri">
                <p>Fisika</p>
                <p>Bahasa Indonesia</p>
                <p>Matematika</p>
                <p>Sejarah</p>
                <p>Bahasa Jepang</p>
            </div>
        </div>
        <?php 
            $sql1 = "SELECT count(*) as 'jumlah' FROM tugas WHERE DATE(NOW()) < Deadline";
            $query1 = mysqli_query($db, $sql1);
            $completed = mysqli_fetch_array($query1);

            $sql12 = "SELECT count(*) as 'jumlah' FROM rekap AS r JOIN tugas as t ON r.ID_tugas = t.ID where r.Tugas_selesai = 'True' and DATE(NOW()) < Deadline";
            $query12 = mysqli_query($db, $sql12);
            $sum_com = mysqli_fetch_array($query12);

            $sql2 = "SELECT count(*) as 'jumlah' FROM tugas WHERE DATE(NOW()) > Deadline";
            $query2 = mysqli_query($db, $sql2);
            $missed = mysqli_fetch_array($query2);

            $sql22 = "SELECT count(*) as 'jumlah' FROM rekap AS r JOIN tugas as t ON r.ID_tugas = t.ID where r.Tugas_terlambat = 'True' and DATE(NOW()) > Deadline";
            $query22 = mysqli_query($db, $sql22);
            $sum_miss = mysqli_fetch_array($query22);
        ?>
        <div class="gap"></div>
        <div class="contentkanan">
            <div class="kananatas">
                <div class="isikananatas">
                    <h3>Completed Tasks</h3>
                    <p><?php echo $sum_com['jumlah']."/".$completed['jumlah'] ?></p>
                </div>
            </div>
            <div class="kananbawah">
                <div class="isikananbawah">
                    <h3>Missed Tasks</h3>
                    <p><?php echo $sum_miss['jumlah']."/".$missed['jumlah'] ?></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
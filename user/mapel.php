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
        <title>Dashboard Siswa</title>
        <link rel="stylesheet" href="styles/mapel.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="scriptkalender.js"></script>
        <script src="../Assets/clock&announcement.js"></script>
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
            
            <div class="username" onclick="togglePenggunaContent()">
                <span><?php echo $_SESSION['username'] ?></span>
                <div id="penggunaContent" class="pengguna-content">
                </div>
                <div class="logout-content">
                    <a href="../login-page/logout.php">Logout</a>
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
        <marquee><a id="announcement-text">IMPORTANT ANNOUNCEMENT</a></marquee>
    </div>

    <?php 
        $sql = "SELECT jadwal_kegiatan FROM kp_mapel GROUP BY jadwal_kegiatan ORDER BY Jadwal_Kegiatan DESC ";
        $query = mysqli_query($db, $sql);

        if ($query) {
            while($hari = mysqli_fetch_array($query)){
                echo "<div class='contentkiri'>";
                echo "<div class='judulkiri'>";
                echo "<h3>".$hari['jadwal_kegiatan']."</h3>";
                echo "</div>";

                echo "<div class='isikiri'>";
                $nested_sql = "SELECT Nama FROM kp_mapel WHERE jadwal_kegiatan = '".$hari['jadwal_kegiatan']."'";
                $nested_query = mysqli_query($db, $nested_sql);
                if ($nested_query) {
                    while($hasil = mysqli_fetch_array($nested_query)){
                        echo "<p>".$hasil['Nama']."</p>";
                    }
                } else {
                    echo "<p>Error in nested query: " . mysqli_error($db) . "</p>";
                }
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>Error in main query: " . mysqli_error($db) . "</p>";
        }
    ?>

    </body>
</html>

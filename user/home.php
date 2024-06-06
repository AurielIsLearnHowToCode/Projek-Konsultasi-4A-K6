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
        <link rel="stylesheet" href="styles/dashboarduser.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
        <script src="styles/clock&announcement.js"></script>
    </head>

    <body>
    <div class ="header">    
        <div class="navbar">
            <div class="logo">
                <img src="../Assets/nugas.png" alt="Logo NUGAS" style="width: 150px;"> 
            </div>

            <div class="menu">
                <a href="home.php">Dashboard</a>
                <a href="mapel.html">Mata Pelajaran</a>
                <a href="event.html">Event</a>
            </div>
            
            <div class="username">
                <a href="#"><?php echo $_SESSION['username'] ?></a>
            </div>

            <div class ="icon">

            </div>
        </div>
    </div>


        <div class="announcement">
            <div class="time">
                <a id="realtime-clock">12:00</a>
            </div>
            <h2>IMPORTANT ANNOUNCEMENT</h2>
        </div>
        
    <div class="board">
        <div class="item-board">
            <h3>2</h3>
            <p class="yellow">Due Today</p>
        </div>
        <div class="item-board">
            <h3>3</h3>
            <p class="green">Due This Week</p>
        </div>
        <div class="item-board">
            <h3>4</h3>
            <p class="blue">Due This Month</p>
        </div>
    </div>
    
    <div class="button">
        <button class="btn-1">View All Tasks</button>
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
        <div class="gap"></div>
        <div class="contentkanan">
            <div class="kananatas">
                <div class="isikananatas">
                    <h3>Completed Tasks</h3>
                    <p>2/4</p>
                </div>
            </div>
            <div class="kananbawah">
                <div class="isikananbawah">
                    <h3>Missed Tasks</h3>
                    <p>3</p>
                </div>
            </div>
        </div>
    </div>
        </body>


</html>
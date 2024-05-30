<?php
    include "../service/database.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PROKON: Dashboard Guru</title>
        <link rel="stylesheet" href="styles/dashboardguru.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="styles/scriptkalender.js"></script>
    </head>

    <body>
    <div class ="header">    
        <div class="navbar">
            <div class="logo">
                <img src="../Assets/nugas.png" alt="Logo NUGAS" style="width: 150px;"> 
            </div>

            <div class="menu">
                <a href="homeguru.php">Dashboard</a>
                <a href="mapel.html">Mata Pelajaran</a>
                <a href="event.html">Event</a>
            </div>
            
            <div class="username">
                <a href="#">Syafii</a>
            </div>

            <div class ="icon">

            </div>
        </div>
    </div>
        <div class="announcement">
            <div class="time">
                <p>12:00</p>
            </div>
            <h2>IMPORTANT ANNOUNCEMENT</h2>
        </div>
    

    <div class="board">
    <?php
        $sql = "SELECT count(*) as 'today' FROM tugas WHERE deadline BETWEEN DATE(NOW()) AND DATE_ADD(DATE(NOW()), INTERVAL 1 DAY);";
        $query = mysqli_query($db, $sql);
        $hasil = mysqli_fetch_array($query)
    ?>
        <div class="item-board">
            <?php echo "<h3>".$hasil['today']."</h3>"; ?>
            <p class="yellow">Due Today</p>
        </div>

    <?php
        $sql = "SELECT count(*) as 'week' FROM tugas WHERE deadline BETWEEN DATE(NOW()) AND DATE_ADD(DATE(NOW()), INTERVAL 7 DAY);";
        $query = mysqli_query($db, $sql);
        $hasil = mysqli_fetch_array($query)
    ?>
        <div class="item-board">
            <?php echo "<h3>".$hasil['week']."</h3>"; ?>
            <p class="green">Due This Week</p>
        </div>

    <?php
        $sql = "SELECT count(*) 'month' FROM tugas WHERE deadline BETWEEN DATE(NOW()) AND DATE_ADD(DATE(NOW()), INTERVAL 30 DAY);";
        $query = mysqli_query($db, $sql);
        $hasil = mysqli_fetch_array($query)
    ?>
        <div class="item-board">
            <?php echo "<h3>".$hasil['month']."</h3>"; ?>
            <p class="blue">Due This Month</p>
        </div>
    </div>
    
    <div class="button">
        <a href="deadline.php" class="btn-1">View All Tasks</a>
    </div>
    
    <div class="maincontent">
        <div class="contentkiri">
            <div class="isikiri">
                <a class="button" href="#">Input Tugas</a>
                <a class="button" href="#">Input Event</a>
            </div>
        </div>
        <div class="gap"></div>
        <div class="contentkanan">
            <div class="kananatas">
                <div class="calendar">
                    <div class="month">
                        <ul>
                            <li class="prev" onclick="prevMonth()">&#10094;</li>
                            <li class="next" onclick="nextMonth()">&#10095;</li>
                            <li id="month-year"></li>
                        </ul>
                    </div>
                    <ul class="weekdays">
                        <li>Mo</li>
                        <li>Tu</li>
                        <li>We</li>
                        <li>Th</li>
                        <li>Fr</li>
                        <li>Sa</li>
                        <li>Su</li>
                    </ul>
                    <ul class="days" id="days"></ul>
                </div>                
                
        </div>
    </div>
        </body>


</html>
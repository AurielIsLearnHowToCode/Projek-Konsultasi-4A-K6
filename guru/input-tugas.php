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
    <link rel="stylesheet" href="styles/input-tugas.css">
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
    <form action="process-input-tugas.php" class="form-container" method="post">
        <label for="matapelajaran"></label>
        <select name="mata-pelajaran" id="matpel">
            <option value="select">Pilih Mata Pelajaran</option>
            <?php
                $sql = "SELECT * FROM kp_mapel GROUP BY Nama ORDER BY Nama ASC";
                $query = mysqli_query($db, $sql);
                while($result = mysqli_fetch_array($query)){
                    echo "<option value='".$result['ID_kp']."'>".$result['Nama']."</option>";
                }
            ?>
        </select>
        <br>
        <textarea id="deskripsi" name="deskripsi" placeholder="Deskripsi tugas..."></textarea>
    
        
        <div class="center">
            <input type="checkbox" id="click">
            <label for="click" class="click">Input</label>
            <div class="content">
                <div class="header">
                    <h2>Apakah Anda Ingin Menambahkan Tugas?</h2>
                </div>
                <div class="buttons">
                    <div class="buttons-item">
                    <button type="submit" name="submit" class="yes-btn">Ya</button>
                    <label for="click" class="no-btn">Tidak</label>
                    </div>
                </div>
            </div>
        </div>
    </form>

    

</body>
</html>

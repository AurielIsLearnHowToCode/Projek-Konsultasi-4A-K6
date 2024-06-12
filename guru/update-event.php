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

    $id = $_GET['id'];
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
        <a href="eventguru.php">Event</a>
    </div>
    <form action="process-update-event.php" class="form-container" method="post">
        <?php
            $sql = "SELECT * FROM notifikasi WHERE id=".$id;
            $query = mysqli_query($db, $sql);
            $hasil = "";
            $jenis = "";
            while($result = mysqli_fetch_assoc($query)){
                $hasil = $result['Pesan_Pemberitahuan'];
                $jenis = $result['Jenis'];
            }
        ?>
        <input type="hidden" name='id' value='<?php echo $id ?>'>
        <textarea id="deskripsi" name="deskripsi" placeholder="Deskripsi event..." require><?php echo $hasil?></textarea>
        <div class="button-container">
            <button type="submit" id="announcementButton" name="announcement" class="button-announcement">Announcement</button>
            <button type="submit" id="eventButton" name="input_event" class="button-input-event">Input As Event</button>
        </div>
    </form>

    <script src="../Assets/notifikasitelegram.js"></script>
</body>
</html>

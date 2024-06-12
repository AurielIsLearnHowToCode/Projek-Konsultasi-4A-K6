<?php

include("../service/database.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_GET['id'])){

    // ambil data dari formulir
    $id = $_GET['id'];

    // buat query
    $sql = "DELETE FROM notifikasi WHERE ID = ".$id;
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: homeguru.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: eventguru.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}
?>
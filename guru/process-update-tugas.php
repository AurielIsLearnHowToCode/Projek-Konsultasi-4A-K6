<?php

include("../service/database.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['submit'])){

    // ambil data dari formulir
    $mpl = $_POST['mata-pelajaran'];
    $desk = $_POST['deskripsi'];
    $id = $_POST['id'];

    if(!($mpl == "select")){
        // buat query
        $sql = "UPDATE tugas SET ID_kp = '$mpl', Nama = '$desk' WHERE ID = ".$id;
        $query = mysqli_query($db, $sql);

        // apakah query simpan berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: deadlineguru.php?status=sukses');
        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
            header('Location: input-tugas.php?status=gagal');
        }
    }else{
        die("Error, mohon masukan data dengan benar");
    }


} else {
    die("Akses dilarang...");
}
?>
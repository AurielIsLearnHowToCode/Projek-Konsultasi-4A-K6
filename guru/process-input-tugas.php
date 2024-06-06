<?php

include("../service/database.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['submit'])){

    // ambil data dari formulir
    $mpl = $_POST['mata-pelajaran'];
    $desk = $_POST['deskripsi'];
    $id = uniqid(mt_rand(), true);

    if(!($mpl == "select")){
        // buat query
        $sql = "INSERT INTO tugas (ID, ID_kp, Nama, Tanggal_dibuat, Deadline) VALUE ('$id', '$mpl', '$desk', DATE(NOW()), DATE_ADD(DATE(NOW()), INTERVAL 7 DAY))";
        $query = mysqli_query($db, $sql);

        // apakah query simpan berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: homeguru.php?status=sukses');
        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
            header('Location: input-tugas.php?status=gagal');
        }
    }else{
        die("Tidak bisa, harus milih mata pelajaran apa yang harus dijadikan tugas");
    }


} else {
    die("Akses dilarang...");
}

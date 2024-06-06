<?php

include("../service/database.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['submit'])){

    // ambil data dari formulir
    $mpl = $_POST['mata-pelajaran'];
    $desk = $_POST['deskripsi'];

    // buat query
    $sql = "INSERT INTO tugas (NIS, Nama, Password, ID_kelas, No_telp) VALUE ('$nis', '$nama', '$password', '$kelas', '$noTelp')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: homeguru.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: input-tugas.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

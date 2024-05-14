<?php

include("back-end.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $kelas = $_POST['kelas'];
    $noTelp = $_POST['noTelp'];

    // buat query update
    $sql = "UPDATE siswa SET Nama='$nama', Password='$password', ID_kelas='$kelas', No_telp='$noTelp' WHERE NIS='$nis'";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: index.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...".mysqli_error($db));
    }


} else {
    die("Akses dilarang...");
}

?>
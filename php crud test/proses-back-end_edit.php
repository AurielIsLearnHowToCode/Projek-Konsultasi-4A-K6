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

    // Check if the referenced ID_kelas exists in the kelas table
    $sql_check_kelas = "SELECT * FROM kelas WHERE ID='$kelas'";
    $result_check_kelas = mysqli_query($db, $sql_check_kelas);

    if (mysqli_num_rows($result_check_kelas) > 0) {
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
    }else{
        die("Kelas ID tidak Valid.".$kelas);
    }

} else {
    die("Akses dilarang...");
}

?>
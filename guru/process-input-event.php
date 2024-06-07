<?php
    session_start();
    include("../service/database.php");

    // cek apakah tombol daftar sudah diklik atau blum?
    if(isset($_POST['announcement']) || isset($_POST['input_event'])){

        // ambil data dari formulir
        $desk = $_POST['deskripsi'];
        $jenis = "";
        $nip = $_SESSION['nip'];
        
        if(isset($_POST['announcement'])){
            $jenis = "announcement";
        }elseif(isset($_POST['input_event'])){
            $jenis = "event";
        }

        if(!(empty($desk))){
            // buat query
            $sql = "INSERT INTO notifikasi (ID, NIP, Pesan_Pemberitahuan, Jenis, created_at) VALUES ('', '$nip', '$desk', '$jenis', DATE(NOW()))";
            $query = mysqli_query($db, $sql);

            // apakah query simpan berhasil?
            if( $query ) {
                // kalau berhasil alihkan ke halaman index.php dengan status=sukses
                if(isset($_POST['announcement'])){
                    header('Location: homeguru.php?status=sukses');
                }elseif(isset($_POST['input_event'])){
                    header('Location: event.php?status=sukses');
                }
                
            } else {
                // kalau gagal alihkan ke halaman indek.php dengan status=gagal
                header('Location: input-event.php?status=gagal');
            }
        }else{
            echo "INSERT INTO notifikasi (ID, NIP, Pesan_Pemberitahuan, Jenis, created_at) VALUES ('', '".$_SESSION['nip']."', '".$desk."', '".$jenis."', DATE(NOW())";
            die("Error: berikan input dengan benar");
        }


    } else {
        die("Akses dilarang...");
    }
?>
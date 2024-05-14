<?php

    include("back-end.php");

    // kalau tidak ada id di query string
    if( !isset($_GET['id']) ){
        header('Location: index.php');
    }

    //ambil id dari query string
    $id = $_GET['id'];

    // buat query untuk ambil data dari database
    $sql = "SELECT * FROM siswa WHERE NIS=$id";
    $query = mysqli_query($db, $sql);
    $siswa = mysqli_fetch_assoc($query);

    // jika data yang di-edit tidak ditemukan
    if( mysqli_num_rows($query) < 1 ){
        die("data tidak ditemukan...");
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulir Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<body>
    <header>
        <h3>Formulir Pendaftaran Siswa Baru</h3>
    </header>

    <form action="proses-back-end_edit.php" method="POST">

        <fieldset>
        <input type="hidden" name="nis" placeholder="nis lengkap" value="<?php echo $siswa['NIS']?>"/>
        
        <p>
            <label for="nama">Nama: </label>
            <input type="text" name="nama" placeholder="nama lengkap" value="<?php echo $siswa['Nama']?>"/>
        </p>
        <p>
            <label for="password">Password: </label>
            <textarea name="password"><?php echo $siswa['Password']?></textarea>
        </p>
        <p>
            <label for="kelas">Kelas: </label>
            <?php $idKel = $siswa['ID_kelas']; ?>
            <select name="kelas">
                <?php include('back-end.php');
                    $sql = "SELECT * FROM kelas";
                    $query = mysqli_query($db, $sql);

                    while($kelas = mysqli_fetch_array($query)){
                        echo "<option <?php value=".$kelas['ID']."?> <?php echo ($idKel == $kelas[ID_kelas]) ? 'selected' : '' ?>".$kelas['Nama']."</option>";
                    }
                ?>
            </select>
        </p>
        <p>
            <label for="noTelp">Nomor Telpon: </label>
            <input type="number" name="noTelp" placeholder="nomor telepon" value="<?php echo $siswa['No_telp']?>"/>
        </p>
        <p>
            <input type="submit" value="Simpan" name="simpan" />
        </p>

        </fieldset>

    </form>

</body>
</html>
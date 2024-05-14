<!DOCTYPE html>
<html>
<head>
    <title>Formulir Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<body>
    <header>
        <h3>Formulir Pendaftaran Siswa Baru</h3>
    </header>

    <form action="proses-back-end.php" method="POST">

        <fieldset>
        <p>
            <label for="nis">NIS: </label>
            <input type="text" name="nis" placeholder="nis lengkap" />
        </p>
        <p>
            <label for="nama">Nama: </label>
            <input type="text" name="nama" placeholder="nama lengkap" />
        </p>
        <p>
            <label for="password">Password: </label>
            <textarea name="password"></textarea>
        </p>
        <p>
            <label for="kelas">Kelas: </label>
            <select name="kelas">
                <?php include('back-end.php');
                    $sql = "SELECT * FROM kelas";
                    $query = mysqli_query($db, $sql);

                    while($kelas = mysqli_fetch_array($query)){
                        echo "<option value=".$kelas['ID'].">".$kelas['Nama']."</option>";
                    }
                ?>
            </select>
        </p>
        <p>
            <label for="noTelp">Nomor Telpon: </label>
            <input type="number" name="noTelp" placeholder="nomor telepon" />
        </p>
        <p>
            <input type="submit" value="Daftar" name="daftar" />
        </p>

        </fieldset>

    </form>

</body>
</html>
<?php include("back-end.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>test CRUD</title>
</head>

<body>
    <header>
        <h3>PROKON Kel.6</h3>
    </header>

    <nav>
        <a href="new-data.php">[+] Tambah Baru</a>
    </nav>

    <br>

    <table border="1">
    <thead>
        <tr>
            <th>NIS</th>
            <th>ID Kelas</th>
            <th>Password</th>
            <th>Nama</th>
            <th>No Telepon</th>
            <th>Tindakan</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM siswa";
        $query = mysqli_query($db, $sql);

        while($siswa = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$siswa['NIS']."</td>";
            echo "<td>".$siswa['ID_kelas']."</td>";
            echo "<td>".$siswa['Password']."</td>";
            echo "<td>".$siswa['Nama']."</td>";
            echo "<td>".$siswa['No_telp']."</td>";

            echo "<td>";
            echo "<a href='edit-data.php?id=".$siswa['NIS']."'>Edit</a> | ";
            echo "<a href='delete-data.php?id=".$siswa['NIS']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>

    </body>
</html>
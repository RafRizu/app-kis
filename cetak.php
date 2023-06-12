<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("location:index.php");
    # code...
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak</title>
</head>
<body>
    <?php
    $nokartu = $_GET['nokartu'];
    $query = mysqli_query($conn,"select * from datakis where nokartu='$nokartu'");
    while ($d = mysqli_fetch_array($query)) {
        # code...
    
    ?>
    <table align="center" border="1">
        <tr>
            <td>No Kartu</td>
            <td><?php echo $d['nokartu'] ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?php echo $d['nama'] ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?php echo $d['alamat'] ?></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td><?php echo $d['tanggal'] ?></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td><?php echo $d['nik'] ?></td>
        </tr>
        <tr>
            <td>Tingkat Faskes</td>
            <td><?php echo $d['tingkat'] ?></td>
        </tr>
    </table>
    <?php } ?>
    <script>
        window.print();
    </script>
</body>
</html>
<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    # code...
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi KIS</title>
</head>
<body>
    <center><h3>KARTU INDONESIA SEHAT</h3></center>
    <hr>
    <table cellpadding="5">

        <?php
        $no_kartu = $_GET['no_kis'];
        $query = mysqli_query($conn,"select * from datakis where no_kis='$no_kartu'");
        while ($d = mysqli_fetch_array($query)) {
            # code...
        
        ?>
        <tr>
            <td>No. KIS</td>
            <td>:<?php echo $d['no_kis'] ?></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:<?php echo $d['nik'] ?></td>
        </tr>
        <tr>
            <td>Nama Peserta</td>
            <td>:<?php echo $d['nama'] ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:<?php echo $d['alamat'] ?></td>
        </tr>
        <tr>
            <td>Faskes</td>
            <td>:<?php echo $d['nama_faskes'] ?></td>
        </tr>
        <?php } ?>
    </table>
    <script>
        window.print();
    </script>
</body>
</html>
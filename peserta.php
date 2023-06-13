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
    <a href="index.php">Home</a><br>
    <a href="faskes.php">Data Faskes</a>
    
    <h3>Tambah Data Peserta</h3>
    <?php
    if (isset($_GET['pesan'])) {
        $pesan = $_GET['pesan'];
        if ($pesan == "gagal") {
            echo "Data Gagal";
            # code...
        }elseif($pesan == "input"){
            echo "Data Berhasil Diinput";
        }elseif($pesan == "edit"){
            echo "Data Berhasil Diedit";
        }elseif($pesan == "hapus"){
            echo "Data Berhasil Dihapus";
        }
        # code...
    }
    ?>
    <form action="aksi-tambah-peserta.php" method="post">
        <table>
            <tr>
                <td>NIK</td>
                <td><input type="text" name="nik" id="" required="required"></td>
            </tr>
            <tr>
                <td>Nama Peserta</td>
                <td><input type="text" name="nama" id="" required="required"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" id="" required="required"></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="tgl_lahir" id="" required="required"></td>
            </tr>
            <tr>
                <td><input type="submit" onclick="return confirm('Yakin Tambah?')" value="Simpan"></td>
            </tr>
        </table>
    </form>
    <h3>Data Peserta</h3>
    <table border="1" cellpadding="10">
        <tr>
            <td>No.</td>
            <td>NIK</td>
            <td>Nama Peserta</td>
            <td>Alamat</td>
            <td>Tanggal Lahir</td>
            <td>Aksi</td>
        </tr>
        <?php 
        $no = 1;
        $query = mysqli_query($conn,"select * from peserta");
        
        while ($d = mysqli_fetch_array($query)) {
            # code...
        
        ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $d['nik'] ?></td>
            <td><?php echo $d['nama'] ?></td>
            <td><?php echo $d['alamat'] ?></td>
            <td><?php echo $d['tgl_lahir'] ?></td>
            <td>
                <a href="edit-peserta.php?nik=<?php echo $d['nik'] ?>">Edit</a>|
                |<a href="hapus-peserta.php?nik=<?php echo $d['nik'] ?>" onclick="return confirm('Yakin Hapus')">Hapus</a>

            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
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
    <a href="peserta.php">Data Peserta</a><br>
    <a href="peserta.php">Tambah Peserta</a>
    
    <h3>Edit Data Faskes</h3>
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
    <form action="aksi-edit-faskes.php" method="post">
        <table>
            <?php
                $id_faskes = $_GET['id_faskes'];
                $qedit = mysqli_query($conn,"select * from faskes where id_faskes = '$id_faskes'");
                while ($ed = mysqli_fetch_array($qedit)) {
            
            ?>
            <input type="hidden" value="<?php echo $ed['id_faskes'] ?>" name="id_faskes">
            <tr>
                <td>Nama Faskes</td>
                <td><input type="text" name="nama_faskes" value="<?php echo $ed['nama_faskes'] ?>"  id="" required="required"></td>
            </tr>
            <tr>
                <td>Tingkat</td>
                <td>
                    <select name="tingkat" id="" required="required">
                        <option  value="<?php echo $ed['tingkat'] ?>"><?php echo $ed['tingkat'] ?></option>
                        <option value="<?php echo $ed['tingkat'] ?>">------</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" onclick="return confirm('Yakin Edit?')" value="Simpan"></td>
            </tr>
        </table>
        <?php } ?>
    </form>
    <h3>Data Faskes</h3>
    <table border="1" cellpadding="10">
        <tr>
            <td>No.</td>
            <td>Nama Faskes</td>
            <td>Tingkat</td>
            <td>Aksi</td>
        </tr>
        <?php 
        $no = 1;
        $query = mysqli_query($conn,"select * from faskes");
        
        while ($d = mysqli_fetch_array($query)) {
            # code...
        
        ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $d['nama_faskes'] ?></td>
            <td><?php echo $d['tingkat'] ?></td>
            <td>
                <a href="edit-faskes.php?id_faskes=<?php echo $d['id_faskes'] ?>">Edit</a>|
                |<a href="hapus-faskes.php?id_faskes=<?php echo $d['id_faskes'] ?>" onclick="return confirm('Yakin Hapus')">Hapus</a>

            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
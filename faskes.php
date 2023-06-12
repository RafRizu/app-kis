<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Faskes</title>
</head>
<body>
    <form action="aksi-tambah-faskes.php" method="post">
        <?php 
            if (isset($_GET['pesan'])) {
                $pesan = $_GET['pesan'];
                if ($pesan == "input") {
                    echo "Data Berhasil Diinput";
                    # code...
                }elseif($pesan == "edit"){
                    echo "Data Berhasil Diedit";
                }elseif($pesan == "hapus"){
                    echo "Data Berhasil Dihapus";
                }else{
                    echo "Data Gagal";
                }
                # code...
            }
        ?>

        <table>
            <?php
            $maxquery = mysqli_query($conn,"select max(idfaskes) as kodeTerbesar from faskes");
            $maxdata = mysqli_fetch_array($maxquery);
            $maxvalue = $maxdata['kodeTerbesar'];
            $maxvalue++;
            ?>
            <tr>
                <td>ID Faskes</td>
                <td><input type="text" name="idfaskes" value="<?php echo $maxvalue; ?>" id="" required="required" readonly></td>
            </tr>
            <tr>
                <td>Nama Faskes</td>
                <td><input type="text" name="namafaskes" id="" required="required"></td>
            </tr>
            <tr>
                <td>Tingkat Faskes</td>
                <td>
                    <select name="tingkat" id="" required="required">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Simpan"></td>
                <td><input type="reset" value="Reset"></td>
                <td><a href="dashboard.php">Dashboard</a></td>
            </tr>
        </table>
    </form>



<br>
<hr>
<br>
<?php

?>
        <form action="faskes.php" method="get">
            <input type="text" name="cari" id="">
            <select name="berdasarkan" id="">
                <option value="namafaskes">Nama</option>
                <option value="idfaskes">ID</option>
            </select>
            <input type="submit" value="cari">
        </form><br>
<table border="1">
    <tr>
        <td>ID Faskes</td>
        <td>Nama Faskes</td>
        <td>Tingkat</td>
        <td>Aksi</td>
    </tr>

<?php
$halaman = 10;
$page = isset($_GET['halaman'])?(int)$_GET['halaman']:1;
$mulai = ($page>1)?($page*$halaman)-$halaman:0;
$hasil = mysqli_query($conn,"select * from faskes");
$total = mysqli_num_rows($hasil);
$pages = ceil($total/$halaman);


if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    $berdasarkan = $_GET['berdasarkan'];
    $query = mysqli_query($conn,"select * from faskes where ".$berdasarkan." like '%".$cari."%' limit $mulai, $halaman ");
    $cek = mysqli_num_rows($query);
    if ($cek = 0) {
        echo "data tidak ada";
        $query = mysqli_query($conn,"select * from faskes limit $mulai, $halaman");
        # code...
    }
    # code...
}else{
    $query = mysqli_query($conn,"select * from faskes limit $mulai, $halaman");
}

while($data = mysqli_fetch_array($query)){


?>


    <tr>

        <td><?php echo $data['idfaskes']; ?></td>
        <td><?php echo $data['namafaskes']; ?></td>
        <td><?php echo $data['tingkat']; ?></td>
        <td>
            <a href="edit-faskes.php?idfaskes=<?php echo $data['idfaskes'];?>">edit</a>
            <a href="hapus-faskes.php?idfaskes=<?php echo $data['idfaskes'];?>" onclick="return confirm('Yakin Hapus?')">hapus</a>
            
        </td>
    </tr>
    <?php
}
?>
</table>

<div>
    <?php for($i = 1; $i <= $pages; $i++ ){ ?>
    <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
    <?php } ?>
</div>



</body>
</html>
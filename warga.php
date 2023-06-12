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
    <form action="aksi-tambah-warga.php" method="post">
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
            $maxquery = mysqli_query($conn,"select max(nik) as kodeTerbesar from warga");
            $maxdata = mysqli_fetch_array($maxquery);
            $maxvalue = $maxdata['kodeTerbesar'];
            $maxvalue++;
            ?>
            <tr>
                <td>NIK</td>
                <td><input type="text" name="nik" value="<?php echo $maxvalue; ?>" id="" required="required" readonly></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" id="" required="required"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" id="" cols="20" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="ttl" id="" required="required"></td>
            </tr>
            <tr>
                <td>JK</td>
                <td>
                    <select name="jk" id="" required="required">
                        <option value="L">L</option>
                        <option value="P">P</option>
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
        <form action="warga.php" method="get">
            <input type="text" name="cari" id="">
            <select name="berdasarkan" id="">
                <option value="nama">Nama</option>
                <option value="nik">NIK</option>
            </select>
            <input type="submit" value="cari">
        </form><br>
<table border="1">
    <tr>
        <td>NIK</td>
        <td>Nama</td>
        <td>Alamat</td>
        <td>Tanggal Lahir</td>
        <td>JK</td>
        <td>Aksi</td>
    </tr>

<?php
$halaman = 10;
$page = isset($_GET['halaman'])?(int)$_GET['halaman']:1;
$mulai = ($page>1)?($page*$halaman)-$halaman:0;
$hasil = mysqli_query($conn,"select * from warga");
$total = mysqli_num_rows($hasil);
$pages = ceil($total/$halaman);


if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    $berdasarkan = $_GET['berdasarkan'];
    $query = mysqli_query($conn,"select * from warga where ".$berdasarkan." like '%".$cari."%' limit $mulai, $halaman ");
    $cek = mysqli_num_rows($query);
    if ($cek = 0) {
        echo "data tidak ada";
        $query = mysqli_query($conn,"select * from warga limit $mulai, $halaman");
        # code...
    }
    # code...
}else{
    $query = mysqli_query($conn,"select * from warga limit $mulai, $halaman");
}

while($data = mysqli_fetch_array($query)){


?>


    <tr>

        <td><?php echo $data['nik']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['alamat']; ?></td>
        <td><?php echo $data['jk']; ?></td>
        <td><?php echo $data['ttl']; ?></td>
        <td>
            <a href="edit-warga.php?nik=<?php echo $data['nik'];?>">edit</a>
            <a href="hapus-warga.php?nik=<?php echo $data['nik'];?>" onclick="return confirm('Yakin Hapus?')">hapus</a>
            
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
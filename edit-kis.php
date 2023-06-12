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
    <form action="aksi-edit-kis.php" method="post">
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
            // $maxquery = mysqli_query($conn,"select max(nik) as kodeTerbesar from warga");
            // $maxdata = mysqli_fetch_array($maxquery);
            // $maxvalue = $maxdata['kodeTerbesar'];
            // $maxvalue++;
            $idkis = $_GET['idkis'];
            $editquery = mysqli_query($conn,"select * from datakis where nokartu='$idkis'");
            while ($d = mysqli_fetch_array($editquery)) {
                # code...
            
            ?>
            <tr>
                <td>No Kartu</td>
                <td><input type="text" name="idkis" value="<?php echo $d['nokartu']; ?>" id="" required="required" readonly></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>
                    <select name="nik" id="">
                                                        <?php
                    $qwarga = mysqli_query($conn,"select * from warga");
                    while ($dw = mysqli_fetch_array($qwarga)) {
                        # code...
                    
                ?>
                        <option value="<?php echo $dw['nik'] ?>"><?php echo $dw['nik']; } ?></option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $d['nama']; ?>"  id="" required="required"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $d['alamat'] ?>"></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="ttl" value="<?php echo $d['tanggal']; ?>"  id="" required="required"></td>
            </tr>
            <tr>

                <td>Faskes</td>
                <td><select name="idfaskes" id="">                <?php
                    $qfaskes = mysqli_query($conn,"select idfaskes from faskes");
                    while ($df = mysqli_fetch_array($qfaskes)) {
                        # code...
                ?>
                    <option value="<?php echo $df['idfaskes'] ?>"><?php echo $df['idfaskes']; } ?></option>
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
<?php
            }
?>


<br>
<hr>
<br>
<?php

?>
        <form action="edit-kis.php" method="get">
            <input type="text" name="cari" id="">
            <select name="berdasarkan" id="">
                <option value="nama">Nama</option>
                <option value="nokartu">No kartu</option>
            </select>
            <input type="submit" value="cari">
        </form><br>
<table border="1">
    <tr>
        <td>No Kartu</td>
        <td>Nama</td>
        <td>Alamat</td>
        <td>Tanggal Lahir</td>
        <td>NIK</td>
        <td>Faskes</td>
        <td>Aksi</td>
    </tr>

<?php

if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    $berdasarkan = $_GET['berdasarkan'];
    $query = mysqli_query($conn,"select * from datakis where ".$berdasarkan." like '%".$cari."%'");
    $cek = mysqli_num_rows($query);
    if ($cek = 0) {
        echo "data tidak ada";
        $query = mysqli_query($conn,"select * from datakis");
        # code...
    }
    # code...
}else{
    $query = mysqli_query($conn,"select * from datakis");
}

while($data = mysqli_fetch_array($query)){


?>


    <tr>

        <td><?php echo $data['nokartu']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['alamat']; ?></td>
        <td><?php echo $data['tanggal']; ?></td>
        <td><?php echo $data['nik']; ?></td>
        <td><?php echo $data['tingkat']; ?></td>
        <td>
            <a href="edit-warga.php?nik=<?php echo $data['nik'];?>">edit</a>
            <a href="hapus-warga.php?nik=<?php echo $data['nik'];?>" onclick="return confirm('Yakin Hapus?')">hapus</a>
            
        </td>
    </tr>
    <?php
}
?>
</table>




</body>
</html>
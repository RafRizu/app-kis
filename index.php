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
<h3>Selamat Datang,<?php echo $_SESSION['username'] ?></h3>

    <a href="logout.php">logout</a><br>
    <a href="ganti-password.php">Ganti Password</a><br>
    <a href="faskes.php">Data Faskes</a><br>
    <a href="peserta.php">Data Peserta</a><br>
    <hr>
    <form action="tambah-kis.php" method="post">
        <h3>Tambah Data KIS</h3>
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
    <table>
        <?php
        $tahun=date('Y');
        $maxdata = mysqli_query($conn,"select max(no_kis) as kodeTerbesar from kis");
        $fetchdata = mysqli_fetch_array($maxdata);
        $maxvalue = $fetchdata['kodeTerbesar'];
        $urutan = (int) substr($maxvalue,7,7);
        $urutan++;

        $maxnilai = $tahun.sprintf('%04s',$urutan);
        ?>
        <tr>
            <td>No. Kis</td>
            <td><input type="text" name="no_kis" value="<?php echo $maxnilai ?>" id="" readonly></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>
                <select name="nik" id="">
                    <?php
                    $qpeserta = mysqli_query($conn,"select * from peserta");
                    while ($dp = mysqli_fetch_array($qpeserta)) {
                        # code...
                    
                    ?>
                    <option value="<?php echo $dp['nik'] ?>"><?php echo $dp['nik']."-".$dp['nama'] ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Faskes</td>
            <td>
                <select name="id_faskes" id="">
                <?php
                    $qfaskes = mysqli_query($conn,"select * from faskes");
                    while ($df = mysqli_fetch_array($qfaskes)) {
                        # code...
                    
                    ?>
                    <option value="<?php echo $df['id_faskes'] ?>"><?php echo $df['nama_faskes'] ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="submit" onclick="return confirm('Yakin Tambah?')" value="Simpan"></td>
        </tr>
    </table>   
    </form>

    <table border="1" cellpadding="5">
        <tr>
            <td>No</td>
            <td>No. KIS</td>
            <td>NIK</td>
            <td>Nama Peserta</td>
            <td>Faskes</td>
            <td>Aksi</td>
        </tr>
        <?php 
        $no = 1;
        $query = mysqli_query($conn,"select * from datakis");
        
        while ($d = mysqli_fetch_array($query)) {
            # code...
        
        ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $d['no_kis'] ?></td>
            <td><?php echo $d['nik'] ?></td>
            <td><?php echo $d['nama'] ?></td>
            <td><?php echo $d['nama_faskes'] ?></td>
            <td>
                <a href="edit-kis.php?no_kis=<?php echo $d['no_kis'] ?>">Edit</a>|
                |<a href="hapus-kis.php?no_kis=<?php echo $d['no_kis'] ?>" onclick="return confirm('Yakin Hapus?')">Hapus</a>|
                |<a target="_blank" href="cetak-kis.php?no_kis=<?php echo $d['no_kis'] ?>">Cetak</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
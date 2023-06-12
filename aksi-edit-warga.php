<?php
session_start();
include "koneksi.php";

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$ttl = $_POST['ttl'];
$jk = $_POST['jk'];
$query = mysqli_query($conn,"update warga set nama = '$nama', alamat = '$alamat', ttl = '$ttl',jk='$jk' where nik = $nik");

if (!$query) {
    header("location:warga.php?pesan=gagal");
}else{
    header("location:warga.php?pesan=edit");
}


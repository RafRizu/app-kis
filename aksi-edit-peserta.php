<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    # code...
}
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tgl_lahir = $_POST['tgl_lahir'];

$query = mysqli_query($conn,"update peserta set nama='$nama',alamat='$alamat', tgl_lahir='$tgl_lahir' where nik='$nik'");

if (!$query) {
    header("location:peserta.php?pesan=gagal");
    # code...
}else{
    header("location:peserta.php?pesan=edit");
}
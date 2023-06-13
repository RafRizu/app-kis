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

$query = mysqli_query($conn,"insert into peserta values('$nik','$nama','$alamat','$tgl_lahir')");

if (!$query) {
    header("location:peserta.php?pesan=gagal");
    # code...
}else{
    header("location:peserta.php?pesan=input");
}
<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    # code...
}
$nik = $_GET['nik'];

$query = mysqli_query($conn,"delete from peserta where nik='$nik'");

if (!$query) {
    header("location:peserta.php?pesan=gagal");
    # code...
}else{
    header("location:peserta.php?pesan=hapus");
}
<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    # code...
}
$no_kis = $_POST['no_kis'];
$nik = $_POST['nik'];
$id_faskes = $_POST['id_faskes'];


$query = mysqli_query($conn,"insert into kis values('$no_kis','$nik','$id_faskes')");

if (!$query) {
    header("location:index.php?pesan=gagal");
    # code...
}else{
    header("location:index.php?pesan=input");
}
<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    # code...
}
$nama_faskes = $_POST['nama_faskes'];
$tingkat = $_POST['tingkat'];


$query = mysqli_query($conn,"insert into faskes values('','$nama_faskes','$tingkat')");

if (!$query) {
    header("location:faskes.php?pesan=gagal");
    # code...
}else{
    header("location:faskes.php?pesan=input");
}
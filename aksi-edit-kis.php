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


$query = mysqli_query($conn,"update kis set nik='$nik',id_faskes='$id_faskes' where no_kis='$no_kis'");

if (!$query) {
    header("location:index.php?pesan=gagal");
    # code...
}else{
    header("location:index.php?pesan=edit");
}
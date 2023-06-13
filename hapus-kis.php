<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    # code...
}
$no_kis = $_GET['no_kis'];

$query = mysqli_query($conn,"delete from kis where no_kis='$no_kis'");

if (!$query) {
    header("location:index.php?pesan=gagal");
    # code...
}else{
    header("location:index.php?pesan=hapus");
}
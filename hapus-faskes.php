<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    # code...
}
$id_faskes = $_GET['id_faskes'];

$query = mysqli_query($conn,"delete from faskes where id_faskes='$id_faskes'");

if (!$query) {
    header("location:faskes.php?pesan=gagal");
    # code...
}else{
    header("location:faskes.php?pesan=hapus");
}
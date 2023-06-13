<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    # code...
}
$id_faskes = $_POST['id_faskes'];
$nama_faskes = $_POST['nama_faskes'];
$tingkat = $_POST['tingkat'];

$query = mysqli_query($conn,"update faskes set nama_faskes='$nama_faskes',tingkat='$tingkat' where id_faskes='$id_faskes'");

if (!$query) {
    header("location:faskes.php?pesan=gagal");
    # code...
}else{
    header("location:faskes.php?pesan=edit");
}
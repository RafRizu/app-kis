<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    # code...
}
include "koneksi.php";
$username = $_SESSION['username'];
$oldpass = $_POST['oldpass'];
$newpass = $_POST['newpass'];

$qcek = mysqli_query($conn,"select * from user where username='$username' && password='$oldpass'");
$cek = mysqli_num_rows($qcek);
if (!$cek>0) {
    header("location:ganti-password.php?pesan=gagalpass");
    # code...
}else{
    $qupdate = mysqli_query($conn,"update user set password='$newpass'");
    session_destroy();
    header("location:login.php?pesan=changepass");
}    
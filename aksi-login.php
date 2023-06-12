<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// $query = "select * from user where username = '$username' && password = '$password'";
$data = mysqli_query($conn,"select * from user where username = '$username' && password = '$password'");

$cek = mysqli_num_rows($data);

if ($cek>0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:dashboard.php");
    # code...
}else{
    header("location:index.php?pesan=gagal");
}
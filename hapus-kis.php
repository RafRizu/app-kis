<?php
include "koneksi.php";
$idkis = $_GET['idkis'];
mysqli_query($conn,"delete from kis where idkis = '$idkis'");
header("location:kis.php?pesan=hapus");
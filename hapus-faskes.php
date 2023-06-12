<?php
include "koneksi.php";
$idfaskes = $_GET['idfaskes'];
mysqli_query($conn,"delete from faskes where idfaskes = '$idfaskes'");
header("location:faskes.php?pesan=hapus");
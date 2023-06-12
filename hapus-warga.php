<?php
include "koneksi.php";
$nik = $_GET['nik'];
mysqli_query($conn,"delete from warga where nik = '$nik'");
header("location:warga.php?pesan=hapus");
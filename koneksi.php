<?php
$conn = mysqli_connect("localhost", "root", "", "appkis");

if (!$conn) {
    echo "koneksi gagal";
    # code...
}
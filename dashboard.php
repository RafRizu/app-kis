<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <div class="d-flex">
        <div><a href="faskes.php" class="btn">Data Faskes</a></div>

        <div><a href="warga.php">Data Warga</a></div>

        <div><a href="kis.php" class="btn">Data KIS</a></div>

        <div><a href="ubahpass.php" class="btn">Ubah Password</a></div>
        <form action="logout.php" method="post">
            <div><input type="submit" value="Logout"></div>
        </form>
        
    </div>
    
</body>
</html>
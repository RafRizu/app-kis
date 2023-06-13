<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    # code...
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi KIS</title>
</head>
<body>
<?php
    if (isset($_GET['pesan'])) {
        $pesan = $_GET['pesan'];
        if ($pesan == "gagalpass") {
            echo "Password Lama Salah";
            # code...
        }
    }
        ?>
    <form action="aksi-ganti-password.php" method="post">
           <table>
        <tr>
            <td>Masukkan Password Lama</td>
            <td><input type="password" name="oldpass" id=""></td>
        </tr>
        <tr>
            <td>Masukkan Password Baru</td>
            <td><input type="password" name="newpass" id=""></td>
        </tr>
        <tr>
            <td><input type="submit" value="Ubah"></td>
            <td><a href="index.php">Batal</a></td>
        </tr>
    </table> 
    </form>

</body>
</html>
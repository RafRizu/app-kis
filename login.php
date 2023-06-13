<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi KIS</title>
</head>
<body>
    <h2>Silahkan Login</h2>
    <?php
    if (isset($_GET['pesan'])) {
        $pesan = $_GET['pesan'];
        if ($pesan == "gagal") {
            echo "Username atau Password salah";
            # code...
        }elseif($pesan == "changepass"){
            echo "Berhasil Ganti Password Silahkan Login Lagi";
        }
        # code...
    }
    ?>
    <form action="aksi-login.php" method="post">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" id=""></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" id=""></td>
        </tr>
        <tr><td><input type="submit" value="Login"></td></tr>
    </table>   
    </form>

</body>
</html>
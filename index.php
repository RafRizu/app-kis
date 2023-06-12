<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi KIS</title>
</head>
<body>
    <form method="post" action="aksi-login.php">

        <table cellpadding="10">
            <tr>
                <td colspan="2">
                     <?php
                      if (isset($_GET['pesan'])) {
                          $pesan = $_GET['pesan'];
                          if ($pesan == "gagal") {
                            echo "Username atau Password Salah";
                            # code...
                          }
                        # code...
                      }
                     ?>
                </td>
            </tr>
            <tr>
                <td>username</td>
                <td><input type="text" name="username" id=""></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password" name="password" id=""></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Login">
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>
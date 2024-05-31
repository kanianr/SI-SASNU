<?php
session_start();
if (!isset($_SESSION["id"])) {
    echo "<script> alert('Anda belum login, harap login terlebih dahulu');</script>";
    echo "<script> location ='index.php';</script>";
}
require_once("koneksi.php");
$id = $_SESSION['id'];

$ambil = $db->query("SELECT * FROM pegawai inner join user on pegawai.id = user.id_staff WHERE id='$id'");
$data = $ambil->fetch_assoc();

if (isset($_POST['ubah'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db->query("UPDATE user SET username='$username', password='$password' where id_staff ='$id'") or die(mysqli_error($db));
    echo "<script>alert('Data Berhasil Diubah');</script>";
    echo "<script> location ='ubahpassword.php';</script>";
}

?>

<?php
require_once("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Form</title>
    <link href="assets/img/nu.png" rel="icon">
    <style>
        body {
            font-family: sans-serif, sans-serif;
            background-image: url('assets/img/school.jpg');
            background-repeat: no-repeat;
            background-size: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 300px;
        }

        .login-container h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
            margin-right: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-right: 50px;
        }

        .form-group button {
            margin-top: 50px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        input[readonly] {
            background-color: #888;
            /* Darker color of your choice */
            color: #fff;
            /* Light text color for contrast */
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Update Password</h2>
        <table>
            <form action="" method="POST">
                <tr>
                    <td><label for="username">Username </label></td>
                    <td><input type="text" name="username" value="<?= $data['username'] ?>" readonly required></td>
                </tr>
                <tr>
                    <td><label for="password">Password </label></td>
                    <td><input type="text" name="password" value="<?= $data['password'] ?>" required></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Edit Data" name="ubah"></td>
                    <td><a href="arsip.php">Kembali</a></td>
                </tr>
            </form>
        </table>
    </div>
</body>

</html>


</html>
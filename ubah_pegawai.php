<?php
require_once("koneksi.php");
$id = $_GET["id"];

$ambiluser = $db->query("SELECT * FROM user WHERE id_staff='$id'");
$rowuser = $ambiluser->fetch_assoc();

if (!empty($rowuser)) {
    $ambil = $db->query("SELECT * FROM pegawai inner join user on pegawai.id = user.id_staff WHERE id='$id'");
    $data = $ambil->fetch_assoc();

    if (isset($_POST['ubah'])) {
        $nuptk = $_POST['nuptk'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jabatan = $_POST['jabatan'];
        $tmt = $_POST['tmt'];

        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];

        $db->query("UPDATE pegawai SET nuptk='$nuptk', nama='$nama', alamat='$alamat', jabatan='$jabatan', tmt='$tmt' where id='$id'") or die(mysqli_error($db));
        $db->query("UPDATE user SET nuptk='$nuptk', username='$username', password='$password', level='$level' where id_staff ='$id'") or die(mysqli_error($db));
        echo "<script>alert('Data Berhasil Diubah');</script>";
        echo "<script> location ='pegawai.php';</script>";
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
        </style>
    </head>

    <body>

        <div class="login-container">
            <h2>Update Data Pegawai</h2>
            <table>
                <form action="" method="POST">
                    <tr>
                        <td><input type="hidden" name="id" value="<?= $data['id'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="nuptk">NUPTK </label></td>
                        <td><input type="text" name="nuptk" value="<?= $data['nuptk'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="nama">Nama </label></td>
                        <td><input type="text" name="nama" value="<?= $data['nama'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="alamat">Alamat </label></td>
                        <td><input type="text" name="alamat" value="<?= $data['alamat'] ?>" required></td>
                    <tr>
                    <tr>
                        <td><label for="jabatan">Jabatan </label></td>
                        <td><input type="text" name="jabatan" value="<?= $data['jabatan'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="tmt">Tanggal Terhitung Masuk </label></td>
                        <td><input type="date" name="tmt" value="<?= $data['tmt'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="username">Username </label></td>
                        <td><input type="text" name="username" value="<?= $data['username'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password </label></td>
                        <td><input type="text" name="password" value="<?= $data['password'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="level">Level </label></td>
                        <td>
                            <select name="level" required>
                                <option <?php if ($data['level'] == 'Admin') echo 'selected'; ?> value="Admin">Admin</option>
                                <option <?php if ($data['level'] == 'Kepala Sekolah') echo 'selected'; ?> value="Kepala Sekolah">Kepala Sekolah</option>
                                <option <?php if ($data['level'] == 'Operator') echo 'selected'; ?> value="Operator">Operator</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Edit Data" name="ubah"></td>
                        <td><a href="pegawai.php"> Kembali </a></td>
                    </tr>
                </form>
            </table>
        </div>
    </body>

    </html>
<?php } else {
    $ambil = $db->query("SELECT * FROM pegawai WHERE id='$id'");
    $data = $ambil->fetch_assoc();

    if (isset($_POST['ubah'])) {
        $nuptk = $_POST['nuptk'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jabatan = $_POST['jabatan'];
        $tmt = $_POST['tmt'];

        $db->query("UPDATE pegawai SET nuptk='$nuptk', nama='$nama', alamat='$alamat', jabatan='$jabatan', tmt='$tmt' where id='$id'") or die(mysqli_error($db));
        echo "<script>
        alert('Data Berhasil Diubah');
    </script>";
        echo "<script>
        location = 'pegawai.php';
    </script>";
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
        </style>
    </head>

    <body>

        <div class="login-container">
            <h2>Update Data Pegawai</h2>
            <table>
                <form action="" method="POST">
                    <tr>
                        <td><input type="hidden" name="id" value="<?= $data['id'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="nuptk">NUPTK </label></td>
                        <td><input type="text" name="nuptk" value="<?= $data['nuptk'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="nama">Nama </label></td>
                        <td><input type="text" name="nama" value="<?= $data['nama'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="alamat">Alamat </label></td>
                        <td><input type="text" name="alamat" value="<?= $data['alamat'] ?>" required></td>
                    <tr>
                    <tr>
                        <td><label for="jabatan">Jabatan </label></td>
                        <td><input type="text" name="jabatan" value="<?= $data['jabatan'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="tmt">Tanggal Terhitung Masuk </label></td>
                        <td><input type="date" name="tmt" value="<?= $data['tmt'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Edit Data" name="ubah"></td>
                        <td><a href="pegawai.php"> Kembali </a></td>
                    </tr>
                </form>
            </table>
        </div>
    </body>

    </html>
<?php } ?>
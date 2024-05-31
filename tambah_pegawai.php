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

        ::placeholder {
            font-style: italic;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Tambah Data Pegawai</h2>
        <table>
            <form action="" method="POST">
                <tr>
                    <td><label for="id">ID </label></td>
                    <td><input type="text" name="id" required></td>
                </tr>
                <tr>
                    <td><label for="nuptk">NUPTK </label></td>
                    <td><input type="text" name="nuptk" required></td>
                </tr>
                <tr>
                    <td><label for="nama">Nama </label></td>
                    <td><input type="text" name="nama" required></td>
                </tr>
                <tr>
                    <td><label for="jk">Jenis Kelamin </label></td>
                    <td><input type='radio' name='jk' value='Laki-laki' />L <input type='radio' name='jk' value='Perempuan' />P</td>
                </tr>
                <tr>
                    <td><label for="alamat">Alamat </label></td>
                    <td><input type="text" name="alamat" required></td>
                <tr>
                <tr>
                    <td><label for="jabatan">Jabatan </label></td>
                    <td><input type="text" name="jabatan" required></td>
                </tr>
                <tr>
                    <td><label for="tmt">Tanggal Terhitung Masuk </label></td>
                    <td><input type="date" name="tmt" required></td>
                </tr>
                <tr>
                    <td><label for="level">Level </label></td>
                    <td>
                        <select name="level" required>
                            <option value="Staff Biasa">Staff Biasa</option>
                            <option value="Admin">Admin</option>
                            <option value="Kepala Sekolah">Kepala Sekolah</option>
                            <option value="Operator">Operator</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="username">Username </label></td>
                    <td><input type="text" name="username" placeholder="staff biasa = null"></td>
                </tr>
                <tr>
                    <td><label for="password">Password </label></td>
                    <td><input type="text" name="password" placeholder="staff biasa = null"></td>
                </tr>
                <td><input type="submit" value="Tambah Data" name="simpan"></td>
                <td><a href="pegawai.php"> kembali </a></td>
                </tr>
            </form>
        </table>
    </div>

    <?php

    if (isset($_POST['simpan'])) {
        $id = $_POST['id'];
        $nuptk = $_POST['nuptk'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $alamat = $_POST['alamat'];
        $jabatan = $_POST['jabatan'];
        $level = $_POST['level'];
        $tmt = $_POST['tmt'];

        $simpan = mysqli_query($db, "INSERT INTO pegawai VALUES ('$id','$nuptk','$nama','$jk','$alamat','$jabatan', '$tmt')");
        if ($simpan) {
            if ($level != 'Staff Biasa') {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $simpanuser = mysqli_query($db, "INSERT INTO user VALUES ('$id','$nuptk','$username','$password','$level')");
            }
            echo "<script>alert('Data Berhasil Di Tambah');</script>";
            echo "<script> location ='pegawai.php';</script>";
        } else {
            echo "<script>alert('Data Sudah Ada');</script>";
        }
    }
    ?>

</body>

</html>


</html>
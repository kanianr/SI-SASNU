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
        <h2>Tambah Data Surat Masuk</h2>
        <table>
            <form action="" method="POST" enctype="multipart/form-data">
                <tr>
                    <td><label for="id">ID</label></td>
                    <td><input type="text" name="id" required></td>
                </tr>
                <tr>
                    <td><label for="kode_surat">Kode Surat </label></td>
                    <td><input type="text" name="kode_surat" required></td>
                </tr>
                <tr>
                    <td><label for="asal_surat">Asal Surat</label></td>
                    <td><input type="text" name="asal_surat" required></td>
                </tr>
                <tr>
                    <td><label for="nomor_surat">Nomor Surat </label></td>
                    <td><input type="text" name="nomor_surat" required></td>
                </tr>
                <tr>
                    <td><label for="tanggal">Tanggal </label></td>
                    <td><input type="date" name="tanggal" required></td>
                </tr>
                <tr>
                    <td><label for="kepada">Tujuan </label></td>
                    <td><input type="text" name="kepada" required></td>
                </tr>
                <tr>
                    <td><label for="perihal">Perihal </label></td>
                    <td><input type="text" name="perihal" required></td>
                </tr>
                <tr>
                    <td><label for="penerima">Penerima </label></td>
                    <td><input type="text" name="penerima" required></td>
                </tr>
                <tr>
                    <td><label for="file">File </label></td>
                    <td><input type="file" name="file"></td>
                </tr>
                <tr>
                    <td><label for="id_staff">ID Staff </label></td>
                    <td>
                        <select name="id_staff" required>
                            <?php
                            $query = mysqli_query($db, "SELECT * FROM pegawai inner join user on pegawai.id = user.id_staff");
                            while ($datapegawai = mysqli_fetch_assoc($query)) {
                            ?>
                                <option value="<?= $datapegawai['id_staff'] ?>"><?= $datapegawai['id_staff'] . ' - ' . $datapegawai['nama'] ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Tambah Data" name="simpan"></td>
                    <td><a href="s_masuk.php"> kembali </a></td>
                </tr>
            </form>
        </table>
    </div>

    <?php

    if (isset($_POST['simpan'])) {
        $id = $_POST['id'];
        $kode_surat = $_POST['kode_surat'];
        $asal_surat = $_POST['asal_surat'];
        $nomor_surat = $_POST['nomor_surat'];
        $tanggal = $_POST['tanggal'];
        $kepada = $_POST['kepada'];
        $perihal = $_POST['perihal'];
        $penerima = $_POST['penerima'];
        $id_staff = $_POST['id_staff'];

        $lokasifoto = $_FILES['file']['tmp_name'];
        if (!empty($lokasifoto)) {
            $file = $_FILES['file']['name'];
            move_uploaded_file($lokasifoto, "masuk/" . $file);
        } else {
            $file = "";
        }
        $simpan = mysqli_query($db, "INSERT INTO surat_masuk VALUES ('$id', '$kode_surat', '$asal_surat', '$nomor_surat','$tanggal','$kepada','$perihal','$penerima','$file','$id_staff')");
        if ($simpan) {
            echo "<script>alert('Data Berhasil Di Tambah');</script>";
            echo "<script> location ='s_masuk.php';</script>";
        } else {
            echo "<script>alert('Data Sudah Ada');</script>";
        }
    }
    ?>

</body>

</html>


</html>
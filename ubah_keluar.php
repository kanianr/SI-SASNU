<?php
require_once("koneksi.php");
$id = $_GET["id"];

$ambil = $db->query("SELECT * FROM surat_keluar WHERE id='$id'");
$data = $ambil->fetch_assoc();

if (isset($_POST['ubah'])) {
    $kode_surat = $_POST['kode_surat'];
    $nomor_surat = $_POST['nomor_surat'];
    $tanggal = $_POST['tanggal'];
    $pengaju = $_POST['pengaju'];
    $kepada = $_POST['kepada'];
    $perihal = $_POST['perihal'];
    $pengirim = $_POST['pengirim'];
    $penerima = $_POST['penerima'];
    $id_staff = $_POST['id_staff'];

    $lokasifoto = $_FILES['file']['tmp_name'];
    if (!empty($lokasifoto)) {
        $file = $_FILES['file']['name'];
        move_uploaded_file($lokasifoto, "keluar/" . $file);
    } else {
        $file = $data['file'];
    }
    $db->query("UPDATE surat_keluar SET kode_surat='$kode_surat', nomor_surat='$nomor_surat', tanggal='$tanggal', pengaju='$pengaju', kepada='$kepada', perihal='$perihal', pengirim='$pengirim', penerima='$penerima', id_staff='$id_staff', file='$file' where id='$id'") or die(mysqli_error($db));
    echo "<script>alert('Data Berhasil Diubah');</script>";
    echo "<script> location ='s_keluar.php';</script>";
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
    <title>Update Form</title>
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
        <h2>Update Data Surat Keluar</h2>
        <table>
            <form action="" method="POST" enctype="multipart/form-data">
                <tr>
                    <td><label for="id"></label></td>
                    <td><input type="hidden" name="id" value="<?= $data['id']; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="kode_surat">Kode Surat </label></td>
                    <td><input type="text" name="kode_surat" value="<?= $data['kode_surat']; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="nomor_surat">Nomor Surat </label></td>
                    <td><input type="text" name="nomor_surat" value="<?= $data['nomor_surat']; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="tanggal">Tanggal Kirim</label></td>
                    <td><input type="date" name="tanggal" value="<?= $data['tanggal']; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="pengaju">Pengaju </label></td>
                    <td><input type="text" name="pengaju" value="<?= $data['pengaju']; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="kepada">Tujuan </label></td>
                    <td><input type="text" name="kepada" value="<?= $data['kepada']; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="perihal">Perihal </label></td>
                    <td><input type="text" name="perihal" value="<?= $data['perihal']; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="pengirim">Pengirim </label></td>
                    <td><input type="text" name="pengirim" value="<?= $data['pengirim']; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="penerima">Penerima </label></td>
                    <td><input type="text" name="penerima" value="<?= $data['penerima']; ?>" required></td>
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
                                <option <?php if ($data['id_staff'] == $datapegawai['id_staff']) echo 'selected'; ?> value="<?= $datapegawai['id_staff'] ?>"><?= $datapegawai['id_staff'] . ' - ' . $datapegawai['nama'] ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Edit Data" name="ubah"></td>
                    <td><a href="s_masuk.php"> Kembali </a></td>
                </tr>
            </form>
        </table>
    </div>
</body>

</html>


</html>
<!-- Page Heading -->
<?php
require_once("koneksi.php");
?>

<head>
    <title> Pegawai </title>
    <link href="assets/img/nu.png" rel="icon">
</head>
<style>
    /* Style umum untuk tabel */
    table {
        width: 90%;
        border-collapse: collapse;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f4f4f4;
    }

    /* Style untuk baris bergantian (zebra) */
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    /* Hover efek pada baris */
    tr:hover {
        background-color: #f1f1f1;
    }

    /* Style untuk teks utama */
    body {
        font-family: 'Arial', sans-serif;
        color: #333;
    }

    /* Style untuk tombol atau aksi */
    .button {
        display: inline-block;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        background-color: #4CAF50;
        color: #fff;
        border-radius: 5px;
    }

    .button:hover {
        background-color: #45a049;
    }

    /* Style untuk judul halaman atau header */
    h1,
    h2 {
        color: #333;
    }

    /* Style untuk warna tema */
    .theme-color {
        color: #3498db;
    }

    /* Style untuk ikon */
    .icon {
        font-size: 18px;
        margin-right: 5px;
        vertical-align: middle;
    }
</style>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <br>
    <h1 class="h3 mb-0 text-gray-800" align="center">Data Pegawai</h1>
</div>

<section id="services-list" class="services-list">
    <!-- Content Row -->

    <!-- menampilkan pesan flash data dari session -->
    <table border="1" align="center" class="table table-bordered table-hover table-striped" id="dataTable" width="90%">
        <tr>
            <th class="text-center">NO</th>
            <th class="text-center">ID</th>
            <th class="text-center">NUPTK</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">Alamat</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Tanggal Masuk Terhitung</th>
        </tr>
        <?php
        include "koneksi.php";
        $query = mysqli_query($db, "SELECT * FROM pegawai");
        $no = 1;
        while ($data = mysqli_fetch_assoc($query)) {
        ?>
            <tr align="center">
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['nuptk']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['jk']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td><?php echo $data['jabatan']; ?></td>
                <td><?php echo $data['tmt']; ?></td>
            </tr>
        <?php
        }
        ?>
        </tr>

        <!-- Tambahkan baris sesuai kebutuhan -->
        </tbody>
    </table>
    <a href="arsip.php" align="left"><img src="assets/img/back2.png" width="5%"></a>
    </body>

    <!-- table artikel-->
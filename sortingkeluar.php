<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SISAS-NU</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/nu.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
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
    <?php
    require_once("koneksi.php");
    if (isset($_POST['kirim'])) {
        $awal = $_POST['awal'];
        $akhir = $_POST['akhir'];
    ?>
        <br><br>
        <h2 align="center">LAPORAN SURAT KELUAR</h2><br>
        <table border="1" align="center" class="table table-bordered table-hover table-striped" id="dataTable" width="90%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Surat</th>
                    <th>Nomor Surat</th>
                    <th>Tanggal</th>
                    <th>Pengaju</th>
                    <th>Kepada</th>
                    <th>Perihal</th>
                    <th>Pengirim</th>
                    <th>Penerima</th>
                    <th>File</th>
                    <th>ID Staff</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($db, "SELECT * FROM surat_keluar WHERE tanggal BETWEEN '$awal' AND '$akhir'");
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) {
                ?>
                    <tr align="center">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['kode_surat']; ?></td>
                        <td><?php echo $data['nomor_surat']; ?></td>
                        <td><?php echo $data['tanggal']; ?></td>
                        <td><?php echo $data['pengaju']; ?></td>
                        <td><?php echo $data['kepada']; ?></td>
                        <td><?php echo $data['perihal']; ?></td>
                        <td><?php echo $data['pengirim']; ?></td>
                        <td><?php echo $data['penerima']; ?></td>
                        <td>
                            <?php
                            if ($data['file'] != "") { ?>
                                <a class="btn btn-primary" href="keluar/<?= $data['file'] ?>" target="_blank">Preview</a>
                            <?php } ?>
                        </td>
                        <td>
                            <?php
                            $idstaff = $data['id_staff'];
                            $ambilpegawai = $db->query("SELECT * FROM pegawai inner join user on pegawai.id = user.id_staff WHERE user.id_staff='$idstaff'");
                            $rowpegawai = $ambilpegawai->fetch_assoc();
                            echo $data['id_staff'];
                            if (!empty($rowpegawai)) {
                                echo ' - ' . $rowpegawai['nama'];
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </tr>
                <!-- Tambahkan baris sesuai kebutuhan -->
            </tbody>
        </table>
        <br>
        <a href="arsip.php" align="left"><img src="assets/img/back2.png" width="5%"></a>
    <?php
    }
    ?>
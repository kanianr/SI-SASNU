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
        <h2 align="center">LAPORAN SURAT MASUK</h2><br>
        <table border="1" align="center" class="table table-bordered table-hover table-striped" id="dataTable" width="90%">
            <tr>
                <th class="text-center">NO</th>
                <th class="text-center">Kode Surat</th>
                <th class="text-center">Asal Surat</th>
                <th class="text-center">Nomor Surat</th>
                <th class="text-center">Tanggal Diterima</th>
                <th class="text-center">Tujuan</th>
                <th class="text-center">Perihal</th>
                <th class="text-center">Penerima</th>
                <th class="text-center">ID Staff</th>
                <th class="text-center">File</th>
            </tr>
            <?php
            $query = mysqli_query($db, "SELECT * FROM surat_masuk WHERE tanggal BETWEEN '$awal' AND '$akhir'");
            $no = 1;
            while ($data = mysqli_fetch_assoc($query)) {
            ?>
                <!-- menampilkan pesan flash data dari session -->
                <tr align="center">
                    <?php
                    $no = 1;
                    ?>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['kode_surat']; ?></td>
                    <td><?php echo $data['asal_surat']; ?></td>
                    <td><?php echo $data['nomor_surat']; ?></td>
                    <td><?php echo $data['tanggal']; ?></td>
                    <td><?php echo $data['kepada']; ?></td>
                    <td><?php echo $data['perihal']; ?></td>
                    <td><?php echo $data['penerima']; ?></td>
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
                    <td><?php echo $data['file']; ?></td>
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
    <?php
    }
    ?>
<?php
require_once("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SISAS-NU</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/nu.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<!-- =======================================================
  ======================================================== -->
</head>

<body class="page-index">

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.php" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="d-flex align-items-center"><span>SISAS-NU</span></h1>
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="#dashboard" class="active">Dashboard</a></li>
                    <li><a href="#tentang">Tentang</a></li>
                    <li><a href="arsip.php">Arsip Surat</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                    <li><a href="ubahpassword.php">Ubah Password</a></li>
                </ul>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="services-list" class="services-list">
        <div class="container">

            <div class="section-header">
                <h2 id="s_masuk">Arsip Surat Masuk</h2>
            </div>
            <div><a href="<?php echo ('p_masuk.php'); ?>"><button type="button" class="btn btn-primary"><b>PRINT</b></button></a></div><br>
            <center>
                <form class="form-inline my-2 my-lg-0">
                    <div align='left'><a href="tambah_masuk.php"><img src="assets/img/TAMBAH.png" width='3%'> Tambah Data</a></div>
                </form>
            </center>
            <br>
            <table id="tabel">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Surat</th>
                        <th>Asal Surat</th>
                        <th>Nomor Surat</th>
                        <th>Tanggal Masuk</th>
                        <th>Tujuan</th>
                        <th>Perihal</th>
                        <th>Penerima</th>
                        <th>File</th>
                        <th>ID Staff</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $query = mysqli_query($db, "SELECT * FROM surat_masuk");
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr align="center">
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
                                if ($data['file'] != "") { ?>
                                    <a class="btn btn-primary" href="masuk/<?= $data['file'] ?>" target="_blank">Preview</a>
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
                            <td width='10%'>
                                <div align='center'>
                                    <a href="ubah_masuk.php?id=<?= $data['id']; ?>"><img src="assets/img/update.png" width='25%'></a>
                                    <a href="?hapus&kode_surat=<?= $data['kode_surat']; ?>"><img src="assets/img/delete.png" width='25%'></a>
                                </div>
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
            <a href="arsip.php" align="left"><img src="assets/img/back2.png" width="5%"></a> Kembali
            <br>
            <br>
            <br>
            <br>
        </div>
    </section><!-- End Our Services Section -->

    <!-- ======= Footer ======= -->
    <footer id=" kontak" class="footer">

        <div class="footer-content">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <span>Kania Nadya Rahmah</span>
                        </a>
                        <div class="social-links d-flex  mt-3">
                            <a href="https://mobile.facebook.com/kania.nadiar/" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="https://instagram.com/kanianadia/" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="https://linkedin.com/in/kanianadyarahmah/" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12 footer-contact text-right text-md-start">
                        <left>
                            <h4>Contact Us</h4>
                            <p>
                                West Java,<br>
                                Indonesia.<br><br>
                                <strong>Email:</strong> kanianadyaa@gmail.com<br>
                            </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-legal">
            <div class="container">
                <div class="copyright">
                    Development by <strong><span>Kania Nadya Rahmah</span></strong>.
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nova-bootstrap-business-template/ -->
                </div>
            </div>
        </div>
    </footer><!-- End Footer --><!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabel').DataTable();
        });
    </script>
</body>

</html>
<?php
if (isset($_GET['hapus'])) {
    $kode_surat = $_GET['kode_surat'];
    $hapus = mysqli_query($db, "DELETE FROM surat_masuk WHERE kode_surat='$kode_surat'");
    if ($hapus) {
        header("location: s_masuk.php");
    } else {
        echo "<script>alert('maaf,data tersebut masih terhubung dengan data yang lain');
		</script>";
    }
}

if (isset($_POST['edit'])) {
    $kode_surat = $_POST['kode_surat'];
    $asal_surat = $_POST['asal_surat'];
    $nomor_surat = $_POST['nomor_surat'];
    $tanggal = $_POST['tanggal'];
    $tujuan = $_POST['kepada'];
    $perihal = $_POST['perihal'];
    $penerima = $_POST['penerima'];
    $file = $_POST['file'];
    $id_staff = $_POST['id_staff'];
    $update = mysqli_query($db, "UPDATE surat_masuk SET kode_surat='$kode_surat', asal_surat='$asal_surat', nomor_surat='$nomor_surat', tanggal='$tanggal', kepada='$tujuan', penerima='$penerima', file='$file' WHERE kode_surat='$kode_surat'");
    if ($update) {
        header("location: s_masuk.php");
    } else {
        echo "<script>alert('Gagal');</script>";
    }
}

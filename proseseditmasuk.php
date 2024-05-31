
<?php
include "koneksi.php";



$kode_surat = $_POST['kode_surat'];
$asal_surat = $_POST['asal_surat'];
$nomor_surat = $_POST['nomor_surat'];
$tanggal = $_POST['tanggal'];
$tujuan = $_POST['kepada'];
$perihal = $_POST['perihal'];
$penerima = $_POST['penerima'];
$file = $_POST['file'];
$id_staff = $_POST['id_staff'];


mysqli_query($db, "UPDATE surat_masuk SET kode_surat='$kode_surat', asal_surat='$asal_surat', nomor_surat='$nomor_surat',
             tanggal='$tanggal', kepada='$tujuan', penerima='$penerima', file='$file' WHERE kode_surat='$kode_surat'");

header("Location:s_masuk.php");

?>





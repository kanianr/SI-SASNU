<?php
// proses_tambah_data.php

// Lakukan koneksi ke database jika diperlukan

// Tangkap data dari formulir
if (isset($_POST['simpan'])) {
    $kode_surat = $_POST['kode_surat'];
    $asal_surat = $_POST['asal_surat'];
    $nomor_surat = $_POST['nomor_surat'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $tujuan = $_POST['kepada'];
    $perihal = $_POST['perihal'];
    $penerima = $_POST['penerima'];
    $id_staff = $_POST['id_staff'];
    $file = $_POST['file'];
}
// Simpan data ke database atau lakukan tindakan lain sesuai kebutuhan

// Redirect kembali ke halaman s_masuk.php setelah proses selesai
header("Location: s_masuk.php");
exit();

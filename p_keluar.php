<!-- Page Heading -->
<?php
require_once("koneksi.php");
?>

<head>
    <title> Surat Keluar </title>
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
    <h1 class="h3 mb-0 text-gray-800" align="center">Data Surat Keluar</h1>
</div>

<section id="services-list" class="services-list">
    <!-- Content Row -->

    <div class="card border-dark " style="max-width: 22rem;" align="center">
        <div class="card-header  border-success"><b>FILTER LAPORAN SURAT KELUAR</b></div>
        <div class="card-body text-success">
            <h5 class="card-title"></h5>
            <form action="sortingkeluar.php" method="POST">
                <div class="col-md-10 form-group">
                    Tanggal Awal :
                    <input type="date" class="form-control" name="awal" required="">
                </div><br>
                <div class="col-md-10 form-group">
                    Tanggal Akhir :
                    <input type="date" class="form-control" name="akhir" required="">
                </div><br>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" name="kirim">
                </div>
            </form>
        </div>
    </div>
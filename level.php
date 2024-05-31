<?php
require_once("koneksi.php");
?>
<style>
    ul {
        list-style-type: none;
        margin: 10;
        padding: 0;
    }

    .li1 {
        display: inline;
    }

    .li2 {
        display: inline;
    }

    .li3 {
        display: inline;
    }

    a {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 20px;
        color: RGB (100, 149, 237);
    }
</style>
<hr />
<?php
$panggil = mysqli_query($db, "SELECT * FROM user WHERE username='$username'");
$hasil = mysqli_fetch_assoc($panggil);
if ($hasil['level'] == "Operator") { ?>
    <a href="s_masuk.php">Data Arsip Masuk |</a>
    <a href="s_keluar.php">Data Arsip Keluar |</a>
    <a href="pegawai.php">Data Pegawai |</a>
    <a href="ubahpassword.php">Ubah Password |</a>
    <a href="logout.php">Logout |</a>
<?php
} else if ($hasil['level'] == "Admin") { ?>
    <ul>
        <li class="li1"><a href="s_masuk.php">Data Arsip Masuk |</a></li>
        <li class="li2"><a href="s_keluar.php">Data Arsip Keluar |</a></li>
        <a href="ubahpassword.php">Ubah Password |</a>
        <li class="li3"><a href="logout.php">Logout</a></li>
    </ul>
<?php
} else { ?>
    <a href="lap_masuk.php">Laporan Data Surat Masuk |</a>
    <a href="lap_keluar.php">Laporan Data Surat Keluar |</a>
    <a href="lap_pegawai.php">Laporan Data Pegawai |</a>
    <a href="ubahpassword.php">Ubah Password |</a>
    <a href="logout.php">Logout</a>
<?php } ?>
<hr />
<link href="assets/img/nu.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
<?php
session_start();
require_once("koneksi.php");
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cari = mysqli_query($db, "SELECT * FROM user WHERE username='$username'");
    $hasil = mysqli_fetch_assoc($cari);
    if (mysqli_num_rows($cari) == 0) {
        echo "<center> Username belum terdaftar! <a href='login.php'>kembali</a></center>";
    } else {
        if ($hasil['password'] <> $password) {
            echo "<center>Password salah!<a href='login.php'>kembali</a></center>";
        } else {
            $_SESSION['id'] = $hasil['id_staff'];
            $_SESSION['username'] = $_POST['username'];
            header("location: arsip.php");
        }
    }
}

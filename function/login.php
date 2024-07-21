<?php
include '../include/config.php';

if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = mysqli_query($connect, "SELECT * FROM users WHERE username='$username' && password='$password'");
    $cari = mysqli_num_rows($sql);
    $akses = mysqli_fetch_array($sql);
    if ($cari) {
        session_start();
        $_SESSION['ceklog'] = $akses['nama_user'];
        echo "<script>alert('Login Sukses');document.location.href='../admin/admin.php' ;</script>";
    } else {
        echo "<script>alert('Login Gagal');document.location.href='../index.php' ;</script>";
    }
} else {
    header('location:../index.php');
}
?>
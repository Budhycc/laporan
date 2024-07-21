<?php
include '../include/config.php';

if (isset($_GET['validasi'])) {
    $id = $_GET['validasi'];

    $query = "UPDATE laporan SET status = 'Valid' WHERE id_laporan = '$id'";
    $sql = mysqli_query($connect, $query);

    if ($sql) {
        echo "<script>alert('Validasi Sukses');document.location.href='../admin/laporan.php?hasil=$id'</script>";
    } else {
        echo "<script>alert('Validasi Gagal');document.location.href='../admin/laporan.php?hasil=$id'</script>";
    }
} else if (isset($_GET['klarifikasi'])) {
    $id = $_GET['klarifikasi'];

    $query = "UPDATE laporan SET status = 'Klarifikasi' WHERE id_laporan = '$id'";
    $sql = mysqli_query($connect, $query);

    if ($sql) {
        echo "<script>alert('Klarifikasi Sukses');document.location.href='../admin/laporan.php?hasil=$id'</script>";
    } else {
        echo "<script>alert('Klarifikasi Gagal');document.location.href='../admin/laporan.php?hasil=$id'</script>";
    }
} else if (isset($_GET['selesai'])) {
    $id = $_GET['selesai'];

    $query = "UPDATE laporan SET status = 'Selesai' WHERE id_laporan = '$id'";
    $sql = mysqli_query($connect, $query);

    if ($sql) {
        echo "<script>alert('Konfirmasi Sukses');document.location.href='../admin/laporan.php?hasil=$id'</script>";
    } else {
        echo "<script>alert('Konfirmasi Gagal');document.location.href='../admin/laporan.php?hasil=$id'</script>";
    }
} else if (isset($_GET['tolak'])) {
    $id = $_GET['tolak'];

    $query = "UPDATE laporan SET status = 'ditolak' WHERE id_laporan = '$id'";
    $sql = mysqli_query($connect, $query);

    if ($sql) {
        echo "<script>alert('Berhasil Di Tolak');document.location.href='../admin/laporan.php?hasil=$id'</script>";
    } else {
        echo "<script>alert('Gagal Di Tolak');document.location.href='../admin/laporan.php?hasil=$id'</script>";
    }
} else {
    echo 'GAGAL';
}
?>
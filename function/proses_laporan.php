<?php
include '../include/config.php';
include '../include/function.php';

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

if (isset($_POST['laporan'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $pekerjaan = $_POST['pekerjaan'];
    $ktp = $_FILES['foto_ktp']['name'];
    $no_hp = konversiNomorHP($_POST['hp']);
    $no_wa = konversiNomorHP($_POST['wa']);
    $tanggal_kejadian = $_POST['tanggal_kejadian'];
    $lokasi = $_POST['lokasi'];
    $terlapor = $_POST['terlapor'];
    $korban = $_POST['korban'];
    $yang_terjadi = $_POST['yang_terjadi'];
    $kejadian = $_POST['kejadian'];
    $pidana = $_POST['pidana'];
    $saksi = $_POST['saksi'];
    $uraian = $_POST['uraian'];
    $bukti = $_FILES['foto_bukti']['name'];
    $status = "diproses";
    $waktu_laporan = date('Y-m-d');

    $direktori_ktp = "../image/upload/laporan/ktp/";
    $direktori_bukti = "../image/upload/laporan/bukti/";
    $tmp_ktp = $_FILES['foto_ktp']['tmp_name'];
    $tmp_bukti = $_FILES['foto_bukti']['tmp_name'];
    $acak = generate_string($permitted_chars, 20);

    // Sanitize filenames
    $nama_file_ktp = $acak . sanitize_filename($ktp);
    $nama_file_bukti = $acak . sanitize_filename($bukti);

    // Move uploaded files
    move_uploaded_file($tmp_ktp, $direktori_ktp . $nama_file_ktp);
    move_uploaded_file($tmp_bukti, $direktori_bukti . $nama_file_bukti);
    
    $query = "INSERT INTO laporan VALUES(NULL,'$waktu_laporan', '$nik', '$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$alamat', '$pekerjaan', '$nama_file_ktp', '$no_hp', '$no_wa', '$tanggal_kejadian', '$lokasi', '$terlapor', '$korban', '$yang_terjadi', '$kejadian', '$pidana', '$saksi', '$uraian', '$nama_file_bukti', '$status')";
    $sql = mysqli_query($connect, $query);

    if ($sql) {
        //echo 'yes';
        echo "<script>alert('Laporan Sukses');document.location.href='../index.php?hasil';</script>";
    } else {
        //echo 'no';
        echo "<script>alert('Laporan Gagal');document.location.href='../index.php';</script>";
    }
} else if (isset($_POST['change'])) {
    $id = $_POST['id'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $pekerjaan = $_POST['pekerjaan'];
    $ktp = $_FILES['foto_ktp']['name'];
    $no_hp = konversiNomorHP($_POST['hp']);
    $no_wa = konversiNomorHP($_POST['wa']);
    $tanggal_kejadian = $_POST['tanggal_kejadian'];
    $lokasi = $_POST['lokasi'];
    $terlapor = $_POST['terlapor'];
    $korban = $_POST['korban'];
    $yang_terjadi = $_POST['yang_terjadi'];
    $kejadian = $_POST['kejadian'];
    $pidana = $_POST['pidana'];
    $saksi = $_POST['saksi'];
    $uraian = $_POST['uraian'];
    $bukti = $_FILES['foto_bukti']['name'];
    $status = "diproses";
    $waktu_laporan = date('Y-m-d');

    $direktori_ktp = "../image/upload/laporan/ktp/";
    $direktori_bukti = "../image/upload/laporan/bukti/";
    $tmp_ktp = $_FILES['foto_ktp']['tmp_name'];
    $tmp_bukti = $_FILES['foto_bukti']['tmp_name'];
    $acak = generate_string($permitted_chars, 20);

    // Sanitize filenames
    $nama_file_ktp = $acak . sanitize_filename($ktp);
    $nama_file_bukti = $acak . sanitize_filename($bukti);

    // Move uploaded files
    move_uploaded_file($tmp_ktp, $direktori_ktp . $nama_file_ktp);
    move_uploaded_file($tmp_bukti, $direktori_bukti . $nama_file_bukti);
    
    $query = "UPDATE laporan 
    SET waktu_laporan = '$waktu_laporan', 
        nik = '$nik', 
        nama = '$nama', 
        tempat_lahir = '$tempat_lahir', 
        tanggal_lahir = '$tanggal_lahir', 
        jenis_kelamin = '$jenis_kelamin', 
        alamat = '$alamat', 
        pekerjaan = '$pekerjaan', 
        ktp = '$nama_file_ktp', 
        no_hp = '$no_hp', 
        no_wa = '$no_wa', 
        tanggal_kejadian = '$tanggal_kejadian', 
        alamat_kejadian = '$lokasi', 
        terlapor = '$terlapor', 
        korban = '$korban', 
        yang_terjadi = '$yang_terjadi', 
        kejadian = '$kejadian', 
        pidana = '$pidana', 
        saksi = '$saksi', 
        bagaimana_terjadi = '$uraian', 
        bukti = '$nama_file_bukti'
    WHERE id_laporan = $id";

    $sql = mysqli_query($connect, $query);

    if ($sql) {
        //echo 'yes';
        echo "<script>alert('Edit Sukses');document.location.href='../view.php?no=$nik';</script>";

    } else {
        //echo 'no';
        echo "<script>alert('Edit Gagal');document.location.href='../view.php?no=$nik';</script>";
    }
} else if (isset($_GET['delete_a'])) {
    $id = $_GET['delete_a'];
    $query = "DELETE FROM laporan WHERE id_laporan = '$id'";
    $sql = mysqli_query($connect, $query);

    if ($sql) {
        echo "<script>alert('Hapus Laporan Sukses');document.location.href='../admin/admin.php';</script>";
    } else {
        echo "<script>alert('Hapus Laporan Gagal');document.location.href='../admin/admin.php';</script>";
    }

} else if (isset($_GET['delete_b'])) {
    $id = $_GET['delete_b'];
    $query = "DELETE FROM laporan WHERE id_laporan = '$id'";
    $sql = mysqli_query($connect, $query);

    if ($sql) {
        echo "<script>alert('Hapus Laporan Sukses');document.location.href='../admin/view.php';</script>";
    } else {
        echo "<script>alert('Hapus Laporan Gagal');document.location.href='../admin/view.php';</script>";
    }
}  else {
    echo "Form not submitted correctly.";
}
?>
<a href="../index.php">home</a>
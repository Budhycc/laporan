<?php
include 'include/config.php';

$id_laporan = $_GET['view'];

$query = "SELECT * FROM laporan WHERE id_laporan = '$id_laporan'";
$sql = mysqli_query($connect, $query);
$data = mysqli_fetch_array($sql);

$nik = $data['nik'];
//$waktu_laporan = $data['waktu_laporan'];
$waktu_laporan = date("d-m-Y", strtotime($data['waktu_laporan']));  
$nama = $data['nama'];
$tempat_lahir = $data['tempat_lahir'];
$tanggal_lahir = $data['tanggal_lahir'];
$jenis_kelamin = $data['jenis_kelamin'];
$alamat = $data['alamat'];
$pekerjaan = $data['pekerjaan'];
$ktp = $data['ktp'];
$no_hp = $data['no_hp'];
$no_wa = $data['no_wa'];
//$tanggal_kejadian = $data['tanggal_kejadian'];
$tanggal_kejadian = date("d-m-Y", strtotime($data['tanggal_kejadian']));  
$lokasi = $data['alamat_kejadian'];
$terlapor = $data['terlapor'];
$korban = $data['korban'];
$yang_terjadi = $data['yang_terjadi'];
$kejadian = $data['bagaimana_terjadi'];
$pidana = $data['pidana'];
$saksi = $data['saksi'];
$uraian = $data['kejadian'];
$bukti = $data['bukti'];
$status = $data['status'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Laporan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .content {
            margin: auto;
            padding: 20px;
            width: 80%;
            max-width: 1200px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .table th {
            width: 30%;
            background-color: #f1f1f1;
        }

        .table-responsive {
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .content {
                width: 95%;
            }
        }
    </style>
</head>

<body>
    <div class="content">
        <h2 class="text-center">Detail Laporan</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>NIK Pelapor</th>
                        <td><?php echo $nik ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><?php echo $status; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Pelapor</th>
                        <td><?php echo $nama; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Kejadian</th>
                        <td><?php echo $tanggal_kejadian; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Lapor</th>
                        <td><?php echo $waktu_laporan; ?></td>
                    </tr>
                    <tr>
                        <th>Apa yang Terjadi?</th>
                        <td><?php echo $yang_terjadi; ?></td>
                    </tr>
                    <tr>
                        <th>Bagaimana Terjadi</th>
                        <td><?php echo $kejadian; ?></td>
                    </tr>
                    <!-- <tr>
                        <th>Terlapor</th>
                        <td><?php //echo $terlapor; ?></td>
                    </tr>
                    <tr>
                        <th>Korban</th>
                        <td><?php //echo $korban; ?></td>
                    </tr>
                    <tr>
                        <th>Saksi</th>
                        <td><?php //echo $saksi; ?></td>
                    </tr> -->
                    <tr>
                        <th>Uraian Kejadian</th>
                        <td><?php echo $uraian; ?></td>
                    </tr>
                    <!-- <tr>
                        <th>Tindak Pidana</th>
                        <td><?php //echo $pidana; ?></td>
                    </tr> -->
                    <tr>
                        <th>Nomor Telepon / WA Pelapor</th>
                        <td><?php echo $no_hp . '/' . $no_wa; ?></td>
                    </tr>
                    <!-- <tr>
                        <th>Foto KTP</th>
                        <td>
                            <a href="image/upload/laporan/ktp/<?php //echo $ktp; ?>" target="_blank">
                                <img width="350px" src="image/upload/laporan/ktp/<?php //echo $ktp; ?>" alt="Foto KTP">
                            </a>
                        </td>
                    </tr> -->
                    <tr>
                        <th>Bukti</th>
                        <td>
                            <a href="image/upload/laporan/bukti/<?php echo $bukti; ?>" target="_blank">
                                <img width="350px" src="image/upload/laporan/bukti/<?php echo $bukti; ?>" alt="Bukti">
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>

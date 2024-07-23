<?php
session_start();
if ($_SESSION == NULL) {
    header('location:../index.php');
} else {
    include '../include/config.php';

    if (isset($_GET['view'])) {
        $id_laporan = $_GET['view']; 
        //var_dump($id_laporan);
        //die();
    } else if (isset($_GET['hasil'])) {
        $id_laporan = $_GET['hasil']; 
    } else {
        header('location:admin.php');
    }
    $query = "SELECT * FROM laporan WHERE id_laporan = '$id_laporan'";
    $sql = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($sql);

    $nik = $data['nik'];
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
        <title>Laporan</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                display: flex;
                height: 100vh;
                overflow: hidden;
            }

            .sidebar {
                height: 100%;
                width: 250px;
                background-color: #343a40;
                padding-top: 20px;
                position: fixed;
                transition: transform 0.3s ease;
            }

            .sidebar a {
                padding: 10px 15px;
                text-decoration: none;
                font-size: 18px;
                color: white;
                display: block;
            }

            .sidebar a:hover {
                background-color: #495057;
            }

            .content {
                margin-left: 250px;
                padding: 20px;
                width: calc(100% - 250px);
                overflow-y: auto;
                transition: margin-left 0.3s ease;
            }

            @media (max-width: 768px) {
                .sidebar {
                    transform: translateX(-250px);
                    width: 250px;
                    height: 100%;
                    position: fixed;
                    z-index: 1000;
                }

                .content {
                    margin-left: 0;
                    width: 100%;
                    transition: margin-left 0.3s ease;
                }

                .sidebar.active {
                    transform: translateX(0);
                }

                .content.active {
                    margin-left: 250px;
                }

                .navbar-nav {
                    display: none;
                    /* Hide the navbar links */
                }
            }

            .sidebar-toggler {
                display: none;
            }

            @media (max-width: 768px) {
                .sidebar-toggler {
                    display: block;
                    padding: 10px 15px;
                    background-color: #343a40;
                    color: white;
                    text-align: center;
                    cursor: pointer;
                    position: fixed;
                    top: 0;
                    right: 0;
                    z-index: 1100;
                }

                .navbar-brand {
                    margin-left: 10px;
                }

                .navbar-collapse {
                    margin-top: 50px;
                    /* Adjust as needed */
                }
            }
        </style>
    </head>

    <body>
        <div class="sidebar">
            <a href="admin.php">Dashboard</a>
            <a href="view.php">Data Laporan</a>
            <a href="../index.php" target="_blank">Buka web Utama</a>
            <a href="../function/logout.php">Logout</a>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="admin.php">Laporan</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <!-- <span class="navbar-toggler-icon"></span> -->
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container mt-4">
                <h2>Data Laporan</h2>
                <div class="mb-3">
                    <a href="../function/cetak.php?cetak=<?php echo $id_laporan ;?>" class="btn btn-primary" target="_BLANK">Cetak</a>
                    <a href="whatsapp://send?text=Hello&phone=+<?php echo $no_wa ;?>" class="btn btn-success">Kontak WA</a>
                    <?php if ($data['status'] === 'diproses') { ?>
                        <a href="../function/validasi.php?validasi=<?php echo $id_laporan ;?>" class="btn btn-info">Validasi Data</a>
                    <?php } else if ($data['status'] === 'Valid') {?>
                        <a href="../function/validasi.php?klarifikasi=<?php echo $id_laporan ;?>" class="btn btn-info">Klarifikasi</a>
                    <?php } else if ($data['status'] === 'Klarifikasi') {?>
                        <a href="../function/validasi.php?selesai=<?php echo $id_laporan ;?>" class="btn btn-info">Selesai</a>
                    <?php } if ($data['status'] !== 'Selesai' && $data['status'] !== 'ditolak') { ?>
                    <a href="../function/validasi.php?tolak=<?php echo $id_laporan ;?>" onclick="return confirm('Apakah Anda yakin akan menolak laporan ?')" class="btn btn-danger">Reject</a>
                    <?php } ?>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>NK Pelapor</th>
                                <td> <?php echo $nik ?></td>
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
                            </tr> -->
                            <!-- <tr>
                                <th>Korban</th>
                                <td><?php //echo $korban; ?></td>
                            </tr> -->
                            <!-- <tr>
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
                                <td><?php echo $no_hp, '/', $no_wa ; ?></td>
                            </tr>
                            <!-- <tr>
                                <th>Foto KTP</th>
                                <td><a href="../image/upload/laporan/ktp/<?php //echo $ktp; ?>" target="_blank"><img width="350px" src="../image/upload/laporan/ktp/<?php //echo $ktp; ?>" alt="Foto KTP"></a></td>
                            </tr> -->
                            <tr>
                                <th>Bukti</th>
                                <td><a href="../image/upload/laporan/bukti/<?php echo $bukti; ?>" target="_blank"><img width="350px" src="../image/upload/laporan/bukti/<?php echo $bukti; ?>" alt="Foto KTP"></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="sidebar-toggler" onclick="toggleSidebar()">☰ Menu</div>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script>
            function toggleSidebar() {
                var sidebar = document.querySelector('.sidebar');
                var content = document.querySelector('.content');
                sidebar.classList.toggle('active');
                content.classList.toggle('active');
            }
        </script>
    </body>

    </html>
<?php } ?>
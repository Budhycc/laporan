<?php
include '../include/config.php';
include '../include/function.php';

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$kode = generate_string($permitted_chars, 5);
$id = $_GET['cetak'];

$cek = mysqli_query($connect, "SELECT * FROM cetak WHERE id_laporan = '$id'");
if (mysqli_num_rows($cek) > 0) {
    // Kode sudah ada, tidak perlu melakukan apa-apa
} else {
    $query = "INSERT INTO cetak VALUES (NULL, '$id', '$kode')";
    $sql = mysqli_query($connect, $query);
}
$query = "SELECT * FROM cetak
INNER JOIN laporan ON laporan.id_laporan = cetak.id_laporan
WHERE cetak.id_laporan = '$id'";
$sql = mysqli_query($connect, $query);
$data = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kejadian</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            position: relative;
        }

        .card-body h5 {
            margin-bottom: 20px;
        }

        .logo {
            width: 100px;
            height: auto;
        }

        .logo-left {
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .logo-right {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group .col-form-label {
            font-weight: bold;
        }

        @media print {
            @page {
                /* size: landscape; */
                size: portrait;
            }
        }

        @media screen and (max-width: 768px) {
            .container {
                width: 100vw;
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 0;
            }

            .card {
                width: 100%;
                height: 100%;
                overflow: auto;
                border: none;
                box-shadow: none;
            }

            .card-header,
            .card-body {
                padding: 10px;
            }

            .card-header h5,
            .card-body h5 {
                font-size: 1.2rem;
            }

            .card-header p,
            .card-body .form-group {
                font-size: 1rem;
            }

            .form-group .col-form-label {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <img src="../image/logo.png" alt="Logo" class="logo logo-left">
                <img src="../image/logo.png" alt="Logo" class="logo logo-right">
                <h5>PEMERINTAH KOTA KENDARI</h5>
                <h5>SATUAN POLISI PAMONG PRAJA</h5>
                <p>Jl. Jend. Ahmad Yani, Mandonga, Kota Kendari, Sulawesi Tenggara Kode Pos, 93111.<br>Tel./Fax. (021)
                    7590 3830
                    Website: <a href="https://www.laporan-pengaduan.my.id">www.laporan-pengaduan.my.id</a>
                </p>
            </div>
            <div class="card-body">
                <h5 class="text-center">Bukti Laporan Online<br>Laporan Kejadian</h5>
                <form>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">NPMOR :</label>
                        <div class="col-sm-8">LK/ /SET-PPNS/ /</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Waktu Kejadian (Hari, Tanggal) :</label>
                        <div class="col-sm-8"><?php echo $data['tanggal_kejadian']; ?></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tempat Kejadian :</label>
                        <div class="col-sm-8"><?php echo $data['alamat_kejadian']; ?></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Apa yang terjadi :</label>
                        <div class="col-sm-8"><?php echo $data['yang_terjadi']; ?></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Siapa:</label>
                        <div class="col-sm-8">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">a.) Terlapor :</label>
                                <div class="col-sm-9"><?php echo $data['terlapor']; ?></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">b.) Korban :</label>
                                <div class="col-sm-9"><?php echo $data['korban']; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Bagaimana Terjadi :</label>
                        <div class="col-sm-8"><?php echo $data['bagaimana_terjadi']; ?></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Dilaporkan pada (Hari, Tgl, Jam) :</label>
                        <div class="col-sm-8"><?php echo $data['waktu_laporan']; ?></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tindak Pidana :</label>
                        <div class="col-sm-8"><?php echo $data['pidana']; ?></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Saksi :</label>
                        <div class="col-sm-8"><?php echo $data['saksi']; ?></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Uraian Kejadian :</label>
                        <div class="col-sm-8"><?php echo $data['kejadian']; ?></div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
        window.print();
    </script>
</body>

</html>
<?php
session_start();
if ($_SESSION == NULL) {
    header('location:../index.php');
    exit;
} else {
    include '../include/config.php';

    $total_proses = "SELECT COUNT(*) AS total FROM laporan WHERE status = 'diproses'";
    $sql_proses = mysqli_query($connect, $total_proses);
    $total_p = mysqli_fetch_assoc($sql_proses);

    $total_valid = "SELECT COUNT(*) AS total FROM laporan WHERE status = 'Valid'";
    $sql_valid = mysqli_query($connect, $total_valid);
    $total_v = mysqli_fetch_assoc($sql_valid);

    $total_klarifikasi = "SELECT COUNT(*) AS total FROM laporan WHERE status = 'Klarifikasi'";
    $sql_klarifikasi = mysqli_query($connect, $total_klarifikasi);
    $total_k = mysqli_fetch_assoc($sql_klarifikasi);

    $total_selesai = "SELECT COUNT(*) AS total FROM laporan WHERE status = 'Selesai'";
    $sql_selesai = mysqli_query($connect, $total_selesai);
    $total_s = mysqli_fetch_assoc($sql_selesai);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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

        .card {
            margin: 10px 0;
        }

        .card-body {
            padding: 1rem;
        }

        .card-header {
            text-align: center;
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

        .card {
            margin: 10px 0;
        }

        .card-body {
            padding: 1.7rem;
        }

        .card-header {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            color: #007bff;
            border: 1px solid #007bff;
            margin: 0 4px;
            border-radius: 5px;
        }

        .pagination a.active {
            background-color: #007bff;
            color: white;
        }

        .pagination a:hover {
            background-color: #e9ecef;
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
                <a class="navbar-brand" href="admin.php">Admin Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-3">
                    <a href="view.php?diproses">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header">PROSES</div>
                            <div class="card-body">
                                <h5 class="card-title">Total <?php echo $total_p['total']; ?></h5>
                                <p class="card-text">Laporan Yang akan di Proses</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="view.php?Valid">
                        <div class="card text-white bg-secondary mb-3">
                            <div class="card-header">VALIDASI</div>
                            <div class="card-body">
                                <h5 class="card-title">Total <?php echo $total_v['total']; ?></h5>
                                <p class="card-text">Laporan Yang akan di Validasi</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="view.php?Klarifikasi">
                        <div class="card text-white bg-secondary mb-3">
                            <div class="card-header">KLARIFIKASI</div>
                            <div class="card-body">
                                <h5 class="card-title">Total <?php echo $total_k['total']; ?></h5>
                                <p class="card-text">Laporan Yang akan di Klarifikasi</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="view.php?Selesai">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-header">SELESAI</div>
                            <div class="card-body">
                                <h5 class="card-title">Total <?php echo $total_s['total']; ?></h5>
                                <p class="card-text">Laporan Yang Sudah Tuntas</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <h2>Laporan Terbaru</h2>
            <form id="search-form" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control"
                        placeholder="Cari laporan Berdasarkan NIK Pelapor, Nama, Tentang...">
                    <button type="submit" class="btn btn-outline-secondary">Cari</button>
                </div>
            </form>
            <div id="table-container">
                <!-- Table will be loaded here -->
            </div>
            <div id="pagination-container" class="pagination">
                <!-- Pagination links will be loaded here -->
            </div>
        </div>
    </div>
    <div class="sidebar-toggler" onclick="toggleSidebar()">☰ Menu</div>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script>
        function toggleSidebar() {
            var sidebar = document.querySelector('.sidebar');
            var content = document.querySelector('.content');
            sidebar.classList.toggle('active');
            content.classList.toggle('active');
        }

        $(document).ready(function () {
            loadTable();

            function loadTable(page = 1) {
                var search = $('input[name="search"]').val();
                $.ajax({
                    url: '../function/load_table_admin.php',
                    type: 'GET',
                    data: { search: search, page: page },
                    dataType: 'json',
                    success: function (response) {
                        $('#table-container').html(response.table);
                        $('#pagination-container').html(response.pagination);
                    }
                });
            }

            $('#search-form').on('submit', function (e) {
                e.preventDefault();
                loadTable();
            });

            $(document).on('click', '.pagination a', function (e) {
                e.preventDefault();
                var page = $(this).data('page');
                loadTable(page);
            });
        });
    </script>
</body>

</html>
<?php
}
?>

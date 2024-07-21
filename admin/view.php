<?php
session_start();
if ($_SESSION == NULL) {
    header('location:../index.php');
} else {
    include '../include/config.php';

    // Mengatur halaman saat ini
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $records_per_page = 3;
    $offset = ($current_page - 1) * $records_per_page;

    if (isset($_GET['diproses'])) {
        $status = 'diproses';
    } else if (isset($_GET['Valid'])) {
        $status = 'Valid';
    } else if (isset($_GET['Klarifikasi'])) {
        $status = 'Klarifikasi';
    } else if (isset($_GET['Selesai'])) {
        $status = 'Selesai';
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Laporan</title>
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
                    <a class="navbar-brand" href="admin.php">Data Laporan</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <!-- <span class="navbar-toggler-icon"></span> -->
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <!-- Remove the following list items -->
                            <!--
                        <li class="nav-item">
                            <a class="nav-link" href="#">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Messages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Notifications</a>
                        </li>
                        -->
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container mt-4">
                <?php
                if ($status === 'diproses') {
                    echo '<h2>Laporan Yang Akan Di Proses</h2>';
                } else if ($status === 'Valid') {
                    echo '<h2>Laporan Yang Akan Di Validasi</h2>';
                } else if ($status === 'Klarifikasi') {
                    echo '<h2>Laporan Yang Akan Di Klarifikasi</h2>';
                } else if ($status === 'Selesai') {
                    echo '<h2>Laporan Yang Sudah Selesai</h2>';
                } else {
                    echo '<h2>Semua Data Laporan</h2>';
                }
                ?>
                <form id="search-form" method="GET" action="view.php" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="<?php echo $status; ?>" class="form-control"
                            placeholder="Cari laporan Berdasarkan NIK Pelapor, Nama, Tentang...">
                        <button type="submit" class="btn btn-outline-secondary">Cari</button>
                    </div>
                </form>
                <div id="table-container">
                    <!-- Table data will be loaded here via AJAX -->
                </div>
                <!-- Paginasi -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center" id="pagination">
                        <!-- Pagination links will be loaded here via AJAX -->
                    </ul>
                </nav>
            </div>
        </div>
        <div class="sidebar-toggler" onclick="toggleSidebar()">☰ Menu</div>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/jquery-3.6.0.min.js"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
        <script>
            function loadTable(page, status, search) {
                $.ajax({
                    url: '../function/load_table_view.php',
                    type: 'GET',
                    data: {
                        page: page,
                        status: status,
                        search: search
                    },
                    success: function(response) {
                        $('#table-container').html(response.table);
                        $('#pagination').html(response.pagination);
                    }
                });
            }

            $(document).ready(function() {
                var current_page = 1;
                var status = "<?php echo $status; ?>";
                var search = '';

                loadTable(current_page, status, search);

                $(document).on('click', '.page-link', function(e) {
                    e.preventDefault();
                    current_page = $(this).data('page');
                    loadTable(current_page, status, search);
                });

                $('#search-form').submit(function(e) {
                    e.preventDefault();
                    search = $(this).find('input[name="<?php echo $status; ?>"]').val();
                    loadTable(1, status, search);
                });
            });

            function toggleSidebar() {
                var sidebar = document.querySelector('.sidebar');
                var content = document.querySelector('.content');
                sidebar.classList.toggle('active');
                content.classList.toggle('active');
            }
        </script>
    </body>
    </html>
    <?php
}
?>

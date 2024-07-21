<?php
session_start();
include 'include/config.php';

// Mengatur halaman saat ini
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$records_per_page = 3;
$offset = ($current_page - 1) * $records_per_page;

if (isset($_POST['nik'])) {
    $status = isset($_POST['nik']) ? $_POST['nik'] : '';
} else if (isset($_GET['no'])) {
    $status = isset($_GET['no']) ? $_GET['no']: '';
} else {
    header('Location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Laporan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            height: 100vh;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="container mt-4">
            <a class="btn btn-primary mb-3" href="index.php">KEMBALI</a>
            <form id="search-form" method="GET" action="view.php" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control"
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
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script>
        function loadTable(page, status, search) {
            $.ajax({
                url: 'function/cek_laporan.php',
                type: 'GET',
                data: {
                    page: page,
                    status: status,
                    search: search
                },
                success: function (response) {
                    $('#table-container').html(response.table);
                    $('#pagination').html(response.pagination);
                }
            });
        }

        $(document).ready(function () {
            var current_page = 1;
            var status = "<?php echo $status; ?>";
            var search = '';

            loadTable(current_page, status, search);

            $(document).on('click', '.page-link', function (e) {
                e.preventDefault();
                current_page = $(this).data('page');
                loadTable(current_page, status, search);
            });

            $('#search-form').submit(function (e) {
                e.preventDefault();
                search = $(this).find('input[name="search"]').val();
                loadTable(1, status, search);
            });
        });
    </script>
</body>

</html>
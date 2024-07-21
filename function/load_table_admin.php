<?php
session_start();
if ($_SESSION == NULL) {
    header('location:../index.php');
    exit;
} else {
    include '../include/config.php';

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $records_per_page = 10;
    $offset = ($current_page - 1) * $records_per_page;

    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $where_clause = "";
    if ($search) {
        $where_clause = "WHERE nik LIKE '%$search%' OR nama LIKE '%$search%' OR yang_terjadi LIKE '%$search%'";
    }

    $query = "SELECT * FROM laporan $where_clause ORDER BY id_laporan DESC LIMIT $offset, $records_per_page";
    $sql = mysqli_query($connect, $query);

    $total_records_query = "SELECT COUNT(*) AS total_rows FROM laporan $where_clause";
    $total_records_result = mysqli_query($connect, $total_records_query);
    $total_records = mysqli_fetch_assoc($total_records_result)['total_rows'];

    $total_pages = ceil($total_records / $records_per_page);

    $start_number = ($current_page - 1) * $records_per_page + 1;

    $response = [
        'table' => '',
        'pagination' => ''
    ];

    $response['table'] .= '<table class="table table-bordered">';
    $response['table'] .= '<thead>';
    $response['table'] .= '<tr>';
    $response['table'] .= '<th>No</th>';
    $response['table'] .= '<th>NIK Pelapor</th>';
    $response['table'] .= '<th>Nama Pelapor</th>';
    $response['table'] .= '<th>Apa Yang Terjadi</th>';
    $response['table'] .= '<th>Bagaimana</th>';
    $response['table'] .= '<th>Status</th>';
    $response['table'] .= '<th>Opsi</th>';
    $response['table'] .= '</tr>';
    $response['table'] .= '</thead>';
    $response['table'] .= '<tbody>';

    $row_number = $start_number;
    while ($data = mysqli_fetch_assoc($sql)) {
        $response['table'] .= "<tr>";
        $response['table'] .= "<td>" . $row_number . "</td>";
        $response['table'] .= "<td>" . $data['nik'] . "</td>";
        $response['table'] .= "<td>" . $data['nama'] . "</td>";
        $response['table'] .= "<td>" . $data['yang_terjadi'] . "</td>";
        $response['table'] .= "<td>" . $data['bagaimana_terjadi'] . "</td>";
        $response['table'] .= "<td>" . $data['status'] . "</td>";
        $response['table'] .= '<td><a href="laporan.php?view=' . $data['id_laporan'] . '" target="_blank" class="btn btn-primary">Lihat</a><a href="../function/proses_laporan.php?delete_a=' . $data['id_laporan'] . '" class="btn btn-danger" onclick="return confirm(\'Apakah Anda yakin akan menghapus laporan ?\')">Hapus</a></td>';
        $response['table'] .= "</tr>";
        $row_number++;
    }

    $response['table'] .= '</tbody>';
    $response['table'] .= '</table>';

    if ($total_pages > 1) {
        $response['pagination'] .= '<ul class="pagination">';

        if ($current_page > 1) {
            $response['pagination'] .= '<li class="page-item">';
            $response['pagination'] .= '<a class="page-link" href="#" data-page="' . ($current_page - 1) . '" aria-label="Previous">';
            $response['pagination'] .= '<span aria-hidden="true">&laquo;</span>';
            $response['pagination'] .= '</a>';
            $response['pagination'] .= '</li>';
        }

        for ($i = 1; $i <= $total_pages; $i++) {
            $response['pagination'] .= '<li class="page-item ' . ($i == $current_page ? 'active' : '') . '">';
            $response['pagination'] .= '<a class="page-link" href="#" data-page="' . $i . '">' . $i . '</a>';
            $response['pagination'] .= '</li>';
        }

        if ($current_page < $total_pages) {
            $response['pagination'] .= '<li class="page-item">';
            $response['pagination'] .= '<a class="page-link" href="#" data-page="' . ($current_page + 1) . '" aria-label="Next">';
            $response['pagination'] .= '<span aria-hidden="true">&raquo;</span>';
            $response['pagination'] .= '</a>';
            $response['pagination'] .= '</li>';
        }

        $response['pagination'] .= '</ul>';
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
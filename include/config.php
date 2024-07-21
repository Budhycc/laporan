<?php

$server = "localhost";
$user = "root";
$password = "090701";
$database = "laporan";

// $server = "localhost";
// $user = "laporanp_laporan";
// $password = "BFbQ4fMRVrTDdTTe2x9j";
// $database = "laporanp_laporan";

$connect = mysqli_connect($server, $user, $password, $database);

if (!$connect) {
    die("<script>alert('Gagal tersambung.')</script>");
}

?>
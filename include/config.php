<?php

$server = "localhost";
$user = "root";
$password = "090701";
$database = "laporan";

$connect = mysqli_connect($server, $user, $password, $database);

if (!$connect) {
    die("<script>alert('Gagal tersambung.')</script>");
}

?>
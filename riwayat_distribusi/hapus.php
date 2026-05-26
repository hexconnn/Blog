<?php

include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($conn,"
DELETE FROM riwayat_distribusi
WHERE id_riwayat='$id'
");

header("location:index.php");

?>
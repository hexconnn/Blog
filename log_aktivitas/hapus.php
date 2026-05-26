<?php

include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($conn,"
DELETE FROM log_aktivitas
WHERE id_log='$id'
");

header("location:index.php");

?>
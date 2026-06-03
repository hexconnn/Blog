<?php

include '../koneksi.php';

$id = $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM wilayah
WHERE id_wilayah='$id'"
);

header("location:index.php");

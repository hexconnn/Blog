<?php

include '../koneksi.php';

$id = $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM user
WHERE id_user='$id'"
);

header("location:index.php");

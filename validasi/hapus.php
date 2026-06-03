<?php

include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($conn, "
DELETE FROM validasi
WHERE id_validasi='$id'
");

header("location:index.php");

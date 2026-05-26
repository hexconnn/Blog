<?php

include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($conn,
"DELETE FROM kategori_bantuan
WHERE id_kategori='$id'");

header("location:index.php");

?>
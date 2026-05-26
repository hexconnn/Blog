<?php

include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($conn,
"DELETE FROM penerima
WHERE id_penerima='$id'");

header("location:index.php");

?>
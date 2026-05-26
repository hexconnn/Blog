<?php

include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($conn,
"DELETE FROM distribusi
WHERE id_distribusi='$id'");

header("location:index.php");

?>
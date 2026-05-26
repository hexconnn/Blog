<?php

include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($conn,
"DELETE FROM bantuan
WHERE id_bantuan='$id'");

header("location:index.php");

?>
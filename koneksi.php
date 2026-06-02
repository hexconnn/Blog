<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "bansos_db"
);

if($conn){
    //echo "Koneksi berhasil";
}else{
    echo "Koneksi gagal";
}

?>
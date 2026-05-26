<?php

$conn = mysqli_connect(
    "127.0.0.1:3307",
    "root",
    "",
    "bansos_db"
);

if($conn){
    echo "Koneksi berhasil";
}else{
    echo "Koneksi gagal";
}

?>
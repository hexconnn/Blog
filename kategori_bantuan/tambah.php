<?php
include '../koneksi.php';

if(isset($_POST['simpan'])){

    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query($conn,"
    INSERT INTO kategori_bantuan
    (
        nama_kategori,
        deskripsi
    )
    VALUES
    (
        '$nama',
        '$deskripsi'
    )
    ");

    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Tambah Kategori</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">

            <h4>
                Tambah Kategori Bantuan
            </h4>

        </div>

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">

                    <label>Nama Kategori</label>

                    <input type="text"
                    name="nama"
                    class="form-control"
                    required>

                </div>

                <div class="mb-3">

                    <label>Deskripsi</label>

                    <textarea
                    name="deskripsi"
                    class="form-control"
                    required></textarea>

                </div>

                <button
                type="submit"
                name="simpan"
                class="btn btn-primary">

                    Simpan

                </button>

                <a href="index.php"
                class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>
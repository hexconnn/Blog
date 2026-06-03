<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {

    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $kabupaten = $_POST['kabupaten'];
    $provinsi = $_POST['provinsi'];

    mysqli_query($conn, "
    INSERT INTO wilayah
    (
        nama_desa,
        kecamatan,
        kabupaten,
        provinsi
    )
    VALUES
    (
        '$desa',
        '$kecamatan',
        '$kabupaten',
        '$provinsi'
    )
    ");

    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Tambah Wilayah</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow border-0">

            <div class="card-header bg-primary text-white">

                <h4>
                    Tambah Data Wilayah
                </h4>

            </div>

            <div class="card-body">

                <form method="POST">

                    <div class="mb-3">

                        <label>Nama Desa</label>

                        <input type="text"
                            name="desa"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-3">

                        <label>Kecamatan</label>

                        <input type="text"
                            name="kecamatan"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-3">

                        <label>Kabupaten</label>

                        <input type="text"
                            name="kabupaten"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-3">

                        <label>Provinsi</label>

                        <input type="text"
                            name="provinsi"
                            class="form-control"
                            required>

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
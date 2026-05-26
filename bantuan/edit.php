<?php
include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM bantuan
WHERE id_bantuan='$id'");

$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){

    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $jumlah = $_POST['jumlah'];
    $satuan = $_POST['satuan'];

    mysqli_query($conn,"
    UPDATE bantuan SET
    nama_bantuan='$nama',
    jenis_bantuan='$jenis',
    jumlah='$jumlah',
    satuan='$satuan'
    WHERE id_bantuan='$id'
    ");

    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Edit Bantuan</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow border-0">

        <div class="card-header bg-warning">

            <h4>
                Edit Data Bantuan
            </h4>

        </div>

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">

                    <label>Nama Bantuan</label>

                    <input type="text"
                    name="nama"
                    class="form-control"
                    value="<?= $d['nama_bantuan']; ?>">

                </div>

                <div class="mb-3">

                    <label>Jenis Bantuan</label>

                    <input type="text"
                    name="jenis"
                    class="form-control"
                    value="<?= $d['jenis_bantuan']; ?>">

                </div>

                <div class="mb-3">

                    <label>Jumlah</label>

                    <input type="number"
                    name="jumlah"
                    class="form-control"
                    value="<?= $d['jumlah']; ?>">

                </div>

                <div class="mb-3">

                    <label>Satuan</label>

                    <input type="text"
                    name="satuan"
                    class="form-control"
                    value="<?= $d['satuan']; ?>">

                </div>

                <button
                type="submit"
                name="update"
                class="btn btn-warning">

                    Update

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
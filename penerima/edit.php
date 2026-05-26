<?php
include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM penerima
WHERE id_penerima='$id'");

$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){

    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $status = $_POST['status'];

    mysqli_query($conn,"
    UPDATE penerima SET
    nama='$nama',
    nik='$nik',
    alamat='$alamat',
    no_hp='$no_hp',
    status_ekonomi='$status'
    WHERE id_penerima='$id'
    ");

    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Edit Data</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow border-0">

        <div class="card-header bg-warning">

            <h4>
                Edit Data Penerima
            </h4>

        </div>

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">

                    <label>Nama</label>

                    <input type="text"
                    name="nama"
                    class="form-control"
                    value="<?= $d['nama']; ?>">

                </div>

                <div class="mb-3">

                    <label>NIK</label>

                    <input type="text"
                    name="nik"
                    class="form-control"
                    value="<?= $d['nik']; ?>">

                </div>

                <div class="mb-3">

                    <label>Alamat</label>

                    <textarea
                    name="alamat"
                    class="form-control"><?= $d['alamat']; ?></textarea>

                </div>

                <div class="mb-3">

                    <label>No HP</label>

                    <input type="text"
                    name="no_hp"
                    class="form-control"
                    value="<?= $d['no_hp']; ?>">

                </div>

                <div class="mb-3">

                    <label>Status Ekonomi</label>

                    <input type="text"
                    name="status"
                    class="form-control"
                    value="<?= $d['status_ekonomi']; ?>">

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
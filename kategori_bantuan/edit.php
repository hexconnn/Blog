<?php
include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM kategori_bantuan
WHERE id_kategori='$id'");

$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){

    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query($conn,"
    UPDATE kategori_bantuan SET
    nama_kategori='$nama',
    deskripsi='$deskripsi'
    WHERE id_kategori='$id'
    ");

    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Edit Kategori</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow border-0">

        <div class="card-header bg-warning">

            <h4>
                Edit Kategori Bantuan
            </h4>

        </div>

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">

                    <label>Nama Kategori</label>

                    <input type="text"
                    name="nama"
                    class="form-control"
                    value="<?= $d['nama_kategori']; ?>">

                </div>

                <div class="mb-3">

                    <label>Deskripsi</label>

                    <textarea
                    name="deskripsi"
                    class="form-control"><?= $d['deskripsi']; ?></textarea>

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
<?php
include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM wilayah
WHERE id_wilayah='$id'"
);

$d = mysqli_fetch_array($data);

if (isset($_POST['update'])) {

    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $kabupaten = $_POST['kabupaten'];
    $provinsi = $_POST['provinsi'];

    mysqli_query($conn, "
    UPDATE wilayah SET
    nama_desa='$desa',
    kecamatan='$kecamatan',
    kabupaten='$kabupaten',
    provinsi='$provinsi'
    WHERE id_wilayah='$id'
    ");

    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Edit Wilayah</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow border-0">

            <div class="card-header bg-warning">

                <h4>
                    Edit Data Wilayah
                </h4>

            </div>

            <div class="card-body">

                <form method="POST">

                    <div class="mb-3">

                        <label>Nama Desa</label>

                        <input type="text"
                            name="desa"
                            class="form-control"
                            value="<?= $d['nama_desa']; ?>">

                    </div>

                    <div class="mb-3">

                        <label>Kecamatan</label>

                        <input type="text"
                            name="kecamatan"
                            class="form-control"
                            value="<?= $d['kecamatan']; ?>">

                    </div>

                    <div class="mb-3">

                        <label>Kabupaten</label>

                        <input type="text"
                            name="kabupaten"
                            class="form-control"
                            value="<?= $d['kabupaten']; ?>">

                    </div>

                    <div class="mb-3">

                        <label>Provinsi</label>

                        <input type="text"
                            name="provinsi"
                            class="form-control"
                            value="<?= $d['provinsi']; ?>">

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
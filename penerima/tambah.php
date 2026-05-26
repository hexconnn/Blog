<?php
include '../koneksi.php';

if(isset($_POST['simpan'])){

    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $status = $_POST['status'];
    $wilayah = $_POST['wilayah'];

    mysqli_query($conn,"
    INSERT INTO penerima
    (nama, nik, alamat, no_hp, status_ekonomi, id_wilayah)
    VALUES
    ('$nama','$nik','$alamat','$no_hp','$status','$wilayah')
    ");

    header("location:index.php");
}

$wilayah = mysqli_query($conn,"SELECT * FROM wilayah");
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<title>Tambah Data</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">
            <h4>Tambah Data Penerima</h4>
        </div>

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text"
                    name="nama"
                    class="form-control"
                    required>
                </div>

                <div class="mb-3">
                    <label>NIK</label>
                    <input type="text"
                    name="nik"
                    class="form-control"
                    required>
                </div>

                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat"
                    class="form-control"
                    required></textarea>
                </div>

                <div class="mb-3">
                    <label>No HP</label>
                    <input type="text"
                    name="no_hp"
                    class="form-control">
                </div>

                <div class="mb-3">
                    <label>Status Ekonomi</label>
                    <input type="text"
                    name="status"
                    class="form-control">
                </div>

                <div class="mb-3">
                    <label>Wilayah</label>

                    <select name="wilayah"
                    class="form-select">

                        <?php while($w =
                        mysqli_fetch_array($wilayah)){ ?>

                        <option value="<?= $w['id_wilayah']; ?>">
                            <?= $w['nama_desa']; ?>
                        </option>

                        <?php } ?>

                    </select>
                </div>

                <button type="submit"
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
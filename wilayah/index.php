<?php
include '../koneksi.php';

$data = mysqli_query($conn,
"SELECT * FROM wilayah");
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Data Wilayah</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2 class="fw-bold">
            Data Wilayah
        </h2>

        <a href="tambah.php"
        class="btn btn-primary">

            + Tambah Wilayah

        </a>

    </div>

    <div class="card shadow border-0">

        <div class="card-body">

            <table class="table table-bordered table-hover">

                <thead class="table-info">

                    <tr>

                        <th>No</th>
                        <th>Nama Desa</th>
                        <th>Kecamatan</th>
                        <th>Kabupaten</th>
                        <th>Provinsi</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                <?php
                $no = 1;

                while($d = mysqli_fetch_array($data)){
                ?>

                <tr>

                    <td><?= $no++; ?></td>

                    <td><?= $d['nama_desa']; ?></td>

                    <td><?= $d['kecamatan']; ?></td>

                    <td><?= $d['kabupaten']; ?></td>

                    <td><?= $d['provinsi']; ?></td>

                    <td>

                        <a href="edit.php?id=<?= $d['id_wilayah']; ?>"
                        class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <a href="hapus.php?id=<?= $d['id_wilayah']; ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin hapus data?')">

                            Hapus

                        </a>

                    </td>

                </tr>

                <?php } ?>

                </tbody>

            </table>

            <a href="../index.php"
            class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

</div>

</body>
</html>
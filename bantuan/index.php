<?php
include '../koneksi.php';

$data = mysqli_query($conn,"
SELECT bantuan.*, kategori_bantuan.nama_kategori
FROM bantuan
JOIN kategori_bantuan
ON bantuan.id_kategori = kategori_bantuan.id_kategori
");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>Data Bantuan</title>

    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2 class="fw-bold">
            Data Bantuan Sosial
        </h2>

        <a href="tambah.php"
        class="btn btn-primary">

            + Tambah Bantuan

        </a>

    </div>

    <div class="card shadow border-0">

        <div class="card-body">

            <table class="table table-bordered table-hover">

                <thead class="table-success">

                    <tr>

                        <th>No</th>
                        <th>Nama Bantuan</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Kategori</th>
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
                    <td><?= $d['nama_bantuan']; ?></td>
                    <td><?= $d['jenis_bantuan']; ?></td>
                    <td><?= $d['jumlah']; ?></td>
                    <td><?= $d['satuan']; ?></td>
                    <td><?= $d['nama_kategori']; ?></td>

                    <td>

                        <a href="edit.php?id=<?= $d['id_bantuan']; ?>"
                        class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <a href="hapus.php?id=<?= $d['id_bantuan']; ?>"
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
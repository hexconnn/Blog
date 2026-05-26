<?php
include '../koneksi.php';

$data = mysqli_query($conn,"
SELECT distribusi.*,
penerima.nama,
bantuan.nama_bantuan,
user.username

FROM distribusi

JOIN penerima
ON distribusi.id_penerima = penerima.id_penerima

JOIN bantuan
ON distribusi.id_bantuan = bantuan.id_bantuan

JOIN user
ON distribusi.id_petugas = user.id_user
");
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Data Distribusi</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2 class="fw-bold">
            Data Distribusi Bantuan
        </h2>

        <a href="tambah.php"
        class="btn btn-primary">

            + Tambah Distribusi

        </a>

    </div>

    <div class="card shadow border-0">

        <div class="card-body">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>

                        <th>No</th>
                        <th>Penerima</th>
                        <th>Bantuan</th>
                        <th>Petugas</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                <?php
                $no = 1;

                while($d =
                mysqli_fetch_array($data)){
                ?>

                <tr>

                    <td><?= $no++; ?></td>

                    <td><?= $d['nama']; ?></td>

                    <td><?= $d['nama_bantuan']; ?></td>

                    <td><?= $d['username']; ?></td>

                    <td><?= $d['tanggal']; ?></td>

                    <td><?= $d['status']; ?></td>

                    <td>

                        <a href="edit.php?id=<?= $d['id_distribusi']; ?>"
                        class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <a href="hapus.php?id=<?= $d['id_distribusi']; ?>"
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
<?php
include '../koneksi.php';

$data = mysqli_query($conn,"
SELECT log_aktivitas.*,
user.username

FROM log_aktivitas

JOIN user
ON log_aktivitas.id_user = user.id_user
");
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Log Aktivitas</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">
            Log Aktivitas
        </h2>

        <a href="tambah.php"
        class="btn btn-primary">

            + Tambah Log

        </a>

    </div>

    <div class="card shadow border-0">

        <div class="card-body">

            <table class="table table-bordered table-hover">

                <thead class="table-dark text-center">

                    <tr>

                        <th>No</th>
                        <th>User</th>
                        <th>Aktivitas</th>
                        <th>Waktu</th>
                        <th width="170">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                <?php
                $no = 1;

                while($d =
                mysqli_fetch_array($data)){
                ?>

                <tr>

                    <td class="text-center">
                        <?= $no++; ?>
                    </td>

                    <td>
                        <?= $d['username']; ?>
                    </td>

                    <td>
                        <?= $d['aktivitas']; ?>
                    </td>

                    <td>
                        <?= $d['waktu']; ?>
                    </td>

                    <td class="text-center">

                        <a href="edit.php?id=<?= $d['id_log']; ?>"
                        class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <a href="hapus.php?id=<?= $d['id_log']; ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin menghapus data?')">

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
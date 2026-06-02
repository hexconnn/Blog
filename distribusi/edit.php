<?php
include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM distribusi
WHERE id_distribusi='$id'"
);

$d = mysqli_fetch_array($data);

$penerima = mysqli_query(
    $conn,
    "SELECT * FROM penerima"
);

$bantuan = mysqli_query(
    $conn,
    "SELECT * FROM bantuan"
);

$petugas = mysqli_query(
    $conn,
    "SELECT * FROM petugas"
);

if (isset($_POST['update'])) {

    $penerima2 = $_POST['penerima'];
    $bantuan2 = $_POST['bantuan'];
    $petugas2 = $_POST['petugas'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    mysqli_query($conn, "
    UPDATE distribusi SET

    id_penerima='$penerima2',
    id_bantuan='$bantuan2',
    id_petugas='$petugas2',
    tanggal='$tanggal',
    status='$status'

    WHERE id_distribusi='$id'
    ");

    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Edit Distribusi</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow border-0">

            <div class="card-header bg-warning">

                <h4>
                    Edit Distribusi
                </h4>

            </div>

            <div class="card-body">

                <form method="POST">

                    <div class="mb-3">

                        <label>Penerima</label>

                        <select
                            name="penerima"
                            class="form-select">

                            <?php
                            while ($p =
                                mysqli_fetch_array($penerima)
                            ) {
                            ?>

                                <option
                                    value="<?= $p['id_penerima']; ?>">

                                    <?= $p['nama']; ?>

                                </option>

                            <?php } ?>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label>Bantuan</label>

                        <select
                            name="bantuan"
                            class="form-select">

                            <?php
                            while ($b =
                                mysqli_fetch_array($bantuan)
                            ) {
                            ?>

                                <option
                                    value="<?= $b['id_bantuan']; ?>">

                                    <?= $b['nama_bantuan']; ?>

                                </option>

                            <?php } ?>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label>Petugas</label>

                        <select
                            name="petugas"
                            class="form-select">

                            <?php
                            while ($u = mysqli_fetch_array($petugas)) {
                            ?>
                                <option value="<?= $u['id_petugas']; ?>">
                                    <?= $u['nama']; ?> - <?= $u['jabatan']; ?>
                                </option>
                            <?php } ?>
                        </select>

                    </div>

                    <div class="mb-3">

                        <label>Tanggal</label>

                        <input type="date"
                            name="tanggal"
                            class="form-control"
                            value="<?= $d['tanggal']; ?>">

                    </div>

                    <div class="mb-3">

                        <label>Status</label>

                        <select
                            name="status"
                            class="form-select">

                            <option value="Pending">
                                Pending
                            </option>

                            <option value="Diproses">
                                Diproses
                            </option>

                            <option value="Selesai">
                                Selesai
                            </option>

                        </select>

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
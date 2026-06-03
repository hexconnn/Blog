<?php
include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM validasi
WHERE id_validasi='$id'"
);

$d = mysqli_fetch_array($data);

if (isset($_POST['update'])) {

    $status = $_POST['status'];
    $tanggal = $_POST['tanggal'];

    mysqli_query($conn, "
    UPDATE validasi SET

    status_validasi='$status',
    tanggal_validasi='$tanggal'

    WHERE id_validasi='$id'
    ");

    header("location:index.php");
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit Validasi</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-warning">

                <h4>Edit Validasi</h4>

            </div>

            <div class="card-body">

                <form method="POST">

                    <div class="mb-3">

                        <label>Status</label>

                        <select
                            name="status"
                            class="form-select">

                            <option value="Layak">
                                Layak
                            </option>

                            <option value="Tidak Layak">
                                Tidak Layak
                            </option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label>Tanggal</label>

                        <input type="date"
                            name="tanggal"
                            class="form-control"
                            value="<?= $d['tanggal_validasi']; ?>">

                    </div>

                    <button
                        type="submit"
                        name="update"
                        class="btn btn-warning">

                        Update

                    </button>

                </form>

            </div>

        </div>

    </div>

</body>

</html>
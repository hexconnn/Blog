<?php
include '../koneksi.php';

if(isset($_POST['simpan'])){

    $penerima = $_POST['penerima'];
    $status = $_POST['status'];
    $tanggal = $_POST['tanggal'];

    mysqli_query($conn, "
    INSERT INTO validasi
    (
        id_penerima,
        status_validasi,
        tanggal_validasi
    )
    VALUES
    (
        '$penerima',
        '$status',
        '$tanggal'
    )
    ");

    header("location:index.php");
}

$penerima = mysqli_query($conn,
"SELECT * FROM penerima");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Validasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">
            <h4>Tambah Validasi</h4>
        </div>

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Nama Penerima
                    </label>

                    <select name="penerima"
                    class="form-select">

                        <?php
                        while($p =
                        mysqli_fetch_array($penerima)){
                        ?>

                        <option value="<?= $p['id_penerima']; ?>">

                            <?= $p['nama']; ?>

                        </option>

                        <?php } ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Status Validasi
                    </label>

                    <select name="status"
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

                    <label class="form-label">
                        Tanggal Validasi
                    </label>

                    <input type="date"
                    name="tanggal"
                    class="form-control">

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
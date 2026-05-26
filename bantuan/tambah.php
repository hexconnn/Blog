<?php
include '../koneksi.php';

if(isset($_POST['simpan'])){

    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $jumlah = $_POST['jumlah'];
    $satuan = $_POST['satuan'];
    $kategori = $_POST['kategori'];

    mysqli_query($conn,"
    INSERT INTO bantuan
    (nama_bantuan, jenis_bantuan, jumlah, satuan, id_kategori)
    VALUES
    ('$nama','$jenis','$jumlah','$satuan','$kategori')
    ");

    header("location:index.php");
}

$kategori = mysqli_query($conn,
"SELECT * FROM kategori_bantuan");
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Tambah Bantuan</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow border-0">

        <div class="card-header bg-success text-white">

            <h4>
                Tambah Data Bantuan
            </h4>

        </div>

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">

                    <label>Nama Bantuan</label>

                    <input type="text"
                    name="nama"
                    class="form-control"
                    required>

                </div>

                <div class="mb-3">

                    <label>Jenis Bantuan</label>

                    <input type="text"
                    name="jenis"
                    class="form-control"
                    required>

                </div>

                <div class="mb-3">

                    <label>Jumlah</label>

                    <input type="number"
                    name="jumlah"
                    class="form-control"
                    required>

                </div>

                <div class="mb-3">

                    <label>Satuan</label>

                    <input type="text"
                    name="satuan"
                    class="form-control"
                    required>

                </div>

                <div class="mb-3">

                    <label>Kategori</label>

                    <select
                    name="kategori"
                    class="form-select">

                        <?php
                        while($k =
                        mysqli_fetch_array($kategori)){
                        ?>

                        <option
                        value="<?= $k['id_kategori']; ?>">

                            <?= $k['nama_kategori']; ?>

                        </option>

                        <?php } ?>

                    </select>

                </div>

                <button
                type="submit"
                name="simpan"
                class="btn btn-success">

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
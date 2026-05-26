<?php
include '../koneksi.php';

if(isset($_POST['simpan'])){

    $distribusi = $_POST['distribusi'];
    $status = $_POST['status'];
    $tanggal = $_POST['tanggal'];

    mysqli_query($conn,"
    INSERT INTO riwayat_distribusi
    (
        id_distribusi,
        status,
        tanggal_update
    )
    VALUES
    (
        '$distribusi',
        '$status',
        '$tanggal'
    )
    ");

    header("location:index.php");
}

$distribusi = mysqli_query($conn,"
SELECT distribusi.id_distribusi,
penerima.nama,
bantuan.nama_bantuan

FROM distribusi

JOIN penerima
ON distribusi.id_penerima =
penerima.id_penerima

JOIN bantuan
ON distribusi.id_bantuan =
bantuan.id_bantuan
");
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Tambah Riwayat</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow border-0">

<div class="card-header bg-primary text-white">

<h4>
Tambah Riwayat Distribusi
</h4>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label>Distribusi</label>

<select
name="distribusi"
class="form-select">

<?php
while($d =
mysqli_fetch_array($distribusi)){
?>

<option
value="<?= $d['id_distribusi']; ?>">

<?= $d['nama']; ?>
-
<?= $d['nama_bantuan']; ?>

</option>

<?php } ?>

</select>

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

<div class="mb-3">

<label>Tanggal Update</label>

<input type="date"
name="tanggal"
class="form-control">

</div>

<button
type="submit"
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
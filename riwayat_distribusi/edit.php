<?php
include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,"
SELECT * FROM riwayat_distribusi
WHERE id_riwayat='$id'
");

$d = mysqli_fetch_array($data);

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

if(isset($_POST['update'])){

    $distribusi2 = $_POST['distribusi'];
    $status = $_POST['status'];
    $tanggal = $_POST['tanggal'];

    mysqli_query($conn,"
    UPDATE riwayat_distribusi SET

    id_distribusi='$distribusi2',
    status='$status',
    tanggal_update='$tanggal'

    WHERE id_riwayat='$id'
    ");

    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Edit Riwayat</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow border-0">

<div class="card-header bg-warning">

<h4>
Edit Riwayat Distribusi
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
while($r =
mysqli_fetch_array($distribusi)){
?>

<option
value="<?= $r['id_distribusi']; ?>">

<?= $r['nama']; ?>
-
<?= $r['nama_bantuan']; ?>

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
class="form-control"
value="<?= $d['tanggal_update']; ?>">

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
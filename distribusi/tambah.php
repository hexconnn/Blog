<?php
include '../koneksi.php';

if(isset($_POST['simpan'])){

    $penerima = $_POST['penerima'];
    $bantuan = $_POST['bantuan'];
    $petugas = $_POST['petugas'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    mysqli_query($conn,"
    INSERT INTO distribusi
    (
        id_penerima,
        id_bantuan,
        id_petugas,
        tanggal,
        status
    )
    VALUES
    (
        '$penerima',
        '$bantuan',
        '$petugas',
        '$tanggal',
        '$status'
    )
    ");

    header("location:index.php");
}

$penerima = mysqli_query($conn,
"SELECT * FROM penerima");

$bantuan = mysqli_query($conn,
"SELECT * FROM bantuan");

$petugas = mysqli_query($conn,
"SELECT * FROM user");
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Tambah Distribusi</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow border-0">

<div class="card-header bg-primary text-white">

<h4>
Tambah Distribusi Bantuan
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
while($p =
mysqli_fetch_array($penerima)){
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
while($b =
mysqli_fetch_array($bantuan)){
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
while($u =
mysqli_fetch_array($petugas)){
?>

<option
value="<?= $u['id_user']; ?>">

<?= $u['username']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label>Tanggal</label>

<input type="date"
name="tanggal"
class="form-control">

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
<?php
include '../koneksi.php';

if(isset($_POST['simpan'])){

    $user = $_POST['user'];
    $aktivitas = $_POST['aktivitas'];
    $waktu = $_POST['waktu'];

    mysqli_query($conn,"
    INSERT INTO log_aktivitas
    (
        id_user,
        aktivitas,
        waktu
    )
    VALUES
    (
        '$user',
        '$aktivitas',
        '$waktu'
    )
    ");

    header("location:index.php");
}

$user = mysqli_query($conn,
"SELECT * FROM user");
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Tambah Log Aktivitas</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow border-0">

<div class="card-header bg-primary text-white">

<h4>
Tambah Log Aktivitas
</h4>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label>User</label>

<select
name="user"
class="form-select">

<?php
while($u =
mysqli_fetch_array($user)){
?>

<option
value="<?= $u['id_user']; ?>">

<?= $u['username']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label>Aktivitas</label>

<textarea
name="aktivitas"
class="form-control"></textarea>

</div>

<div class="mb-3">

<label>Waktu</label>

<input type="datetime-local"
name="waktu"
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
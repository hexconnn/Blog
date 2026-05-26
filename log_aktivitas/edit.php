<?php
include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,"
SELECT * FROM log_aktivitas
WHERE id_log='$id'
");

$d = mysqli_fetch_array($data);

$user = mysqli_query($conn,
"SELECT * FROM user");

if(isset($_POST['update'])){

    $user2 = $_POST['user'];
    $aktivitas = $_POST['aktivitas'];
    $waktu = $_POST['waktu'];

    mysqli_query($conn,"
    UPDATE log_aktivitas SET

    id_user='$user2',
    aktivitas='$aktivitas',
    waktu='$waktu'

    WHERE id_log='$id'
    ");

    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Edit Log Aktivitas</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow border-0">

<div class="card-header bg-warning">

<h4>
Edit Log Aktivitas
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
class="form-control"><?= $d['aktivitas']; ?></textarea>

</div>

<div class="mb-3">

<label>Waktu</label>

<input type="datetime-local"
name="waktu"
class="form-control"
value="<?= $d['waktu']; ?>">

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
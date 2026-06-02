<?php
include '../koneksi.php';

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $no_hp = $_POST['no_hp'];

    mysqli_query($conn,"INSERT INTO petugas (nama, jabatan, no_hp) VALUES ('$nama', '$jabatan', '$no_hp')");
    // Setelah simpan, arahkan kembali ke form distribusi agar bisa langsung dipakai
    header("location:../distribusi/tambah.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Petugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white">
            <h4>Tambah Data Petugas</h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control" required>
                </div>
                <button type="submit" name="simpan" class="btn btn-primary">Simpan Data</button>
                <a href="../index.php" class="btn btn-secondary">Kembali ke Home</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
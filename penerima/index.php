<?php
include '../koneksi.php';

// Inisialisasi variabel keyword pencarian
$keyword = "";
if (isset($_GET['search'])) {
    $keyword = mysqli_real_escape_string($conn, $_GET['search']);
}

// Jalankan query SQL bersyarat jika ada pencarian
if (!empty($keyword)) {
    $data = mysqli_query($conn, "
        SELECT penerima.*, wilayah.nama_desa
        FROM penerima
        JOIN wilayah ON penerima.id_wilayah = wilayah.id_wilayah
        WHERE penerima.nama LIKE '%$keyword%' OR penerima.nik LIKE '%$keyword%'
    ");
} else {
    $data = mysqli_query($conn, "
        SELECT penerima.*, wilayah.nama_desa
        FROM penerima
        JOIN wilayah ON penerima.id_wilayah = wilayah.id_wilayah
    ");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penerima</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4 align-items-center">
        <h2 class="fw-bold m-0">Data Penerima Bantuan</h2>
        <a href="tambah.php" class="btn btn-primary">+ Tambah Data</a>
    </div>

    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body">
            <form method="GET" action="" class="row g-2">
                <div class="col-md-10">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama penerima atau NIK di sini..." value="<?= htmlspecialchars($keyword); ?>">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">🔍 Cari Data</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow border-0">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Status</th>
                        <th>Wilayah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                if (mysqli_num_rows($data) > 0) {
                    while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d['nama']; ?></td>
                        <td><?= $d['nik']; ?></td>
                        <td><?= $d['alamat']; ?></td>
                        <td><?= $d['no_hp']; ?></td>
                        <td><?= $d['status_ekonomi']; ?></td>
                        <td><?= $d['nama_desa']; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $d['id_penerima']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus.php?id=<?= $d['id_penerima']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">Hapus</a>
                        </td>
                    </tr>
                    <?php 
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center text-muted py-3'>Data tidak ditemukan.</td></tr>";
                }
                ?>
                </tbody>
            </table>
            <a href="../index.php" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
</body>
</html>
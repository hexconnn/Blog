<?php
include '../koneksi.php';

// Query untuk mengambil data distribusi beserta nama relasinya
$query = "SELECT d.id_distribusi, p.nama AS nama_penerima, b.nama_bantuan, pt.nama AS nama_petugas, d.tanggal, d.status 
          FROM distribusi d
          LEFT JOIN penerima p ON d.id_penerima = p.id_penerima
          LEFT JOIN bantuan b ON d.id_bantuan = b.id_bantuan
          LEFT JOIN petugas pt ON d.id_petugas = pt.id_petugas
          ORDER BY d.tanggal DESC";
$data = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Distribusi Bantuan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
    </style>
</head>
<body>

<div class="container mt-5">
    <!-- Header Section yang Dirapikan -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h3 class="fw-bold m-0 text-dark">Data Distribusi Bantuan</h3>
            <div>
                <a href="cetak.php" target="_blank" class="btn btn-danger me-2 shadow-sm">🖨️ Cetak PDF</a>
                <a href="tambah.php" class="btn btn-primary shadow-sm">+ Tambah Distribusi</a>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th width="5%">No</th>
                            <th>Penerima</th>
                            <th>Bantuan</th>
                            <th>Petugas</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if (mysqli_num_rows($data) > 0) {
                            while($d = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= htmlspecialchars($d['nama_penerima']); ?></td>
                            <td><?= htmlspecialchars($d['nama_bantuan']); ?></td>
                            <td><?= htmlspecialchars($d['nama_petugas']); ?></td>
                            <td class="text-center"><?= date('d-m-Y', strtotime($d['tanggal'])); ?></td>
                            <td class="text-center">
                                <?php if(strtolower($d['status']) == 'selesai'){ ?>
                                    <span class="badge bg-success">Selesai</span>
                                <?php } else { ?>
                                    <span class="badge bg-warning text-dark"><?= htmlspecialchars($d['status']); ?></span>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <a href="edit.php?id=<?= $d['id_distribusi']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="hapus.php?id=<?= $d['id_distribusi']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php 
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center py-4 text-muted'>Belum ada data distribusi.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <a href="../index.php" class="btn btn-secondary mt-2 shadow-sm">Kembali</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
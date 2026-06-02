<?php
include '../koneksi.php';

$data = mysqli_query($conn, "
    SELECT distribusi.*, 
    penerima.nama, 
    bantuan.nama_bantuan, 
    user.username
    FROM distribusi
    JOIN penerima ON distribusi.id_penerima = penerima.id_penerima
    JOIN bantuan ON distribusi.id_bantuan = bantuan.id_bantuan
    JOIN user ON distribusi.id_petugas = user.id_user
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Distribusi Bansos PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Desain Khusus Cetak Kertas/PDF */
        @media print {
            .no-print { display: none; }
            body { background-color: #fff; padding: 20px; }
        }
    </style>
</head>
<body class="bg-white">

<div class="container mt-4">
    <div class="text-center mb-5">
        <h2 class="fw-bold">LAPORAN REALISASI DISTRIBUSI BANTUAN SOSIAL</h2>
        <p class="text-muted m-0">Sistem Informasi Manajemen Distribusi Bansos Kelurahan - Tahun 2026</p>
        <hr style="border: 2px solid black;">
    </div>

    <table class="table table-bordered align-middle">
        <thead class="table-light text-center">
            <tr>
                <th>No</th>
                <th>Nama Penerima</th>
                <th>Jenis Bantuan</th>
                <th>Petugas Validasi</th>
                <th>Tanggal Penyerahan</th>
                <th>Status Realisasi</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        while($d = mysqli_fetch_array($data)){ 
        ?>
            <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td><?= $d['nama']; ?></td>
                <td><?= $d['nama_bantuan']; ?></td>
                <td><?= $d['username']; ?></td>
                <td class="text-center"><?= $d['tanggal']; ?></td>
                <td class="text-center fw-bold text-uppercase"><?= $d['status']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <div class="row mt-5 pt-4">
        <div class="col-8"></div>
        <div class="col-4 text-center">
            <p>Malang, <?= date('d F Y'); ?></p>
            <p class="mb-5 pb-3">Kepala Penanggung Jawab,</p>
            <p class="fw-bold text-decoration-underline">Admin Distribusi</p>
        </div>
    </div>

    <div class="text-center mt-4 no-print">
        <button onclick="window.print()" class="btn btn-success btn-lg px-5">🖨️ Cetak & Simpan Ke PDF</button>
        <a href="index.php" class="btn btn-secondary btn-lg">Kembali</a>
    </div>
</div>

<script>
    // Membuka print dialog otomatis saat halaman dimuat
    window.onload = function() { window.print(); }
</script>
</body>
</html>
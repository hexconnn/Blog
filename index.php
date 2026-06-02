<?php
include 'koneksi.php';

// Ambil data statistik dari Database
$penerima_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM penerima");
$total_penerima = mysqli_fetch_assoc($penerima_count)['total'];

$bantuan_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM bantuan");
$total_bantuan = mysqli_fetch_assoc($bantuan_count)['total'];

$distribusi_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM distribusi");
$total_distribusi = mysqli_fetch_assoc($distribusi_count)['total'];

// Ambil data untuk Grafik Distribusi berdasarkan Status
$chart_query = mysqli_query($conn, "SELECT status, COUNT(*) as jumlah FROM distribusi GROUP BY status");
$labels = [];
$counts = [];
while ($row = mysqli_fetch_assoc($chart_query)) {
    $labels[] = $row['status'];
    $counts[] = $row['jumlah'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Manajemen Distribusi Bantuan Sosial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">SIM Distribusi Bansos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="penerima/index.php">Penerima</a></li>
                    <li class="nav-item"><a class="nav-link" href="bantuan/index.php">Bantuan</a></li>
                    <li class="nav-item"><a class="nav-link" href="kategori_bantuan/index.php">Kategori</a></li>
                    <li class="nav-item"><a class="nav-link" href="wilayah/index.php">Wilayah</a></li>
                    <li class="nav-item"><a class="nav-link" href="pengguna/index.php">Pengguna</a></li>
                    <li class="nav-item"><a class="nav-link" href="petugas/tambah.php">Petugas</a></li>
                    <li class="nav-item"><a class="nav-link" href="distribusi/index.php">Distribusi</a></li>
                    <li class="nav-item"><a class="nav-link" href="riwayat_distribusi/index.php">Riwayat</a></li>
                    <li class="nav-item"><a class="nav-link" href="validasi/index.php">Validasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="log_aktivitas/index.php">Log</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section text-white py-5" style="background: linear-gradient(120deg, #0d6efd, #0dcaf0);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="fw-bold display-5">Sistem Informasi Manajemen Distribusi Bantuan Sosial</h1>
                    <p class="lead mt-3">Website ini digunakan untuk mengelola data penerima bantuan, distribusi bantuan sosial, validasi data penerima, serta monitoring aktivitas distribusi secara efektif dan modern.</p>
                    <a href="distribusi/index.php" class="btn btn-light text-primary btn-lg mt-3 fw-bold shadow-sm">Kelola Distribusi</a>
                </div>
                <div class="col-md-6 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/4320/4320337.png" class="img-fluid hero-image" alt="Bansos" style="width: 250px;">
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-5">
        <h3 class="fw-bold mb-4 text-dark">📊 Dashboard Statistik</h3>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 bg-primary text-white shadow-sm p-3 dashboard-card">
                    <div class="card-body">
                        <h6 class="text-uppercase mb-2 text-white-50 fw-bold">Total Penerima</h6>
                        <h2 class="fw-bold m-0"><?= $total_penerima; ?> Orgs</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 bg-success text-white shadow-sm p-3 dashboard-card">
                    <div class="card-body">
                        <h6 class="text-uppercase mb-2 text-white-50 fw-bold">Jenis Barang Bantuan</h6>
                        <h2 class="fw-bold m-0"><?= $total_bantuan; ?> Item</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 bg-warning text-dark shadow-sm p-3 dashboard-card">
                    <div class="card-body">
                        <h6 class="text-uppercase mb-2 text-black-50 fw-bold">Total Transaksi Distribusi</h6>
                        <h2 class="fw-bold m-0"><?= $total_distribusi; ?> Paket</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card shadow border-0 p-4">
                    <h5 class="fw-bold text-center mb-3">📈 Grafik Status Distribusi Bantuan</h5>
                    <div style="height: 350px;">
                        <canvas id="distributionChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="menu-section mt-5">
        <div class="container">
            <h4 class="fw-bold mb-3 text-secondary">Akses Navigasi Cepat</h4>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 text-center p-3">
                        <div class="card-body">
                            <h4>Penerima</h4>
                            <p>Kelola data penerima bantuan sosial.</p>
                            <a href="penerima/index.php" class="btn btn-primary w-100">Buka</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 text-center p-3">
                        <div class="card-body">
                            <h4>Bantuan</h4>
                            <p>Kelola data bantuan sosial.</p>
                            <a href="bantuan/index.php" class="btn btn-success w-100">Buka</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 text-center p-3">
                        <div class="card-body">
                            <h4>Distribusi</h4>
                            <p>Kelola proses distribusi bantuan.</p>
                            <a href="distribusi/index.php" class="btn btn-warning w-100">Buka</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-primary text-white text-center p-3 mt-5">
        <p class="mb-0">© 2026 Sistem Informasi Manajemen Distribusi Bantuan Sosial</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const ctx = document.getElementById('distributionChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($labels); ?>,
                datasets: [{
                    label: 'Jumlah Distribusi',
                    data: <?= json_encode($counts); ?>,
                    backgroundColor: ['#0d6efd', '#198754', '#ffc107'],
                    borderWidth: 1,
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>
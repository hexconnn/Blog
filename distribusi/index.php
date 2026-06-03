<?php
include '../koneksi.php';

$keyword = "";
$sort_option = "";
$order_sql = "ORDER BY d.tanggal DESC"; // Default: Terbaru

if (isset($_GET['search'])) {
    $keyword = mysqli_real_escape_string($conn, $_GET['search']);
}
if (isset($_GET['sort'])) {
    $sort_option = $_GET['sort'];
    if ($sort_option == 'tanggal_lama') {
        $order_sql = "ORDER BY d.tanggal ASC";
    } elseif ($sort_option == 'status_selesai') {
        $order_sql = "ORDER BY d.status DESC"; // Selesai biasanya di atas
    } elseif ($sort_option == 'nama_penerima') {
        $order_sql = "ORDER BY p.nama ASC";
    }
}

$query = "SELECT d.id_distribusi, p.nama AS nama_penerima, b.nama_bantuan, pt.nama AS nama_petugas, d.tanggal, d.status 
          FROM distribusi d
          LEFT JOIN penerima p ON d.id_penerima = p.id_penerima
          LEFT JOIN bantuan b ON d.id_bantuan = b.id_bantuan
          LEFT JOIN petugas pt ON d.id_petugas = pt.id_petugas";

if (!empty($keyword)) {
    $query .= " WHERE p.nama LIKE '%$keyword%' OR b.nama_bantuan LIKE '%$keyword%'";
}
$query .= " $order_sql";
$data = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Distribusi Bantuan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f4f7f6; }
        .table-custom { border-collapse: separate; border-spacing: 0; }
        .table-custom th { background-color: #4361ee; color: white; font-weight: 500; border: none; padding: 15px; }
        .table-custom th:first-child { border-top-left-radius: 12px; }
        .table-custom th:last-child { border-top-right-radius: 12px; }
        .table-custom td { vertical-align: middle; padding: 15px; border-bottom: 1px solid #f1f3f5; }
        .search-box { border-radius: 50px; overflow: hidden; border: 1px solid #e9ecef; }
        .search-box input { border: none; box-shadow: none !important; }
        .search-box .input-group-text { background: transparent; border: none; }
        .search-box button { border-radius: 0 50px 50px 0 !important; }
        .filter-box { border-radius: 50px; cursor: pointer; border: 1px solid #e9ecef; box-shadow: none !important; }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold m-0" style="color: #2b2d42;">🤝 Data Distribusi Bantuan</h2>
        <div>
            <a href="cetak.php" target="_blank" class="btn btn-danger rounded-pill px-4 shadow-sm fw-bold me-2"><i class="fas fa-print me-2"></i>Cetak PDF</a>
            <a href="tambah.php" class="btn btn-primary rounded-pill px-4 shadow-sm fw-bold" style="background-color: #4361ee; border: none;"><i class="fas fa-plus me-2"></i>Tambah Data</a>
        </div>
    </div>

    <form method="GET" action="" class="mb-4">
        <div class="row g-3">
            <div class="col-md-8">
                <div class="input-group search-box bg-white shadow-sm">
                    <span class="input-group-text ps-4"><i class="fas fa-search text-muted"></i></span>
                    <input type="text" name="search" class="form-control py-2" placeholder="Cari nama penerima atau nama bantuan..." value="<?= htmlspecialchars($keyword); ?>">
                    <button type="submit" class="btn btn-primary px-4 fw-bold" style="background-color: #4361ee;">Cari Data</button>
                </div>
            </div>
            <div class="col-md-4">
                <select name="sort" class="form-select filter-box bg-white shadow-sm py-2 fw-bold text-secondary" onchange="this.form.submit()">
                    <option value="">-- Tanggal Terbaru --</option>
                    <option value="tanggal_lama" <?= ($sort_option == 'tanggal_lama') ? 'selected' : ''; ?>>Tanggal Terlama</option>
                    <option value="nama_penerima" <?= ($sort_option == 'nama_penerima') ? 'selected' : ''; ?>>Nama Penerima (A - Z)</option>
                    <option value="status_selesai" <?= ($sort_option == 'status_selesai') ? 'selected' : ''; ?>>Status Penyelesaian</option>
                </select>
            </div>
        </div>
    </form>

    <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-4">
        <div class="table-responsive">
            <table class="table table-hover table-custom mb-0 bg-white">
                <thead class="text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th class="text-start">Penerima & Bantuan</th>
                        <th>Petugas Lapangan</th>
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
                        <td class="text-center text-muted fw-bold"><?= $no++; ?></td>
                        <td>
                            <div class="fw-bold" style="color: #2b2d42; font-size: 1.1rem;"><?= htmlspecialchars($d['nama_penerima']); ?></div>
                            <div class="text-muted small mt-1"><i class="fas fa-box-open me-1"></i><?= htmlspecialchars($d['nama_bantuan']); ?></div>
                        </td>
                        <td class="text-center" style="color: #4a4e69;"><i class="fas fa-user-tie me-1 text-muted"></i> <?= htmlspecialchars($d['nama_petugas']); ?></td>
                        <td class="text-center fw-bold"><?= date('d M Y', strtotime($d['tanggal'])); ?></td>
                        <td class="text-center">
                            <?php if(strtolower($d['status']) == 'selesai'){ ?>
                                <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill"><i class="fas fa-check-circle me-1"></i>Selesai</span>
                            <?php } else { ?>
                                <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill"><i class="fas fa-clock me-1"></i><?= htmlspecialchars($d['status']); ?></span>
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <a href="edit.php?id=<?= $d['id_distribusi']; ?>" class="btn btn-warning btn-sm rounded-3 px-3 shadow-sm text-dark fw-bold"><i class="fas fa-pen"></i></a>
                            <a href="hapus.php?id=<?= $d['id_distribusi']; ?>" class="btn btn-danger btn-sm rounded-3 px-3 shadow-sm fw-bold ms-1" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } 
                } else {
                    echo "<tr><td colspan='6' class='text-center text-muted py-5'>Data tidak ditemukan.</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <a href="../index.php" class="btn btn-outline-secondary rounded-pill px-4 fw-bold shadow-sm mb-5"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
</div>
</body>
</html>
<?php
include '../koneksi.php';

$keyword = "";
$sort_option = "";
$order_sql = "ORDER BY id_wilayah DESC"; // Default: Data yang baru ditambahkan di atas

// Tangkap input dari form
if (isset($_GET['search'])) {
    $keyword = mysqli_real_escape_string($conn, $_GET['search']);
}
if (isset($_GET['sort'])) {
    $sort_option = $_GET['sort'];
    // Logika pengurutan khusus wilayah
    if ($sort_option == 'desa_asc') {
        $order_sql = "ORDER BY nama_desa ASC";
    } elseif ($sort_option == 'kec_asc') {
        $order_sql = "ORDER BY kecamatan ASC";
    } elseif ($sort_option == 'kab_asc') {
        $order_sql = "ORDER BY kabupaten ASC";
    }
}

// Susun Query Utama
$query = "SELECT * FROM wilayah";

// Tambahkan pencarian dinamis (Bisa cari desa, kecamatan, atau kabupaten)
if (!empty($keyword)) {
    $query .= " WHERE nama_desa LIKE '%$keyword%' 
                OR kecamatan LIKE '%$keyword%' 
                OR kabupaten LIKE '%$keyword%'";
}

$query .= " $order_sql";
$data = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Wilayah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { background-color: #f4f7f6; }
        .table-custom { border-collapse: separate; border-spacing: 0; }
        .table-custom th { background-color: #4361ee; color: white; font-weight: 500; border: none; padding: 15px; }
        .table-custom th:first-child { border-top-left-radius: 12px; }
        .table-custom th:last-child { border-top-right-radius: 12px; }
        .table-custom td { vertical-align: middle; padding: 15px; border-bottom: 1px solid #f1f3f5; }
        
        .badge-soft {
            background-color: rgba(67, 97, 238, 0.1);
            color: #4361ee;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 600;
        }

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
        <h2 class="fw-bold m-0" style="color: #2b2d42;">📍 Data Wilayah</h2>
        <a href="tambah.php" class="btn btn-primary rounded-pill px-4 shadow-sm fw-bold" style="background-color: #4361ee; border: none;">
            <i class="fas fa-plus me-2"></i>Tambah Wilayah
        </a>
    </div>

    <form method="GET" action="" class="mb-4">
        <div class="row g-3">
            <div class="col-md-8">
                <div class="input-group search-box bg-white shadow-sm">
                    <span class="input-group-text ps-4"><i class="fas fa-search text-muted"></i></span>
                    <input type="text" name="search" class="form-control py-2" placeholder="Cari nama desa, kecamatan, atau kabupaten..." value="<?= htmlspecialchars($keyword); ?>">
                    <button type="submit" class="btn btn-primary px-4 fw-bold" style="background-color: #4361ee;">Cari Data</button>
                </div>
            </div>
            
            <div class="col-md-4">
                <select name="sort" class="form-select filter-box bg-white shadow-sm py-2 fw-bold text-secondary" onchange="this.form.submit()">
                    <option value="">-- Pendaftaran Terbaru --</option>
                    <option value="desa_asc" <?= ($sort_option == 'desa_asc') ? 'selected' : ''; ?>>Nama Desa (A - Z)</option>
                    <option value="kec_asc" <?= ($sort_option == 'kec_asc') ? 'selected' : ''; ?>>Nama Kecamatan (A - Z)</option>
                    <option value="kab_asc" <?= ($sort_option == 'kab_asc') ? 'selected' : ''; ?>>Nama Kabupaten (A - Z)</option>
                </select>
            </div>
        </div>
    </form>

    <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-4">
        <div class="table-responsive">
            <table class="table table-hover table-custom mb-0 bg-white text-center">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th class="text-start">Nama Desa</th>
                        <th>Kecamatan</th>
                        <th>Kabupaten / Kota</th>
                        <th>Provinsi</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                if (mysqli_num_rows($data) > 0) {
                    while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td class="text-muted fw-bold"><?= $no++; ?></td>
                        
                        <td class="text-start fw-bold" style="color: #2b2d42; font-size: 1.1rem;">
                            <i class="fas fa-map-marker-alt text-danger me-2"></i><?= htmlspecialchars($d['nama_desa']); ?>
                        </td>
                        
                        <td>
                            <span class="badge-soft">
                                <i class="fas fa-map me-1"></i> <?= htmlspecialchars($d['kecamatan']); ?>
                            </span>
                        </td>
                        
                        <td style="color: #4a4e69; font-weight: 500;">
                            <?= htmlspecialchars($d['kabupaten']); ?>
                        </td>
                        
                        <td class="text-muted">
                            <?= htmlspecialchars($d['provinsi']); ?>
                        </td>
                        
                        <td>
                            <a href="edit.php?id=<?= $d['id_wilayah']; ?>" class="btn btn-warning btn-sm rounded-3 px-3 shadow-sm text-dark fw-bold"><i class="fas fa-pen"></i> Edit</a>
                            <a href="hapus.php?id=<?= $d['id_wilayah']; ?>" class="btn btn-danger btn-sm rounded-3 px-3 shadow-sm fw-bold ms-1" onclick="return confirm('Yakin ingin menghapus data wilayah ini?')"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php 
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-muted py-5'>Yahh, data wilayah tidak ditemukan.</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <a href="../index.php" class="btn btn-outline-secondary rounded-pill px-4 fw-bold shadow-sm mb-5">
        <i class="fas fa-arrow-left me-2"></i>Kembali ke Dashboard
    </a>

</div>
</body>
</html>
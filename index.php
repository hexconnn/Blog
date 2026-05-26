<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>
        Sistem Informasi Manajemen Distribusi Bantuan Sosial
    </title>

    <!-- Bootstrap -->

    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

    <!-- CSS -->

    <link
    rel="stylesheet"
    href="style.css">

</head>

<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">

    <div class="container">

        <a class="navbar-brand fw-bold" href="#">

            SIM Distribusi Bansos

        </a>

        <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div
        class="collapse navbar-collapse"
        id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">

                    <a class="nav-link active"
                    href="index.php">

                        Home

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                    href="penerima/index.php">

                        Penerima

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                    href="bantuan/index.php">

                        Bantuan

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                    href="kategori_bantuan/index.php">

                        Kategori

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                    href="wilayah/index.php">

                        Wilayah

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                    href="pengguna/index.php">

                        Pengguna

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                    href="distribusi/index.php">

                        Distribusi

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                    href="riwayat_distribusi/index.php">

                        Riwayat

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                    href="validasi/index.php">

                        Validasi

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                    href="log_aktivitas/index.php">

                        Log

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>

<!-- Hero -->

<section class="hero">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-md-6">

                <h1 class="fw-bold display-5">

                    Sistem Informasi Manajemen Distribusi Bantuan Sosial

                </h1>

                <p class="lead mt-3">

                    Website ini digunakan untuk mengelola data penerima bantuan,
                    distribusi bantuan sosial, validasi data penerima,
                    serta monitoring aktivitas distribusi secara efektif dan modern.

                </p>

                <a href="distribusi/index.php"
                class="btn btn-primary btn-lg mt-3">

                    Kelola Distribusi

                </a>

            </div>

            <div class="col-md-6 text-center">

                <img
                src="https://cdn-icons-png.flaticon.com/512/4320/4320337.png"
                class="img-fluid hero-img"
                alt="Bansos">

            </div>

        </div>

    </div>

</section>

<!-- Menu Card -->

<section class="menu-section">

    <div class="container">

        <div class="row g-4">

            <!-- Card -->

            <div class="col-md-4">

                <div class="card menu-card shadow-sm">

                    <div class="card-body text-center">

                        <h4>Penerima</h4>

                        <p>
                            Kelola data penerima bantuan sosial.
                        </p>

                        <a href="penerima/index.php"
                        class="btn btn-primary">

                            Buka

                        </a>

                    </div>

                </div>

            </div>

            <!-- Card -->

            <div class="col-md-4">

                <div class="card menu-card shadow-sm">

                    <div class="card-body text-center">

                        <h4>Bantuan</h4>

                        <p>
                            Kelola data bantuan sosial.
                        </p>

                        <a href="bantuan/index.php"
                        class="btn btn-success">

                            Buka

                        </a>

                    </div>

                </div>

            </div>

            <!-- Card -->

            <div class="col-md-4">

                <div class="card menu-card shadow-sm">

                    <div class="card-body text-center">

                        <h4>Distribusi</h4>

                        <p>
                            Kelola proses distribusi bantuan.
                        </p>

                        <a href="distribusi/index.php"
                        class="btn btn-warning">

                            Buka

                        </a>

                    </div>

                </div>

            </div>

            <!-- Card -->

            <div class="col-md-4">

                <div class="card menu-card shadow-sm">

                    <div class="card-body text-center">

                        <h4>Riwayat Distribusi</h4>

                        <p>
                            Monitoring riwayat distribusi bantuan.
                        </p>

                        <a href="riwayat_distribusi/index.php"
                        class="btn btn-info">

                            Buka

                        </a>

                    </div>

                </div>

            </div>

            <!-- Card -->

            <div class="col-md-4">

                <div class="card menu-card shadow-sm">

                    <div class="card-body text-center">

                        <h4>Validasi</h4>

                        <p>
                            Validasi data penerima bantuan sosial.
                        </p>

                        <a href="validasi/index.php"
                        class="btn btn-danger">

                            Buka

                        </a>

                    </div>

                </div>

            </div>

            <!-- Card -->

            <div class="col-md-4">

                <div class="card menu-card shadow-sm">

                    <div class="card-body text-center">

                        <h4>Log Aktivitas</h4>

                        <p>
                            Monitoring aktivitas pengguna sistem.
                        </p>

                        <a href="log_aktivitas/index.php"
                        class="btn btn-dark">

                            Buka

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Footer -->

<footer class="bg-primary text-white text-center p-3 mt-5">

    <p class="mb-0">

        © 2026 Sistem Informasi Manajemen Distribusi Bantuan Sosial

    </p>

</footer>

<!-- Bootstrap JS -->

<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

<!-- JS -->

<script src="script.js"></script>

</body>
</html>
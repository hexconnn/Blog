<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];

    mysqli_query($conn, "
    INSERT INTO user
    (
        username,
        password,
        role
    )
    VALUES
    (
        '$username',
        '$password',
        '$role'
    )
    ");

    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Tambah User</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow border-0">

            <div class="card-header bg-primary text-white">

                <h4>
                    Tambah User
                </h4>

            </div>

            <div class="card-body">

                <form method="POST">

                    <div class="mb-3">

                        <label>Username</label>

                        <input type="text"
                            name="username"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-3">

                        <label>Password</label>

                        <input type="password"
                            name="password"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-3">

                        <label>Role</label>

                        <select
                            name="role"
                            class="form-select">

                            <option value="admin">
                                Admin
                            </option>

                            <option value="petugas">
                                Petugas
                            </option>

                        </select>

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
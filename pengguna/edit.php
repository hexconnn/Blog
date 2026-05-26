<?php
include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM user
WHERE id_user='$id'");

$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){

    $username = $_POST['username'];
    $role = $_POST['role'];

    mysqli_query($conn,"
    UPDATE user SET
    username='$username',
    role='$role'
    WHERE id_user='$id'
    ");

    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Edit User</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow border-0">

        <div class="card-header bg-warning">

            <h4>
                Edit User
            </h4>

        </div>

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">

                    <label>Username</label>

                    <input type="text"
                    name="username"
                    class="form-control"
                    value="<?= $d['username']; ?>">

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
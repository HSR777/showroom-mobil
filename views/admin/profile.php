<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbard Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../statics/css/admin/content-wrapper.css">
</head>

<body>
    <div class="container-fluid row">
        <!-- sidebar start -->
        <?= include ('sidebar.php') ?>
        <!-- sidebar end -->

        <!-- Wrapper start -->
        <div class="wrapper-content col-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Profile</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-auto">
                            <img src="https://static.vecteezy.com/system/resources/thumbnails/020/429/953/small_2x/admin-icon-vector.jpg" class="img-fluid img-thumbnail rounded-circle" alt="admin profile" style="width: 150px; height: 150px;">
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <p>Nama : </p>
                            </div>
                            <div class="mb-3">
                                <p>Role : </p>
                            </div>
                            <div class="mb-3">
                                <p>Nomor Telepon : </p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="row">
                                <a href="#" class="btn btn-info mb-3">Change password</a>
                                <a href="#" class="btn btn-outline-warning">Recovery key</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wrapper End -->
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
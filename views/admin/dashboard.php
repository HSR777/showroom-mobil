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
            <nav>
                test
            </nav>
            <div class="container-fluid">
                <!-- card counting start -->
                <div class="row mb-4">
                    <div class="col">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="bi bi-car-front-fill fs-1 mb-2"></i>
                                <h5 class="card-title">Total Mobil</h5>
                                <p class="card-text">123</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="bi bi-people-fill fs-1 mb-2"></i>
                                <h5 class="card-title">Calon Buyer</h5>
                                <p class="card-text">45</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="bi bi-cash-stack fs-1 mb-2"></i>
                                <h5 class="card-title">Transaksi</h5>
                                <p class="card-text">67</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="bi bi-calendar-event-fill fs-1 mb-2"></i>
                                <h5 class="card-title">Jadwal</h5>
                                <p class="card-text">7</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="bi bi-graph-up-arrow fs-1 mb-2"></i>
                                <h5 class="card-title">Statistik</h5>
                                <p class="card-text">99</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card counting end -->
            </div>
        </div>
        <!-- Wrapper End -->
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
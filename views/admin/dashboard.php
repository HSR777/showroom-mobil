<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
require_once '../../connections/koneksi.php';

// Get total cars
$total_cars = mysqli_fetch_row(mysqli_query($connection, "SELECT COUNT(*) FROM dm_mobil_tbl"))[0];

// Get total cars per brand
$brands = [
    'lamborghini' => 'Lamborghini',
    'mercedes'    => 'Mercedes',
    'porsche'     => 'Porsche',
    'ferrari'     => 'Ferrari',
    'bmw'         => 'BMW'
];
$brand_counts = [];
foreach ($brands as $key => $label) {
    $brand_counts[$key] = mysqli_fetch_row(mysqli_query($connection, "SELECT COUNT(*) FROM dm_mobil_tbl WHERE merek_mobil='$key'"))[0];
}

$brand_images = [
    'lamborghini' => '../../img/lambologo.png',
    'mercedes'    => '../../img/merchedeslogo.png',
    'porsche'     => '../../img/porschelogo.png',
    'ferrari'     => '../../img/ferarrilogo.png',
    'bmw'         => '../../img/bmwlogo.png'
];
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
            <div class="container-fluid">
                <!-- Card Counting Start -->
                <div class="row mb-4">
                    <div class="col">
                        <div class="card shadow border-0 h-100 bg-primary text-white">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <i class="bi bi-car-front-fill fs-1 mb-2"></i>
                                <h5 class="card-title">Total Cars</h5>
                                <p class="display-5 fw-bold mb-0"><?= $total_cars ?></p>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($brands as $key => $label): ?>
                    <div class="col">
                        <div class="card shadow border-0 h-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <img src="<?= $brand_images[$key] ?>" alt="<?= $label ?>" style="height:64px;width:auto; object-fit: cover;" class="mb-2">
                                <h6 class="card-title mb-1"><?= $label ?></h6>
                                <span class="fs-4 fw-semibold"><?= $brand_counts[$key] ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <!-- Card Counting End -->
            </div>
        </div>
        <!-- Wrapper End -->
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
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
    <title>Manajemen Buyer</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../statics/css/admin/content-wrapper.css">
</head>

<body>
    <div class="container-fluid row">
        <!-- sidebar start -->
        <?= include('sidebar.php') ?>
        <!-- sidebar end -->

        <!-- Wrapper start -->
        <div class="wrapper-content col-10">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="bi bi-people-fill"></i>
                            <b>Manajemen Buyer</b>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Buyer</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">No Telepon</th>
                                        <!-- <th scope="col">Alamat</th>
                                        <th scope="col">Aksi</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once('../../connections/koneksi.php');
                                    $q = mysqli_query($connection, "SELECT * FROM dm_calon_buyer_tbl ORDER BY id_calon_buyer DESC");
                                    $no = 1;
                                    while ($row = mysqli_fetch_assoc($q)) {
                                        echo "<tr>
                                            <td>{$no}</td>
                                            <td>".htmlspecialchars($row['nama_depan_calon_buyer'].' '.$row['nama_belakang_calon_buyer'])."</td>
                                            <td>".htmlspecialchars($row['email_calon_buyer'])."</td>
                                            <td>".htmlspecialchars($row['nomor_telepon_calon_buyer'])."</td>
                                            
                                        </tr>";
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
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
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
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
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
                            <table id="buyerTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Buyer</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">No Telepon</th>
                                        <th scope="col">Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once('../../connections/koneksi.php');
                                    $q = mysqli_query($connection, "SELECT * FROM dm_calon_buyer_tbl ORDER BY id_calon_buyer DESC");
                                    $no = 1;
                                    while ($row = mysqli_fetch_assoc($q)) {
                                        $modalId = "buyerDetailModal" . $row['id_calon_buyer'];
                                        echo "<tr>
                                            <td>{$no}</td>
                                            <td>" . htmlspecialchars($row['nama_depan_calon_buyer'] . ' ' . $row['nama_belakang_calon_buyer']) . "</td>
                                            <td>" . htmlspecialchars($row['email_calon_buyer']) . "</td>
                                            <td>" . htmlspecialchars($row['nomor_telepon_calon_buyer']) . "</td>
                                            <td>
                                                <button type='button' class='btn btn-sm btn-info' data-bs-toggle='modal' data-bs-target='#{$modalId}'>
                                                    <i class='bi bi-eye'></i> Detail
                                                </button>
                                            </td>
                                        </tr>";

                                        // Modal for detail
                                        echo "
                                        <div class='modal fade' id='{$modalId}' tabindex='-1' aria-labelledby='{$modalId}Label' aria-hidden='true'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='{$modalId}Label'>Detail Calon Buyer</h5>
                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <ul class='list-group'>
                                                            <li class='list-group-item'><strong>Nama Depan:</strong> " . htmlspecialchars($row['nama_depan_calon_buyer']) . "</li>
                                                            <li class='list-group-item'><strong>Nama Belakang:</strong> " . htmlspecialchars($row['nama_belakang_calon_buyer']) . "</li>
                                                            <li class='list-group-item'><strong>Email:</strong> " . htmlspecialchars($row['email_calon_buyer']) . "</li>
                                                            <li class='list-group-item'><strong>No Telepon:</strong> " . htmlspecialchars($row['nomor_telepon_calon_buyer']) . "</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        ";
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
    <!-- jQuery (must be loaded before DataTables JS) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#buyerTable').DataTable();
        });
    </script>
</body>

</html>
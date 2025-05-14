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
    <title>Car Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../statics/css/admin/content-wrapper.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.bootstrap5.css">
</head>

<body>
    <div class="container-fluid row">
        <!-- sidebar start -->
        <?= include('sidebar.php') ?>
        <!-- sidebar end -->

        <!-- Wrapper start -->
        <div class="wrapper-content col-10 ps-5">
            <div class="container-fluid">
                <!-- Row Card Table -->
                <div class="row card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <b>Car Management</b>
                        </h3>
                    </div>
                    <div class="card-body pt-3">
                        <div class="justify-content-between d-flex mb-2">
                            <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCarModal">
                                <i class="bi bi-plus-circle"></i>
                                Add Car
                            </a>
                        </div>
                        <!-- table start -->
                        <div class="table-responsive">
                            <table id="carTable" class="table table-bordered table-hover table-striped py-3">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Overview Image</th>
                                        <th scope="col">Car Name</th>
                                        <th scope="col">Car Brand</th>
                                        <th scope="col">Car Type</th>
                                        <th scope="col">Car Price</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Last Updated</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="carTableBody">
                                    <?php
                                    include('../../connections/koneksi.php');
                                    $query = "SELECT * FROM dm_mobil_tbl ORDER BY tanggal_dibuat DESC";
                                    $result = mysqli_query($connection, $query);
                                    ?>
                                    <?php if (mysqli_num_rows($result) > 0): ?>
                                        <?php foreach ($result as $index => $car): ?>
                                            <tr>
                                                <th scope="row" class="text-center"><?= $index + 1 ?></th>
                                                <td>
                                                    <?php if (!empty($car['gambar_mobil_overview'])): ?>
                                                        <img src="../../<?= htmlspecialchars($car['gambar_mobil_overview']) ?>" alt="Overview" class="img-thumbnail" style="max-height: 100px; max-width: 150px; object-fit: cover;">
                                                    <?php else: ?>
                                                        <span class="text-muted">No Image</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= htmlspecialchars($car['nama_mobil']) ?></td>
                                                <td><?= htmlspecialchars($car['merek_mobil']) ?></td>
                                                <td><?= htmlspecialchars($car['tipe_mobil']) ?></td>
                                                <td>Rp. <?= number_format($car['harga_mobil'], 0, ',', '.') ?></td>
                                                <td><?= $car['stok_mobil'] ?></td>
                                                <td><?= $car['tanggal_diperbaharui'] ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-outline-primary btn-edit"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#updateCarModal"
                                                        data-id="<?= $car['id_mobil'] ?>"
                                                        data-nama="<?= htmlspecialchars($car['nama_mobil'], ENT_QUOTES) ?>"
                                                        data-merek="<?= htmlspecialchars($car['merek_mobil'], ENT_QUOTES) ?>"
                                                        data-tipe="<?= htmlspecialchars($car['tipe_mobil'], ENT_QUOTES) ?>"
                                                        data-deskripsi="<?= htmlspecialchars($car['deskripsi_mobil'], ENT_QUOTES) ?>"
                                                        data-harga="<?= $car['harga_mobil'] ?>"
                                                        data-stok="<?= $car['stok_mobil'] ?>">
                                                        <i class="bi bi-pencil"></i> Edit
                                                    </a>
                                                    <a href="#" class="btn btn-outline-danger btn-delete"
                                                        data-id="<?= $car['id_mobil'] ?>">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="9" class="text-center">No data available</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- table end -->
                    </div>
                </div>
                <!-- Row Card Table End-->
                <!-- modal add car -->
                <?php include('modal-add-mobil.php'); ?>
                <!-- modal add car End-->
                <!-- modal update car -->
                <?php include('modal-update-mobil.php'); ?>
                <!-- modal update car End-->
            </div>
        </div>
        <!-- Wrapper End -->
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function() {
            $('#carTable').DataTable({});

            // Populate update modal with car data
            $('#updateCarModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var nama = button.data('nama');
                var merek = button.data('merek');
                var tipe = button.data('tipe');
                var deskripsi = button.data('deskripsi');
                var harga = button.data('harga');
                var stok = button.data('stok');

                var modal = $(this);
                modal.find('#id_mobil').val(id);
                modal.find('#updateNamaMobil').val(nama);
                modal.find('#updateMerekMobil').val(merek);
                modal.find('#updateTipeMobil').val(tipe);
                modal.find('#updateDeskripsiMobil').val(deskripsi);
                modal.find('#updateCarPrice').val(harga);
                modal.find('#updateStokMobil').val(stok);
            });

            // Delete button handler
            $('.btn-delete').on('click', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                if (confirm('Are you sure you want to delete this car?')) {
                    window.location.href = "../../logics/admin/crud-mobil.php?action=deleteCar&id=" + id;
                }
            });
        });
    </script>
</body>

</html>
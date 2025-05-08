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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
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
                        <h5 class="card-title">Car List</h5>
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
                                    foreach (
                                        [
                                            ['name' => 'BMW M3 GTR', 'brand' => 'BMW', 'type' => 'Sport', 'price' => 'Rp. 15,000,000,000.00', 'stock' => 1, 'updated' => '12-09-2025 16:00:00'],
                                            ['name' => 'Toyota Supra', 'brand' => 'Toyota', 'type' => 'Sport', 'price' => 'Rp. 1,500,000,000.00', 'stock' => 3, 'updated' => '10-08-2025 14:30:00'],
                                            ['name' => 'Honda Civic', 'brand' => 'Honda', 'type' => 'Sedan', 'price' => 'Rp. 500,000,000.00', 'stock' => 5, 'updated' => '05-07-2025 10:00:00'],
                                            ['name' => 'Audi A4', 'brand' => 'Audi', 'type' => 'Sedan', 'price' => 'Rp. 800,000,000.00', 'stock' => 4, 'updated' => '01-06-2025 12:00:00'],
                                            ['name' => 'Audi A4', 'brand' => 'Audi', 'type' => 'Sedan', 'price' => 'Rp. 800,000,000.00', 'stock' => 4, 'updated' => '01-06-2025 12:00:00'],
                                            ['name' => 'Audi A4', 'brand' => 'Audi', 'type' => 'Sedan', 'price' => 'Rp. 800,000,000.00', 'stock' => 4, 'updated' => '01-06-2025 12:00:00'],
                                            ['name' => 'Audi A4', 'brand' => 'Audi', 'type' => 'Sedan', 'price' => 'Rp. 800,000,000.00', 'stock' => 4, 'updated' => '01-06-2025 12:00:00'],
                                            ['name' => 'Audi A4', 'brand' => 'Audi', 'type' => 'Sedan', 'price' => 'Rp. 800,000,000.00', 'stock' => 4, 'updated' => '01-06-2025 12:00:00'],
                                            ['name' => 'Audi A4', 'brand' => 'Audi', 'type' => 'Sedan', 'price' => 'Rp. 800,000,000.00', 'stock' => 4, 'updated' => '01-06-2025 12:00:00'],
                                            ['name' => 'Audi A4', 'brand' => 'Audi', 'type' => 'Sedan', 'price' => 'Rp. 800,000,000.00', 'stock' => 4, 'updated' => '01-06-2025 12:00:00'],
                                            ['name' => 'Audi A4', 'brand' => 'Audi', 'type' => 'Sedan', 'price' => 'Rp. 800,000,000.00', 'stock' => 4, 'updated' => '01-06-2025 12:00:00'],
                                            ['name' => 'Audi A4', 'brand' => 'Audi', 'type' => 'Sedan', 'price' => 'Rp. 800,000,000.00', 'stock' => 4, 'updated' => '01-06-2025 12:00:00'],
                                            ['name' => 'Volkswagen Golf', 'brand' => 'Volkswagen', 'type' => 'Hatchback', 'price' => 'Rp. 600,000,000.00', 'stock' => 6, 'updated' => '15-05-2025 09:00:00']
                                        ] as $index => $car
                                    ): ?>
                                        <tr>
                                            <th scope="row" class="text-center"><?= $index + 1 ?></th>
                                            <td><?= $car['name'] ?></td>
                                            <td><?= $car['brand'] ?></td>
                                            <td><?= $car['type'] ?></td>
                                            <td><?= $car['price'] ?></td>
                                            <td><?= $car['stock'] ?></td>
                                            <td><?= $car['updated'] ?></td>
                                            <td>
                                                <a href="#" class="btn btn-info">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                                <a href="#" class="btn btn-outline-danger">
                                                    <i class="bi bi-trash"></i> Delete
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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
            </div>
        </div>
        <!-- Wrapper End -->
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#carTable').DataTable({
            });
        });
    </script>
</body>

</html>
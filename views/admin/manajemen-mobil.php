<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Management</title>
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
                            <form class="d-flex mb-3" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                        <!-- table start -->
                        <div class="table-responsive">
                            <table id="carTable" class="table table-bordered table-hover table-striped" style="border-radius: 10px; overflow: hidden;">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col" class="p-2 text-center">No</th>
                                        <th scope="col" class="p-2 text-center">Car Name</th>
                                        <th scope="col" class="p-2 text-center">Car Brand</th>
                                        <th scope="col" class="p-2 text-center">Car Type</th>
                                        <th scope="col" class="p-2 text-center">Car Price</th>
                                        <th scope="col" class="p-2 text-center">Stock</th>
                                        <th scope="col" class="p-2 text-center">Last Updated</th>
                                        <th scope="col" class="p-2 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="carTableBody">
                                    <?php 
                                    $cars = [
                                        ['name' => 'BMW M3 GTR', 'brand' => 'BMW', 'type' => 'Sport', 'price' => 'Rp. 15,000,000,000.00', 'stock' => 1, 'updated' => '12-09-2025 16:00:00'],
                                        ['name' => 'Toyota Supra', 'brand' => 'Toyota', 'type' => 'Sport', 'price' => 'Rp. 1,500,000,000.00', 'stock' => 3, 'updated' => '10-08-2025 14:30:00'],
                                        ['name' => 'Honda Civic', 'brand' => 'Honda', 'type' => 'Sedan', 'price' => 'Rp. 500,000,000.00', 'stock' => 5, 'updated' => '05-07-2025 10:00:00'],
                                        ['name' => 'Audi A4', 'brand' => 'Audi', 'type' => 'Sedan', 'price' => 'Rp. 800,000,000.00', 'stock' => 4, 'updated' => '01-06-2025 12:00:00'],
                                        ['name' => 'Volkswagen Golf', 'brand' => 'Volkswagen', 'type' => 'Hatchback', 'price' => 'Rp. 600,000,000.00', 'stock' => 6, 'updated' => '15-05-2025 09:00:00'],
                                        ['name' => 'Mercedes-Benz GLE', 'brand' => 'Mercedes-Benz', 'type' => 'SUV', 'price' => 'Rp. 2,000,000,000.00', 'stock' => 2, 'updated' => '20-04-2025 14:00:00'],
                                        ['name' => 'Porsche 911', 'brand' => 'Porsche', 'type' => 'Sport', 'price' => 'Rp. 20,000,000,000.00', 'stock' => 1, 'updated' => '10-03-2025 16:30:00'],
                                        ['name' => 'Volvo XC90', 'brand' => 'Volvo', 'type' => 'SUV', 'price' => 'Rp. 1,800,000,000.00', 'stock' => 3, 'updated' => '05-03-2025 11:00:00'],
                                        ['name' => 'Ferrari F8 Tributo', 'brand' => 'Ferrari', 'type' => 'Sport', 'price' => 'Rp. 25,000,000,000.00', 'stock' => 1, 'updated' => '25-02-2025 15:00:00'],
                                        ['name' => 'Lamborghini Huracan', 'brand' => 'Lamborghini', 'type' => 'Sport', 'price' => 'Rp. 30,000,000,000.00', 'stock' => 1, 'updated' => '15-02-2025 13:00:00'],
                                        ['name' => 'Peugeot 208', 'brand' => 'Peugeot', 'type' => 'Hatchback', 'price' => 'Rp. 400,000,000.00', 'stock' => 7, 'updated' => '10-01-2025 10:00:00'],
                                        ['name' => 'Renault Clio', 'brand' => 'Renault', 'type' => 'Hatchback', 'price' => 'Rp. 350,000,000.00', 'stock' => 8, 'updated' => '05-01-2025 09:30:00']
                                    ];
                                    foreach ($cars as $index => $car): ?>
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
                        <!-- filter start -->
                        <div class="d-flex justify-content-between mb-2">
                            <!-- Row per page start -->
                            <div>
                                <label for="rowsPerPage" class="form-label me-2">Rows per page:</label>
                                <select id="rowsPerPage" class="form-select" style="width: auto; display: inline-block;">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                </select>
                            </div>
                            <!-- Row per page End -->
                            <!-- Pagination start -->
                            <nav aria-label="Page navigation example">
                                <ul id="pagination" class="pagination">
                                    <!-- Pagination items will be dynamically generated -->
                                </ul>
                            </nav>
                            <!-- Pagination end -->
                        </div>
                        <!-- filter end -->
                    </div>
                </div>
                <!-- Row Card Table End-->
                <!-- modal add car -->
                <?= include ('modal-add-mobil.php'); ?>
                <!-- modal add car End-->


                
            </div>
        </div>
        <!-- Wrapper End -->
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const rowsPerPageSelect = document.getElementById('rowsPerPage');
        const carTableBody = document.getElementById('carTableBody');
        const pagination = document.getElementById('pagination');
        const cars = <?= json_encode($cars) ?>;

        let currentPage = 1;
        let rowsPerPage = parseInt(rowsPerPageSelect.value);

        function displayTable() {
            carTableBody.innerHTML = '';
            const start = (currentPage - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            const paginatedCars = cars.slice(start, end);

            paginatedCars.forEach((car, index) => {
                const row = `
                    <tr>
                        <th scope="row" class="text-center">${start + index + 1}</th>
                        <td>${car.name}</td>
                        <td>${car.brand}</td>
                        <td>${car.type}</td>
                        <td>${car.price}</td>
                        <td>${car.stock}</td>
                        <td>${car.updated}</td>
                        <td>
                            <a href="#" class="btn btn-info">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <a href="#" class="btn btn-outline-danger">
                                <i class="bi bi-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                `;
                carTableBody.innerHTML += row;
            });
        }

        function setupPagination() {
            pagination.innerHTML = '';
            const pageCount = Math.ceil(cars.length / rowsPerPage);

            for (let i = 1; i <= pageCount; i++) {
                const pageItem = `
                    <li class="page-item ${i === currentPage ? 'active' : ''}">
                        <a class="page-link" href="#" onclick="changePage(${i})">${i}</a>
                    </li>
                `;
                pagination.innerHTML += pageItem;
            }
        }

        function changePage(page) {
            currentPage = page;
            displayTable();
            setupPagination();
        }

        rowsPerPageSelect.addEventListener('change', () => {
            rowsPerPage = parseInt(rowsPerPageSelect.value);
            currentPage = 1;
            displayTable();
            setupPagination();
        });

        // Initial setup
        displayTable();
        setupPagination();
    </script>
</body>

</html>
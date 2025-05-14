<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>collection</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap">
</head>

<style>
    .partner-logo {
        max-height: 150px;
        width: auto;
        margin: 0 15px;
        object-fit: cover;
    }

    .hover-primary:hover {
        color: #fff !important;
        background-color: #0d6efd !important;
        border-color: #0d6efd !important;
    }

    /* Blue glow for active brand filter */
    .brand-filter.active,
    .brand-filter.active:focus {
        box-shadow: 0 0 0 4px #0d6efd66, 0 2px 8px rgba(0,0,0,0.08);
        border: 2px solid #0d6efd;
        z-index: 1;
    }
</style>

<body>
    <!-- Navbar  -->
    <?php include('only-navbar.php'); ?>

    <!--  -->
    <div class="container-fluid text-light py-5" style="background-color:rgba(26, 26, 26, 0.76);">
        <div class="mt-5" style="margin-right: 15%; margin-left: 15%;">
            <h1 style="background: linear-gradient(to right, #D4AF37, #6E5B1D); -webkit-background-clip: text; background-clip: text; color: transparent;">
                <b>Our Collection</b>
            </h1>
            <p>Discover timeless European automotive artistry. Every model in our lineup is carefully selected to deliver more than just performance — it delivers prestige.</p>
        </div>
    </div>

    <!--  -->
    <div class="p-5" style="margin-right: 15%; margin-left:15%;">
        <h2>Chose the Brand</h2>
        <hr style="border: none; height: 3px; color: #000; background-color: #000;">
    </div>

    <!-- brand filter -->
    <div class="row px-5" id="brandFilter">
        <!-- card 01 -->
         <a href="#" data-brand="all" class="col me-2 card shadow brand-filter active">
             <div class="card-body justyfy-content-center align-items-center text-center d-flex">
                 <h1>All</h1>
             </div>
         </a>
        <a href="#" data-brand="lamborghini" class="col me-2 card shadow brand-filter">
            <div class="card-body">
            <img src="../../img/lambologo.png" class="card-img-top partner-logo" alt="...">
            </div>
        </a>
        <a href="#" data-brand="bmw" class="col me-2 card shadow brand-filter">
            <div class="card-body">
            <img src="../../img/bmwlogo.png" class="card-img-top partner-logo" alt="...">
            </div>
        </a>
        <a href="#" data-brand="mercedes" class="col me-2 card shadow brand-filter">
            <div class="card-body">
            <img src="../../img/merchedeslogo.png" class="card-img-top partner-logo" alt="...">
            </div>
        </a>
        <a href="#" data-brand="porsche" class="col me-2 card shadow brand-filter">
            <div class="card-body">
            <img src="../../img/porschelogo.png" class="card-img-top partner-logo" alt="...">
            </div>
        </a>
        <a href="#" data-brand="ferrari" class="col card shadow brand-filter">
            <div class="card-body">
            <img src="../../img/ferarrilogo.png" class="card-img-top partner-logo" alt="...">
            </div>
        </a>
    </div>

    <hr style="border: 2px solid black;">

    <!-- search -->
    <div class="mt-4 p-5">
        <div class="input-group shadow">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input class="form-control" id="searchInput" placeholder="Cari Nama Mobil">
        </div>
    </div>
    <!--  -->

    <div class="container py-5">
        <div class="row">
            <!-- Sidebar Filter -->
            <div class="col-12 col-md-3 mb-4">
                <h5 class="mb-2 fw-bold">Filter</h5>
                <hr class="w-25 mb-4">

                <div class="form-check mb-2">
                    <input class="form-check-input type-filter" type="radio" name="radioDefault" id="radioDefault0" value="all" checked>
                    <label class="form-check-label fw-bold" for="radioDefault0">
                        All
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input type-filter" type="radio" name="radioDefault" id="radioDefault1" value="sedan">
                    <label class="form-check-label fw-bold" for="radioDefault1">
                        Sedan
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input type-filter" type="radio" name="radioDefault" id="radioDefault2" value="hatchback">
                    <label class="form-check-label fw-bold" for="radioDefault2">
                        Hatchback
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input type-filter" type="radio" name="radioDefault" id="radioDefault3" value="suv">
                    <label class="form-check-label fw-bold" for="radioDefault3">
                        SUV
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input type-filter" type="radio" name="radioDefault" id="radioDefault4" value="supercar">
                    <label class="form-check-label fw-bold" for="radioDefault4">
                        Super Car
                    </label>
                </div>
            </div>

            <!-- Cars list Cards -->
            <div class="col-12 col-md-9">
                <div class="row g-3" id="carsContainer">
                    <?php
                    include('../../connections/koneksi.php');
                    $query = "SELECT * FROM dm_mobil_tbl ORDER BY tanggal_dibuat DESC";
                    $result = mysqli_query($connection, $query);
                    if ($result && mysqli_num_rows($result) > 0):
                        foreach ($result as $car):
                    ?>
                        <div class="col-6 col-md-4 col-lg-3 car-card"
                            data-brand="<?= htmlspecialchars(strtolower($car['merek_mobil'])) ?>"
                            data-type="<?= htmlspecialchars(strtolower($car['tipe_mobil'])) ?>"
                            data-name="<?= htmlspecialchars(strtolower($car['nama_mobil'])) ?>">
                            <a href="detailmobil.php?id=<?= $car['id_mobil'] ?>" style="text-decoration: none; color: inherit;">
                                <div class="card shadow h-100">
                                    <img src="../../<?= htmlspecialchars($car['gambar_mobil_overview']) ?>" class="card-img-top" alt="<?= htmlspecialchars($car['nama_mobil']) ?>" style="height: 200px; object-fit: cover;">
                                    <div class="card-footer d-flex align-items-center">
                                        <span class="me-2"><?= htmlspecialchars(ucfirst($car['merek_mobil'])) ?></span>
                                        <h6 class="mb-0"><b><?= htmlspecialchars($car['nama_mobil']) ?></b></h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                        endforeach;
                    else:
                    ?>
                        <div class="col-12">
                            <div class="alert alert-warning text-center">No cars available.</div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- pagination -->
                <div class="d-flex justify-content-center mt-4">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination"></ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php // Footer 
    ?>
    <footer class="py-4 bg-dark text-light text-center">
        <div class="container">
            <small>&copy; Nordique Autohaus 2025</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // --- FILTERING LOGIC ---
        const itemsPerPage = 16;
        let currentPage = 1;
        let currentBrand = "all";
        let currentType = "all";
        let currentSearch = "";

        const carCards = Array.from(document.querySelectorAll('.car-card'));
        const pagination = document.querySelector('.pagination');
        const brandLinks = document.querySelectorAll('.brand-filter');
        const typeRadios = document.querySelectorAll('.type-filter');
        const searchInput = document.getElementById('searchInput');

        // Helper: filter cars based on current filters
        function getFilteredCars() {
            return carCards.filter(card => {
                const brand = card.getAttribute('data-brand');
                const type = card.getAttribute('data-type');
                const name = card.getAttribute('data-name');
                let brandMatch = (currentBrand === "all") || (brand === currentBrand);
                let typeMatch = (currentType === "all") || (type === currentType);
                let searchMatch = (currentSearch === "") || (name.includes(currentSearch));
                return brandMatch && typeMatch && searchMatch;
            });
        }

        // Show/hide cards based on filter and pagination
        function updateVisibleCards() {
            const filtered = getFilteredCars();
            carCards.forEach(card => card.style.display = "none");
            filtered.forEach((card, idx) => {
                card.style.display = (idx >= (currentPage - 1) * itemsPerPage && idx < currentPage * itemsPerPage) ? "block" : "none";
            });
        }

        // Render pagination for filtered results
        function renderPagination() {
            const filtered = getFilteredCars();
            const totalPages = Math.ceil(filtered.length / itemsPerPage) || 1;
            pagination.innerHTML = "";

            // Prev
            const prevLi = document.createElement("li");
            prevLi.className = "page-item" + (currentPage === 1 ? " disabled" : "");
            prevLi.innerHTML = `<a class="page-link rounded-circle" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>`;
            prevLi.addEventListener("click", function(e) {
                e.preventDefault();
                if (currentPage > 1) {
                    currentPage--;
                    updateVisibleCards();
                    renderPagination();
                }
            });
            pagination.appendChild(prevLi);

            // Page numbers
            for (let i = 1; i <= totalPages; i++) {
                const li = document.createElement("li");
                li.className = "page-item" + (i === currentPage ? " active" : "");
                li.innerHTML = `<a class="page-link rounded-circle hover-primary" href="#">${i}</a>`;
                li.addEventListener("click", function(e) {
                    e.preventDefault();
                    currentPage = i;
                    updateVisibleCards();
                    renderPagination();
                });
                pagination.appendChild(li);
            }

            // Next
            const nextLi = document.createElement("li");
            nextLi.className = "page-item" + (currentPage === totalPages ? " disabled" : "");
            nextLi.innerHTML = `<a class="page-link rounded-circle" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>`;
            nextLi.addEventListener("click", function(e) {
                e.preventDefault();
                if (currentPage < totalPages) {
                    currentPage++;
                    updateVisibleCards();
                    renderPagination();
                }
            });
            pagination.appendChild(nextLi);
        }

        // --- EVENT HANDLERS ---

        // Brand filter
        brandLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                brandLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
                currentBrand = this.getAttribute('data-brand');
                currentPage = 1;
                updateVisibleCards();
                renderPagination();
            });
        });

        // Type filter
        typeRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                currentType = this.value;
                currentPage = 1;
                updateVisibleCards();
                renderPagination();
            });
        });

        // Search filter
        searchInput.addEventListener('input', function() {
            currentSearch = this.value.trim().toLowerCase();
            currentPage = 1;
            updateVisibleCards();
            renderPagination();
        });

        // --- INITIALIZE ---
        // Set initial type filter from checked radio
        const checkedType = document.querySelector('.type-filter:checked');
        if (checkedType) currentType = checkedType.value;

        updateVisibleCards();
        renderPagination();
    </script>

</body>

</html>
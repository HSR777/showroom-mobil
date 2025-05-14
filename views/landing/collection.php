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
        box-shadow: 0 0 0 4px #0d6efd66, 0 2px 8px rgba(0, 0, 0, 0.08);
        border: 2px solid #0d6efd;
        z-index: 1;
    }

    /* Full width brand filter buttons */
    .brand-filter-row {
        margin-left: 0 !important;
        margin-right: 0 !important;
        gap: 12px 0;
    }

    .brand-filter {
        width: 100%;
        min-width: 0;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 200px;
        height: 100%;
    }

    .brand-filter .card-body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100px;
        min-height: 100px;
        /* Ensures all cards have the same height */
    }

    @media (min-width: 768px) {
        .brand-filter .card-body {
            height: 120px;
            min-height: 120px;
        }
    }

    /* Make brand filter images smaller */
    .brand-filter .partner-logo {
        max-height: 100px;
        width: auto;
        margin: 0 auto;
        display: block;
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
    <div class="row g-2 mb-3 brand-filter-row px-5">
        <!-- card 01 -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-2 d-flex">
            <a href="#" data-brand="all" class="card shadow brand-filter justify-content-center align-items-center text-center active" style="text-decoration: none;">
                <div class="card-body justify-content-center align-items-center text-center d-flex">
                    <h1 class="text-dark">All</h1>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-2 d-flex">
            <a href="#" data-brand="lamborghini" class="card shadow brand-filter justify-content-center align-items-center text-center">
                <div class="card-body">
                    <img src="../../img/lambologo.png" class="card-img-top partner-logo" alt="...">
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-2 d-flex">
            <a href="#" data-brand="bmw" class="card shadow brand-filter justify-content-center align-items-center text-center">
                <div class="card-body">
                    <img src="../../img/bmwlogo.png" class="card-img-top partner-logo" alt="...">
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-2 d-flex">
            <a href="#" data-brand="mercedes" class="card shadow brand-filter justify-content-center align-items-center text-center">
                <div class="card-body">
                    <img src="../../img/merchedeslogo.png" class="card-img-top partner-logo" alt="...">
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-2 d-flex">
            <a href="#" data-brand="porsche" class="card shadow brand-filter justify-content-center align-items-center text-center">
                <div class="card-body">
                    <img src="../../img/porschelogo.png" class="card-img-top partner-logo" alt="...">
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-2 d-flex">
            <a href="#" data-brand="ferrari" class="card shadow brand-filter justify-content-center align-items-center text-center">
                <div class="card-body">
                    <img src="../../img/ferarrilogo.png" class="card-img-top partner-logo" alt="...">
                </div>
            </a>
        </div>
    </div>

    <hr style="border: 2px solid black;">

    <!-- search -->
    <div class="m-5">
        <div class="input-group">
            <span class="input-group-text bg-white border-end-0 rounded-start-pill" style="padding: 2rem;">
                <i class="bi bi-search"></i>
            </span>
            <input class="form-control border-start-0 rounded-end-pill"
                id="searchInput" placeholder="Cari Nama Mobil" style="border-left: none; font-size: medium;">
        </div>
    </div>
    <!--  -->

    <div class="container-fluid">
        <div class="row m-5">
            <!-- Sidebar Filter -->
            <div class="col-6 col-md-3 mb-3">
                <h5 class="mb-2 fw-bold text-center">Filter</h5>
                <hr class="w-100 mb-4">

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
            <div class="col-6 col-md-9">
                <div class="row g-3" id="carsContainer">
                    <?php
                    include('../../connections/koneksi.php');
                    $query = "SELECT * FROM dm_mobil_tbl ORDER BY tanggal_dibuat DESC";
                    $result = mysqli_query($connection, $query);
                    if ($result && mysqli_num_rows($result) > 0):
                        foreach ($result as $car):
                            // Map brand to logo filename
                            $brand = strtolower($car['merek_mobil']);
                            $brandLogo = '';
                            switch ($brand) {
                                case 'lamborghini':
                                    $brandLogo = '../../img/lambologo.png';
                                    break;
                                case 'bmw':
                                    $brandLogo = '../../img/bmwlogo.png';
                                    break;
                                case 'mercedes':
                                case 'mercedez':
                                    $brandLogo = '../../img/merchedeslogo.png';
                                    break;
                                case 'porsche':
                                    $brandLogo = '../../img/porschelogo.png';
                                    break;
                                case 'ferrari':
                                    $brandLogo = '../../img/ferarrilogo.png';
                                    break;
                                default:
                                    $brandLogo = '';
                            }
                    ?>
                            <div class="col-6 col-md-4 col-lg-3 car-card"
                                data-brand="<?= htmlspecialchars($brand) ?>"
                                data-type="<?= htmlspecialchars(strtolower($car['tipe_mobil'])) ?>"
                                data-name="<?= htmlspecialchars(strtolower($car['nama_mobil'])) ?>">
                                <a href="detailmobil.php?id=<?= $car['id_mobil'] ?>" style="text-decoration: none; color: inherit;">
                                    <div class="card shadow h-100">
                                        <img src="../../<?= htmlspecialchars($car['gambar_mobil_overview']) ?>" class="card-img-top" alt="<?= htmlspecialchars($car['nama_mobil']) ?>" style="height: 200px; object-fit: cover;">
                                        <div class="card-footer d-flex align-items-center">
                                            <?php if ($brandLogo): ?>
                                                <img src="<?= $brandLogo ?>" alt="<?= htmlspecialchars($car['merek_mobil']) ?>" style="height:22px; width:auto; margin-right:8px;">
                                            <?php endif; ?>
                                            <!-- <span class="me-2">
                                                <?= htmlspecialchars(ucfirst($car['merek_mobil'])) ?>
                                            </span> -->
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
        const itemsPerPage = 8; // Number of car cards per page
        let currentPage = 1; // Current pagination page
        let currentBrand = "all"; // Currently selected brand filter
        let currentType = "all"; // Currently selected type filter
        let currentSearch = ""; // Current search query

        const carCards = Array.from(document.querySelectorAll('.car-card')); // All car card elements
        const pagination = document.querySelector('.pagination'); // Pagination container
        const brandLinks = document.querySelectorAll('.brand-filter'); // Brand filter buttons
        const typeRadios = document.querySelectorAll('.type-filter'); // Type radio filters
        const searchInput = document.getElementById('searchInput'); // Search input field

        // Helper: filter cars based on current filters
        function getFilteredCars() { // Returns filtered car cards based on current filters
            return carCards.filter(card => { // Filter each car card
                const brand = card.getAttribute('data-brand'); // Get brand from data attribute
                const type = card.getAttribute('data-type'); // Get type from data attribute
                const name = card.getAttribute('data-name'); // Get name from data attribute
                let brandMatch = (currentBrand === "all") || (brand === currentBrand); // Match brand or 'all'
                let typeMatch = (currentType === "all") || (type === currentType); // Match type or 'all'
                let searchMatch = (currentSearch === "") || (name.includes(currentSearch)); // Match search or empty
                return brandMatch && typeMatch && searchMatch; // Return true if all match
            });
        }

        // Show/hide cards based on filter and pagination
        function updateVisibleCards() { // Update which car cards are visible based on filters and pagination
            const filtered = getFilteredCars(); // Get filtered car cards
            carCards.forEach(card => card.style.display = "none"); // Hide all cards
            filtered.forEach((card, idx) => { // Show only cards for current page
                card.style.display = (idx >= (currentPage - 1) * itemsPerPage && idx < currentPage * itemsPerPage) ? "block" : "none"; // Show if in page range
            });
        }

        // Render pagination for filtered results
        function renderPagination() {
            const filtered = getFilteredCars(); // Get filtered car cards
            const totalPages = Math.ceil(filtered.length / itemsPerPage) || 1; // Calculate total pages
            pagination.innerHTML = ""; // Clear pagination

            // Prev
            const prevLi = document.createElement("li"); // Create previous button
            prevLi.className = "page-item" + (currentPage === 1 ? " disabled" : ""); // Disable if on first page
            prevLi.innerHTML = `<a class="page-link rounded-circle" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>`; // Set inner HTML
            prevLi.addEventListener("click", function(e) { // Add click event
                e.preventDefault();
                if (currentPage > 1) { // Go to previous page if not first
                    currentPage--;
                    updateVisibleCards();
                    renderPagination();
                }
            });
            pagination.appendChild(prevLi); // Add to pagination

            // Page numbers
            for (let i = 1; i <= totalPages; i++) { // Loop through pages
                const li = document.createElement("li"); // Create page number button
                li.className = "page-item" + (i === currentPage ? " active" : ""); // Mark active page
                li.innerHTML = `<a class="page-link rounded-circle hover-primary" href="#">${i}</a>`; // Set inner HTML
                li.addEventListener("click", function(e) { // Add click event
                    e.preventDefault();
                    currentPage = i; // Set current page
                    updateVisibleCards();
                    renderPagination();
                });
                pagination.appendChild(li); // Add to pagination
            }

            // Next
            const nextLi = document.createElement("li"); // Create next button
            nextLi.className = "page-item" + (currentPage === totalPages ? " disabled" : ""); // Disable if on last page
            nextLi.innerHTML = `<a class="page-link rounded-circle" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>`; // Set inner HTML
            nextLi.addEventListener("click", function(e) { // Add click event
                e.preventDefault();
                if (currentPage < totalPages) { // Go to next page if not last
                    currentPage++;
                    updateVisibleCards();
                    renderPagination();
                }
            });
            pagination.appendChild(nextLi); // Add to pagination
        }

        // --- EVENT HANDLERS ---

        // Brand filter
        brandLinks.forEach(link => { // Brand filter event
            link.addEventListener('click', function(e) { // On brand filter click
                e.preventDefault(); // Prevent default link
                brandLinks.forEach(l => l.classList.remove('active')); // Remove active from all
                this.classList.add('active'); // Add active to clicked
                currentBrand = this.getAttribute('data-brand'); // Set current brand
                currentPage = 1; // Reset to first page
                updateVisibleCards(); // Update visible cards
                renderPagination(); // Update pagination
            });
        });

        // Type filter
        typeRadios.forEach(radio => { // Type radio event
            radio.addEventListener('change', function() { // On type change
                currentType = this.value; // Set current type
                currentPage = 1; // Reset to first page
                updateVisibleCards(); // Update visible cards
                renderPagination(); // Update pagination
            });
        });

        // Search filter
        searchInput.addEventListener('input', function() { // On search input
            currentSearch = this.value.trim().toLowerCase(); // Set search query
            currentPage = 1; // Reset to first page
            updateVisibleCards(); // Update visible cards
            renderPagination(); // Update pagination
        });

        // --- INITIALIZE ---
        // Set initial type filter from checked radio
        const checkedType = document.querySelector('.type-filter:checked'); // Get checked type
        if (checkedType) currentType = checkedType.value; // Set if exists

        updateVisibleCards(); // Initial card update
        renderPagination(); // Initial pagination
    </script>
</body>

</html>
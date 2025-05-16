<style>
    .navbar-nav .nav-link {
        position: relative;
        padding-bottom: 6px;
        border-bottom: 2px solid transparent;
        color: #fff !important;
        transition: all 0.3s ease;
    }

    /* Ensure CSS is applied correctly */
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    /* .navbar {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
        } */


    /* Hover: garis bawah muncul */
    .navbar-nav .nav-link:hover {
        border-bottom: 2px solid #D4AF37;
    }

    /* Aktif: garis bawah tetap */
    .navbar-nav .nav-link.active {
        border-bottom: 2px solid #D4AF37;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .feature-icon {
        font-size: 2rem;
        color: #D4AF37;
    }

    .feature {
        background-color: #3775F1;
    }

    .partner-logo {
        max-width: 5rem;
        height: auto;
        margin: 0 15px;
    }

    .schedule-section {
        background-color: #f8f9fa;
        padding: 60px 0;
    }

    .partner-logo {
        max-width: 150px;
        height: auto;
        margin: 0 15px;
        object-fit: cover;
    }
</style>

<?php
// Navbar file for reuse
?>
<nav class="navbar navbar-expand-lg" style="display: flex; justify-content: space-between; align-items: center; padding: 1.4rem 7%; background-color: rgba(1, 1, 1, 0.31); position: fixed; top: 0; left: 0; right: 0; z-index: 9999;">
    <div class="container-fluid text-light">
        <a href="#home" class="navbar-brand text-light" style="font-family: 'Cinzel', serif; font-size: 1.5rem; font-weight: bold;">
            Nordique Autohaus
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="border: none;">
            <span class="navbar-toggler-icon" style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 30 30%27%3E%3Cpath stroke=%27rgba%28255, 255, 255, 0.55%29%27 stroke-width=%272%27 stroke-linecap=%27round%27 stroke-miterlimit=%2710%27 d=%27M4 7h22M4 15h22M4 23h22%27/%3E%3C/svg%3E');"></span>
        </button>
        <div class="collapse navbar-collapse fw-medium" style="font-family: Poppins;" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="collection.php">Our Collection</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
            </ul>
            <a href="collection.php" class="btn rounded-pill fw-semibold" type="button" style="background: linear-gradient(to right, #3775F1, #20438B); color: white; border: none; font-family: Poppins">Explore Our Collections</a>
        </div>
    </div>
</nav>
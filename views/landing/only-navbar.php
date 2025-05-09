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
        <div class="collapse navbar-collapse fw-medium" style="font-family: Poppins;" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#collection">Our Collection</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About Us</a>
                </li>
            </ul>

            <button class="btn rounded-pill fw-semibold" type="button" style="background: linear-gradient(to right, #3775F1, #20438B); color: white; border: none; font-family: Poppins">Reserve Your Visit</button>
        </div>
    </div>
</nav>
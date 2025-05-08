<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap">
    <style>
        /* Border bawah tetap */
        .navbar-nav .nav-link {
            position: relative;
            padding-bottom: 6px;
            border-bottom: 2px solid transparent;
            color: #fff !important;
            /* pastikan warnanya tetap putih */
            transition: all 0.3s ease;
        }

        /* Hover: garis bawah muncul */
        .navbar-nav .nav-link:hover {
            border-bottom: 2px solid #D4AF37;
        }

        /* Aktif: garis bawah tetap */
        .navbar-nav .nav-link.active {
            border-bottom: 2px solid #D4AF37;
        }

        .hero {
            position: relative;
            height: 75vh;
            color: white;
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

        .partner-logo {
            max-height: 60px;
            margin: 0 15px;
        }

        .schedule-section {
            background-color: #f8f9fa;
            padding: 60px 0;
        }

        
    </style>


</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg" style="display: flex; justify-content: space-between; align-items: center; padding: 1.4rem 7%; background-color: rgba(1, 1, 1, 0.31); position: fixed; top: 0; left: 0; right: 0; z-index: 9999;">
        <div class="container-fluid text-light">
            <a href="#home" class="navbar-brand text-light" style="font-family: 'Cinzel', serif; font-size: 1.5rem; font-weight: bold;">
                Nordique Autohaus
            </a>
            <div class="collapse navbar-collapse fw-medium" style="font-family: Poppins;" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#home">Home</a>
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
    <!-- Navbar End -->

    <!-- Hero Section Start -->
    <div class="container-fluid p-0" style="height: 100vh; background: url('../img/cover.jpg') no-repeat center center; background-size: cover; position: relative; z-index: -1;">
        <div class="d-flex align-items-center justify-content-center h-100">
            <div class="text-position-fixed top-5 start-70 translate-middle text-white">
                <h1 style="text-shadow: 2px 2px #000000; color : white; font-family: Poppins; font-size: 2.8rem;">Welcome to Nordique Autohaus</h1>
                <p class="text-center" style="text-shadow: 2px 2px #000000; color : white; font-size: 1.8rem;">Temukan Mobil Impian Anda</p>
                <div class="d-flex flex-column align-items-center">
                    <button class="btn fw-semibold text-center mt-3 btn btn-lg" type="button" style="background: linear-gradient(to right, #3775F1, #20438B); color: white;  font-family: Poppins">Reserve Your Visit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- start -->
    <?php // Features Section 
    ?>
    <section class="py-5 text-center">
        <div class="container">
            <h2 class="mb-5">Kenapa Pilih Kami</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4">
                        <div class="feature-icon mb-3"><i class="bi bi-car-front-fill"></i></div>
                        <h5>Koleksi Variatif</h5>
                        <p>Beragam pilihan mobil premium yang selalu update.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4">
                        <div class="feature-icon mb-3"><i class="bi bi-currency-dollar"></i></div>
                        <h5>Harga Kompetitif</h5>
                        <p>Penawaran terbaik untuk setiap budget Anda.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4">
                        <div class="feature-icon mb-3"><i class="bi bi-headset"></i></div>
                        <h5>Pelayanan Terbaik</h5>
                        <p>Tim professional siap membantu Anda 24/7.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end -->

    <!--  -->
    <?php // Partners Section 
    ?>
    <section id="collection" class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="mb-4">Partner Kami</h2>
            <div class="row d-flex justify-content-center align-items-center flex-wrap">
                <div class="card col">
                    <img src="logos/lamborghini.png" alt="Lamborghini" class="partner-logo">
                </div>
                <div class="card col">
                    <img src="logos/lamborghini.png" alt="Lamborghini" class="partner-logo">
                </div>
                <div class="card col">
                    <img src="logos/lamborghini.png" alt="Lamborghini" class="partner-logo">
                </div>
                <div class="card col">
                    <img src="logos/lamborghini.png" alt="Lamborghini" class="partner-logo">
                </div>
                <div class="card col">
                    <img src="logos/lamborghini.png" alt="Lamborghini" class="partner-logo">
                </div>
            </div>
        </div>
    </section>
    <!-- end -->

    <!-- Start -->
    <?php // Schedule Section 
    ?>
    <section id="schedule" class="schedule-section">
        <div class="container">
            <h2 class="text-center mb-5">Tentukan Jadwal Anda</h2>
            <div class="row g-4">
                <div class="col-lg-6">
                    <form action="submit_schedule.php" method="post">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">Nama Depan</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Nama Belakang</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Nomor Telepon</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Tanggal Pertemuan</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label">Jam Pertemuan</label>
                            <input type="time" class="form-control" id="time" name="time" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 rounded-pill">Konfirmasi</button>
                    </form>
                </div>
                <div class="col-lg-6">
                    <iframe src="https://www.google.com/maps/embed?..." width="100%" height="100%" style="border:0; min-height: 400px;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- end -->

    <?php // Footer 
    ?>
    <footer class="py-4 bg-dark text-light text-center">
        <div class="container">
            <small>&copy; Nordique Autohaus 2025</small>
        </div>
    </footer>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
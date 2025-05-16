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

        /* .partner-logo {
            max-width: 5rem;
            height: auto;
            margin: 0 15px;
        } */

        .schedule-section {
            background-color: #f8f9fa;
            padding: 60px 0;
        }

        .partner-logo {
            max-height: 150px;
            /* min-height: 10rem;
            max-width: auto; */
            object-fit: cover;
        }
    </style>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="arcticons--bestprice" viewBox="0 0 48 48">
            <circle cx="24" cy="24" r="21.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="m23.434 24.869l1.389 7.876m-14.435 2.572L9 27.44l2.556-.45a2.7 2.7 0 0 1 .964 5.312l-.026.004l-2.556.45m7.564 1.306l-1.389-7.876l2.56-.452a2.7 2.7 0 0 1 .967 5.312l-.03.005l-2.56.451m2.747-.49l2.922 2.129m17.105-4.027a2.66 2.66 0 0 1-1.896 1.347h0a2.686 2.686 0 0 1-3.12-2.166l-.005-.022l-.451-2.56a2.69 2.69 0 0 1 2.187-3.129h0a2.82 2.82 0 0 1 2.243.621m-5.579 2.914l3.349-.59m-3.002 2.558l3.349-.59m-5.18 1.32a2.686 2.686 0 0 1-2.166 3.12l-.023.005h0a2.686 2.686 0 0 1-3.12-2.166l-.004-.022l-.469-2.66a2.68 2.68 0 0 1 2.158-3.12l.03-.006h0a2.603 2.603 0 0 1 3.029 2.205h0m-2.152-12.642l5.22-.92m-1.17 8.327l-1.39-7.876m-18.517 7.372a2 2 0 1 1 .691 3.94l-3.244.573l-1.39-7.877l3.249-.573a1.999 1.999 0 1 1 .69 3.937Zm0 0l-3.248.573m7.955 2.542l3.937-.695m-5.326-7.181l3.937-.694m-3.243 4.632l2.56-.452m-3.254-3.486l1.389 7.876m5.59-1.859a2.38 2.38 0 0 0 2.124.538l1.18-.208a2 2 0 0 0 1.624-2.32h0a2 2 0 0 0-2.32-1.62l-1.28.226a2 2 0 0 1-2.315-1.621h0a2 2 0 0 1 1.625-2.316l1.18-.208a2.16 2.16 0 0 1 2.128.538" stroke-width="1" />
        </symbol>
    </svg>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="famicons--car-sport-sharp" viewBox="0 0 512 512">
            <path fill="currentColor" d="M488 224c-3-5-32.61-17.79-32.61-17.79c5.15-2.66 8.67-3.21 8.67-14.21c0-12-.06-16-8.06-16h-27.14c-.11-.24-.23-.49-.34-.74c-17.52-38.26-19.87-47.93-46-60.95C347.47 96.88 281.76 96 256 96s-91.47.88-126.49 18.31c-26.16 13-25.51 19.69-46 60.95c0 .11-.21.4-.4.74H55.94c-7.94 0-8 4-8 16c0 11 3.52 11.55 8.67 14.21C56.61 206.21 28 220 24 224s-8 32-8 80s4 96 4 96h11.94c0 14 2.06 16 8.06 16h80c6 0 8-2 8-16h256c0 14 2 16 8 16h82c4 0 6-3 6-16h12s4-49 4-96s-5-75-8-80m-362.74 44.94A517 517 0 0 1 70.42 272c-20.42 0-21.12 1.31-22.56-11.44a72.2 72.2 0 0 1 .51-17.51L49 240h3c12 0 23.27.51 44.55 6.78a98 98 0 0 1 30.09 15.06C131 265 132 268 132 268Zm247.16 72L368 352H144s.39-.61-5-11.18c-4-7.82 1-12.82 8.91-15.66C163.23 319.64 208 304 256 304s93.66 13.48 108.5 21.16C370 328 376.83 330 372.42 341Zm-257-136.53a96 96 0 0 1-9.7.07c2.61-4.64 4.06-9.81 6.61-15.21c8-17 17.15-36.24 33.44-44.35c23.54-11.72 72.33-17 110.23-17s86.69 5.24 110.23 17c16.29 8.11 25.4 27.36 33.44 44.35c2.57 5.45 4 10.66 6.68 15.33c-2 .11-4.3 0-9.79-.19Zm347.72 56.11C461 273 463 272 441.58 272a517 517 0 0 1-54.84-3.06c-2.85-.51-3.66-5.32-1.38-7.1a93.8 93.8 0 0 1 30.09-15.06c21.28-6.27 33.26-7.11 45.09-6.69a3.22 3.22 0 0 1 3.09 3a70.2 70.2 0 0 1-.49 17.47Z" />
        </symbol>
    </svg>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="mdi--customer-service" viewBox="0 0 24 24">
            <path fill="currentColor" d="M18.72 14.76c.35-.85.54-1.76.54-2.76c0-.72-.11-1.41-.3-2.05c-.65.15-1.33.23-2.04.23A9.07 9.07 0 0 1 9.5 6.34a9.2 9.2 0 0 1-4.73 4.88c-.04.25-.04.52-.04.78A7.27 7.27 0 0 0 12 19.27c1.05 0 2.06-.23 2.97-.64c.57 1.09.83 1.63.81 1.63c-1.64.55-2.91.82-3.78.82c-2.42 0-4.73-.95-6.43-2.66a9 9 0 0 1-2.24-3.69H2v-4.55h1.09a9.09 9.09 0 0 1 15.33-4.6a9 9 0 0 1 2.47 4.6H22v4.55h-.06L18.38 18l-5.3-.6v-1.67h4.83zm-9.45-2.99c.3 0 .59.12.8.34a1.136 1.136 0 0 1 0 1.6c-.21.21-.5.33-.8.33c-.63 0-1.14-.5-1.14-1.13s.51-1.14 1.14-1.14m5.45 0c.63 0 1.13.51 1.13 1.14s-.5 1.13-1.13 1.13s-1.14-.5-1.14-1.13a1.14 1.14 0 0 1 1.14-1.14" />
        </symbol>
    </svg>

</head>

<body>
    <?php include 'only-navbar.php'; ?>

    <!-- Hero Section Start -->
    <section class="container-fluid p-0 position-relative" style="height: 100vh; background: url('../../img/cover.jpg') no-repeat center center; background-size: cover;">
        <div class="container h-100">
            <div class="row h-100">
                <!-- Kolom kiri: teks + tombol -->
                <div class="col-12 col-lg-6 d-flex flex-column justify-content-center">
                    <h1 class="text-white mb-3" style="text-shadow: 2px 2px #000; font-family: Poppins; font-size: 2.8rem;">
                        Welcome To Nordique Autohaus
                    </h1>
                    <p class="text-white mb-4" style="text-shadow: 2px 2px #000; font-size: 1.8rem;">
                        Temukan Mobil Impian Anda
                    </p>
                    <button type="button" class="btn btn-primary btn-lg">Our Collection</button>
                </div>
                <!-- Kolom kanan kosong -->
                <div class="col-12 col-lg-6"></div>
            </div>
        </div>
    </section>
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
                        <div class="feature-icon mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" viewBox="0 0 512 512">
                                <use href="#famicons--car-sport-sharp" />
                            </svg>
                        </div>
                        <h5>Koleksi Variatif</h5>
                        <p>Kami Memilki bermacam-macam koleksi
                            mobil Eropa yang dimulai dari mobil keluarga hingga
                            mobil untuk pencinta supercar.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-4">
                        <div class="feature-icon mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" viewBox="0 0 48 48">
                                <use href="#arcticons--bestprice" />
                            </svg>
                        </div>
                        <h5>Harga Kompetitif</h5>
                        <p>Mobil-mobil yang kami sediakan memiliki harga
                            yang sangat kompetitif dan sangat cocok untuk
                            segala kalangan.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-4">
                        <div class="feature-icon mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" viewBox="0 0 48 48">
                                <use href="#mdi--customer-service" />
                            </svg>
                        </div>
                        <h5>Pelayanan Terbaik</h5>
                        <p>Kami memiliki pelayanan yang sangat
                            memanjakan customer kami dengan sistem booking yang memudahkan
                            customer kami dan sistem after sales yang melindungi customer.</p>
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
                <div class="col mx-2">
                    <img src="../../statics/images/landing/lamborghini.png" alt="Lamborghini" class="partner-logo">
                </div>
                <div class="col mx-2">
                    <img src="../../statics/images/landing/bmw.png" alt="bmw" class="partner-logo">
                </div>
                <div class="col mx-2">
                    <img src="../../statics/images/landing/ferrari.png" alt="ferrari" class="partner-logo">
                </div>
                <div class="col mx-2">
                    <img src="../../statics/images/landing/mercedes.png" alt="mercedes" class="partner-logo" style="height: 115px;">
                </div>
                <div class="col mx-2">
                    <img src="../../statics/images/landing/porsche.png" alt="porsche" class="partner-logo">
                </div>

            </div>
        </div>
        </div>
    </section>
    <!-- end -->


    <section class="py-5" style="background-color: #f1f1f1;">
        <div class="container">
            <!-- Judul Tengah -->
            <div class="row mb-4">
                <div class="col text-center">
                    <h2>Temukan Kami Di</h2>
                </div>
            </div>

            <!-- Konten: Alamat | Jadwal | Map -->
            <div class="row gx-5">
                <!-- Alamat Showroom -->
                <div class="col-md-4">
                    <h6 class="fw-bold border-bottom border-2 border-dark pb-2 mb-4">Alamat Showroom</h6>
                    <p class="mb-1">Nordique Autohaus</p>
                    <p class="mb-1">Jl. Monteluna Raya No. 88</p>
                    <p class="mb-1">Kawasan Elitairia, Ciprodana</p>
                    <p class="mb-1">Jakarta Selatan 12450</p>
                    <p class="mb-0">Indonesia</p>
                </div>

                <!-- Jadwal Buka -->
                <div class="col-md-4">
                    <h6 class="fw-bold border-bottom border-2 border-dark pb-2 mb-4">Jadwal Buka</h6>
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <?php
                            require_once('../../connections/koneksi.php');
                            $result = mysqli_query($connection, "SELECT * FROM dm_jadwal_tbl ORDER BY FIELD(hari_jadwal, 'senin','selasa','rabu','kamis','jumat','sabtu','minggu')");
                            $hari_map = [
                                'senin' => 'Senin',
                                'selasa' => 'Selasa',
                                'rabu' => 'Rabu',
                                'kamis' => 'Kamis',
                                'jumat' => 'Jumat',
                                'sabtu' => 'Sabtu',
                                'minggu' => 'Minggu'
                            ];
                            while ($row = mysqli_fetch_assoc($result)) {
                                $hari = isset($hari_map[$row['hari_jadwal']]) ? $hari_map[$row['hari_jadwal']] : ucfirst($row['hari_jadwal']);
                                echo "<tr>
                                    <td>{$hari}</td>
                                    <td>" . htmlspecialchars(substr($row['jam_buka'], 0, 5)) . " - " . htmlspecialchars(substr($row['jam_tutup'], 0, 5)) . "</td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Google Maps -->
                <div class="col-md-4">
                    <div class="ratio ratio-4x3 mb-4">
                        <iframe
                            src="https://www.google.com/maps/embed?…"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end -->

    <!-- footer -->
    <?php
    ?>
    <footer class="py-4 bg-dark text-light text-center">
        <div class="container">
            <small>&copy; Nordique Autohaus 2025</small>
        </div>
    </footer>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
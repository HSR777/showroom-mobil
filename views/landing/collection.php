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
</style>

<body>
    <!-- Navbar  -->
    <?php include('only-navbar.php'); ?>

    <!--  -->
    <div class="container-fluid text-light py-5" style="background-color:rgba(26, 26, 26, 0.76);">
        <div class="mt-5" style="margin-right: 15%; margin-left: 15%;">
            <h1 style="background: linear-gradient(to right, #D4AF37, #6E5B1D); -webkit-background-clip: text; color: transparent;">
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

    <!--  -->
    <div class="row px-5">
        <!-- card 01 -->
        <div class="col me-2 card shadow">
            <div class="card-body justyfy-content-center align-items-center text-center d-flex">
                <h1>All</h1>
            </div>
        </div>
        <!-- card 02 -->
        <div class="col me-2 card shadow">
            <div class="card-body">
                <img src="../../img/lambologo.png" class="card-img-top partner-logo" alt="...">
            </div>
        </div>
        <!-- card 02 -->
        <div class="col me-2 card shadow">
            <div class="card-body">
                <img src="../../img/bmwlogo.png" class="card-img-top partner-logo" alt="...">
            </div>
        </div>
        <!-- card 02 -->
        <div class="col me-2 card shadow">
            <div class="card-body">
                <img src="../../img/merchedeslogo.png" class="card-img-top partner-logo" alt="...">
            </div>
        </div>
        <!-- card 02 -->
        <div class="col me-2 card shadow">
            <div class="card-body">
                <img src="../../img/porschelogo.png" class="card-img-top partner-logo" alt="...">
            </div>
        </div>
        <!-- card 02 -->
        <div class="col card shadow">
            <div class="card-body">
                <img src="../../img/ferarrilogo.png" class="card-img-top partner-logo" alt="...">
            </div>
        </div>
    </div>

    <hr style="border: 2px solid black;">


    <!-- search -->

    <div class="mt-4 p-5">
        <div class="input-group shadow">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="search...">
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
                    <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1">
                    <label class="form-check-label fw-bold" for="radioDefault1">
                        Sedan
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault2" checked>
                    <label class="form-check-label fw-bold" for="radioDefault2">
                        Hatchback
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault3">
                    <label class="form-check-label fw-bold" for="radioDefault3">
                        SUV
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault4">
                    <label class="form-check-label fw-bold" for="radioDefault4">
                        Super Car
                    </label>
                </div>
            </div>

            <!-- Brand Cards -->
            <div class="col-12 col-md-9">
                <div class="row g-3">
                    <!-- Card 02: Lamborghini -->
                    <div class="col-6 col-lg-4 col-lg-2">
                        <div class="card shadow h-100">
                            <img src="../../img/bmwm3.jpg" class="card-img-top partner-logo-center" alt="Lamborghini">
                            <div class="card-footer d-flex align-items-center">
                                <img src="../../img/bmwlogo.png" alt="BMW Logo" class="me-2" style="width: 24px; height: 24px;">
                                <h6><b>BMW M4</b></h6>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card 02: Lamborghini -->
                    <div class="col-6 col-lg-4 col-lg-2">
                        <div class="card shadow h-100">
                            <img src="../../img/bmwm4white.jpg" class="card-img-top partner-logo-center" alt="Lamborghini">
                            <div class="card-footer d-flex align-items-center">
                                <img src="../../img/bmwlogo.png" alt="BMW Logo" class="me-2" style="width: 24px; height: 24px;">
                                <h6><b>BMW M4</b></h6>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card 02: Lamborghini -->
                    <div class="col-6 col-lg-4 col-lg-2">
                        <div class="card shadow h-100">
                            <img src="../../img/bmwm3.jpg" class="card-img-top partner-logo-center" alt="Lamborghini">
                            <div class="card-footer d-flex align-items-center">
                                <img src="../../img/bmwlogo.png" alt="BMW Logo" class="me-2" style="width: 24px; height: 24px;">
                                <h6><b>BMW M3</b></h6>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card 02: Lamborghini -->
                    <div class="col-6 col-lg-4 col-lg-2">
                        <div class="card shadow h-100">
                            <img src="../../img/bmwm3.jpg" class="card-img-top partner-logo-center" alt="Lamborghini">
                            <div class="card-footer d-flex align-items-center">
                                <img src="../../img/bmwlogo.png" alt="BMW Logo" class="me-2" style="width: 24px; height: 24px;">
                                <h6><b>BMW M3</b></h6>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card 02: Lamborghini -->
                    <div class="col-6 col-lg-4 col-lg-2">
                        <div class="card shadow h-100">
                            <img src="../../img/bmwm3.jpg" class="card-img-top partner-logo-center" alt="Lamborghini">
                            <div class="card-footer d-flex align-items-center">
                                <img src="../../img/bmwlogo.png" alt="BMW Logo" class="me-2" style="width: 24px; height: 24px;">
                                <h6><b>BMW M3</b></h6>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card 02: Lamborghini -->
                    <div class="col-6 col-lg-4 col-lg-2">
                        <div class="card shadow h-100">
                            <img src="../../img/bmwm3.jpg" class="card-img-top partner-logo-center" alt="Lamborghini">
                            <div class="card-footer d-flex align-items-center">
                                <img src="../../img/bmwlogo.png" alt="BMW Logo" class="me-2" style="width: 24px; height: 24px;">
                                <h6><b>BMW M3</b></h6>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card 02: Lamborghini -->
                    <div class="col-6 col-lg-4 col-lg-2">
                        <div class="card shadow h-100">
                            <img src="../../img/bmwm3.jpg" class="card-img-top partner-logo-center" alt="Lamborghini">
                            <div class="card-footer d-flex align-items-center">
                                <img src="../../img/bmwlogo.png" alt="BMW Logo" class="me-2" style="width: 24px; height: 24px;">
                                <h6><b>BMW M3</b></h6>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card 02: Lamborghini -->
                    <div class="col-6 col-lg-4 col-lg-2">
                        <div class="card shadow h-100">
                            <img src="../../img/bmwm3.jpg" class="card-img-top partner-logo-center" alt="Lamborghini">
                            <div class="card-footer d-flex align-items-center">
                                <img src="../../img/bmwlogo.png" alt="BMW Logo" class="me-2" style="width: 24px; height: 24px;">
                                <h6><b>BMW M3</b></h6>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card 02: Lamborghini -->
                    <div class="col-6 col-lg-4 col-lg-2">
                        <div class="card shadow h-100">
                            <img src="../../img/bmwm3.jpg" class="card-img-top partner-logo-center" alt="Lamborghini">
                            <div class="card-footer d-flex align-items-center">
                                <img src="../../img/bmwlogo.png" alt="BMW Logo" class="me-2" style="width: 24px; height: 24px;">
                                <h6><b>BMW M3</b></h6>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card 02: Lamborghini -->
                    <div class="col-6 col-lg-4 col-lg-2">
                        <div class="card shadow h-100">
                            <img src="../../img/bmwm3.jpg" class="card-img-top partner-logo-center" alt="Lamborghini">
                            <div class="card-footer d-flex align-items-center">
                                <img src="../../img/bmwlogo.png" alt="BMW Logo" class="me-2" style="width: 24px; height: 24px;">
                                <h6><b>BMW M3</b></h6>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card 02: Lamborghini -->
                    <div class="col-6 col-lg-4 col-lg-2">
                        <div class="card shadow h-100">
                            <img src="../../img/bmwm3.jpg" class="card-img-top partner-logo-center" alt="Lamborghini">
                            <div class="card-footer d-flex align-items-center">
                                <img src="../../img/bmwlogo.png" alt="BMW Logo" class="me-2" style="width: 24px; height: 24px;">
                                <h6><b>BMW M3</b></h6>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card 02: Lamborghini -->
                    <div class="col-6 col-lg-4 col-lg-2">
                        <div class="card shadow h-100">
                            <img src="../../img/bmwm3.jpg" class="card-img-top partner-logo-center" alt="Lamborghini">
                            <div class="card-footer d-flex align-items-center">
                                <img src="../../img/bmwlogo.png" alt="BMW Logo" class="me-2" style="width: 24px; height: 24px;">
                                <h6><b>BMW M3</b></h6>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <!-- pagination -->
                <div class="d-flex justify-content-center mt-4">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link rounded-circle" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link rounded-circle hover-primary" href="#">1</a></li>
                            <li class="page-item"><a class="page-link rounded-circle hover-primary" href="#">2</a></li>
                            <li class="page-item"><a class="page-link rounded-circle hover-primary" href="#">3</a></li>
                            <li class="page-item"><a class="page-link rounded-circle hover-primary" href="#">4</a></li>
                            <li class="page-item"><a class="page-link rounded-circle hover-primary" href="#">5</a></li>
                            <li class="page-item"><a class="page-link rounded-circle hover-primary" href="#">...</a></li>
                            <li class="page-item">
                                <a class="page-link rounded-circle" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!--  -->
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

</body>

</html>
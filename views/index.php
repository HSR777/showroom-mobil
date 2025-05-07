<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap">
    <style>
        .navbar-nav .nav-link:hover {
            color: #D4AF37 !important; /* Change text color on hover */
            transition: color 0.3s ease-in-out; /* Smooth transition */
            border-bottom: 2px solid #D4AF37; /* Add underline effect */
        }

        .navbar-nav .nav-link {
            position: relative;
        }

        .navbar-nav .nav-link:hover::after {
            width: 100%;
            left: 0;
        }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(255, 255, 255, 0.5); backdrop-filter: blur(10px); position: fixed; width: 100%; z-index: 1;">
        <div class="container-fluid">
            <button class="btn rounded-pill fw-semibold" type="button" style="background: linear-gradient(to right, #D4AF37, #6E5B1D); color: white; border: none; font-family: Cinzel;">Nordique Autohaus</button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse fw-medium" style="font-family: Poppins;" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Our Collection</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                </ul>
                <button class="btn rounded-pill fw-semibold" type="button" style="background: linear-gradient(to right, #3775F1, #20438B); color: white; border: none; font-family: Poppins">Reserve Your Visit</button>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Hero Section Start -->
    <div class="container-fluid p-0" style="height: 100vh; background: url('https://images.unsplash.com/photo-1576289681078-d32a1bdcf9b5?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center; background-size: cover; position: relative; z-index: -1;">
        <div class="d-flex align-items-center justify-content-center h-100">
            <div class="text-position-absolute top-5 start-70 translate-middle text-white" style="background: rgba(0, 0, 0, 0.5); padding: 20px; border-radius: 10px;">
                <h1 style="font-family: Poppins; font-size: 2rem;">Welcome to Nordique Autohaus</h1>
                <p style="font-size: 1.5rem;">Temukan Mobil Impian Anda</p>
                <button class="btn rounded-pill" type="button" style="background: linear-gradient(to right, #3775F1, #20438B); color: white; border: none; font-size: 1.2rem;">Explore Our Collection</button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
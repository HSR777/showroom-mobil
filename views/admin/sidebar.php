<link rel="stylesheet" href="../../statics/css/admin/sidebar.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!-- sidebar start -->
<div class="col-2 p-0 bg-dark text-white vh-100 d-flex flex-column position-fixed">
    <!-- Groub 01 -->
    <div class="mx-0 my-2 text-center">
        <a href="dashboard.php" style="text-decoration: none;">
            <h3 class="p-2 fw-bold" style="color: #D4AF37; font-family: 'Cinzel', serif;">Nordique Autohaus</h3>
        </a>
        <hr>
    </div>
    <ul class="nav flex-column w-100">
        <li class="nav-item">
            <a class="nav-link active" href="dashboard.php">
                <i class="bi bi-house-door"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="manajemen-mobil.php">
                <i class="bi bi-car-front"></i> Manajemen mobil
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="manajemen-booking.php">
                <i class="bi bi-calendar-check"></i> Manajemen Booking
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-envelope"></i> Manajemen Email
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-cash-stack"></i> Manajemen Transaksi
            </a>
        </li>
    </ul>
    <!-- Groub 01 End -->
    <div class="mt-auto mb-3 text-center d-grid">
        <hr>
        <a href="../../logics/admin/logout.php" class="btn btn-outline-danger" style="border-radius: 0;">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </div>
</div>
<!-- sidebar end -->
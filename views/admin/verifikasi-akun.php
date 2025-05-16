<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .image-container img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- col 01 -->
            <div class="col-4 bg-dark text-white text-center vh-100 d-flex align-items-center justify-content-center">
                <div class="w-100 p-5 mb-5">
                    <h1 class="mb-5">Verifikasi Akun</h1>
                    <form action="../../logics/admin/forgot-password.php" method="post" class="mb-3">
                        <div class="mb-3">
                            <!-- <label for="username" class="form-label">Username</label> -->
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                        </div>
                        <div class="mb-3">
                            <!-- <label for="password" class="form-label">Password</label> -->
                            <input type="number" class="form-control" id="recovery_key" name="recovery_key" placeholder="Kode Pemulihan" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" name="verify">Verifikasi</button>
                    </form>
                    <a href="login.php" class="btn btn-outline-success w-100">Kembali</a>
                </div>
            </div>
            <!-- col 01 end -->
            <!-- col 02 -->
            <div class="col-8 bg-light text-center vh-100 d-flex align-items-center justify-content-center image-container p-0">
                <img src="../../statics/images/admin/graham-pengelly-IWkw2SaGtvk-unsplash 1.png" alt="Lamborghini">
            </div>
            <!-- col 02 end -->
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
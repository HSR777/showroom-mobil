<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password</title>
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
                    <form action="" method="post" class="mb-3">
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Ketikan password baru" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="ketikan ulang password baru" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
                    </form>
                </div>
            </div>
            <!-- col 01 end -->
            <!-- col 02 -->
            <div class="col-8 bg-light text-center vh-100 d-flex align-items-center justify-content-center image-container p-0">
                <img src="../../statics/images/admin/image 4.png" alt="BMW M3">
            </div>
            <!-- col 02 end -->
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
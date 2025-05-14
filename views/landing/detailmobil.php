<?php
include('../../connections/koneksi.php');
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$car = null;
if ($id > 0) {
    $result = mysqli_query($connection, "SELECT * FROM dm_mobil_tbl WHERE id_mobil = $id LIMIT 1");
    if ($result && mysqli_num_rows($result) > 0) {
        $car = mysqli_fetch_assoc($result);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mobil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap">

</head>

<body>
    <!-- Navbar -->
    <?php include('only-navbar.php'); ?>
    <!-- end -->

    <?php if ($car): ?>
    <!-- Hero Section Start -->
    <section class="container-fluid p-0 position-relative" style="height: 60vh; background: url('../../<?= htmlspecialchars($car['gambar_mobil']) ?>') no-repeat center center; background-size: cover;">
        <div class="container h-100">
            <div class="row h-100">
                <!-- Kolom kiri: teks + tombol -->
                <div class="col-12 col-lg-6 d-flex flex-column justify-content-center text-center text-lg-start" style="margin-top: 50px;">
                    <div class="d-flex flex-column flex-lg-row align-items-center mb-3">
                        <div>
                            <h1 class="text-white" style="text-shadow: 2px 2px #000; font-family: Poppins; font-size: 2.8rem;">
                                <?= htmlspecialchars(strtoupper($car['nama_mobil'])) ?>
                            </h1>
                            <p class="text-white mb-4" style="text-shadow: 2px 2px #000; font-size: 1.8rem;">
                                <?= htmlspecialchars(ucfirst($car['merek_mobil'])) ?>
                            </p>
                            <button type="button" class="btn btn-primary btn-lg w-100 w-lg-30" onclick="document.getElementById('form-booking').scrollIntoView({ behavior: 'smooth' });">Enquire</button>
                        </div>
                    </div>
                </div>
                <!-- Kolom kanan kosong -->
                <div class="col-12 col-lg-6"></div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- section start -->
    <section class="text-center m-0">
        <div class="container-fluid p-0">
            <div class="row g-0 align-items-center">
                <div class="col-md-6">
                    <div class="p-4">
                        <h2><b>Overview</b></h2>
                        <p><?= nl2br(htmlspecialchars($car['deskripsi_mobil'])) ?></p>
                        <ul class="list-unstyled text-start mx-auto" style="max-width:400px;">
                            <li><b>Type:</b> <?= htmlspecialchars(ucfirst($car['tipe_mobil'])) ?></li>
                            <li><b>Stock:</b> <?= htmlspecialchars($car['stok_mobil']) ?></li>
                            <li><b>Price:</b> Rp. <?= number_format($car['harga_mobil'], 0, ',', '.') ?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 p-0">
                    <img src="../../<?= htmlspecialchars($car['gambar_mobil_overview']) ?>" alt="<?= htmlspecialchars($car['nama_mobil']) ?>" class="img-fluid rounded-0" style="width: 100%; height: auto; margin: 0;">
                </div>
            </div>
        </div>
    </section>
    <!-- end -->
    <?php else: ?>
        <div class="container py-5">
            <div class="alert alert-danger text-center">Car not found.</div>
        </div>
    <?php endif; ?>

    <!-- section Form booking -->
    <section class="py-5" id="form-booking">
        <div class="container">
            <div class="row mb-4">
                <div class="col">
                    <h3 class="text-center mb-2"><b>Tentukan Jadwal Anda</b></h3>
                    <hr style="border: 2px solid black;">
                </div>
            </div>

            <!-- Form -->
            <form action="submit_schedule.php" method="post">
                <div class="row gx-4 gy-3">
                    <!-- Kolom kiri -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input type="text" id="firstName" name="firstName" class="form-control border-0 border-bottom rounded-0" placeholder="Nama Depan" required>
                        </div>
                        <div class="mb-3">
                            <input type="tel" id="phone" name="phone" class="form-control border-0 border-bottom rounded-0" placeholder="Nomor Telepon" required>
                        </div>
                        <div class="mb-3">
                            <select id="date" name="date" class="form-select border-0 border-bottom rounded-0" required>
                                <option value="" disabled selected>Pilih tanggal</option>
                                <option>2025-01-01</option>
                                <option>2025-01-02</option>
                            </select>
                        </div>
                    </div>

                    <!-- Kolom kanan -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input type="text" id="lastName" name="lastName" class="form-control border-0 border-bottom rounded-0" placeholder="Nama Belakang" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" id="email" name="email" class="form-control border-0 border-bottom rounded-0" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <select id="time" name="time" class="form-select border-0 border-bottom rounded-0" required>
                                <option value="" disabled selected>Pilih jam</option>
                                <option>09:00</option>
                                <option>10:00</option>
                            </select>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="col-12 text-center text-md-end mt-3">
                        <button type="submit" class="btn btn-primary px-4 w-100 w-md-auto">
                            Konfirmasi
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- End Form Section -->

    <!-- Footer -->
    <footer class="py-4 bg-dark text-light text-center">
        <div class="container">
            <small>&copy; Nordique Autohaus 2025</small>
        </div>
    </footer>
    <!-- End Footer -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
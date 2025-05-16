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

// Ambil jadwal dari database
$jadwal = [];
$qjadwal = mysqli_query($connection, "SELECT * FROM dm_jadwal_tbl");
while ($row = mysqli_fetch_assoc($qjadwal)) {
    $jadwal[$row['hari_jadwal']] = [
        'jam_buka' => $row['jam_buka'],
        'jam_tutup' => $row['jam_tutup']
    ];
}

// Helper: mapping hari angka ke nama hari (Bahasa Indonesia)
function hariIndo($date) {
    $hari = [
        'Sunday' => 'minggu',
        'Monday' => 'senin',
        'Tuesday' => 'selasa',
        'Wednesday' => 'rabu',
        'Thursday' => 'kamis',
        'Friday' => 'jumat',
        'Saturday' => 'sabtu'
    ];
    return $hari[date('l', strtotime($date))];
}

// Generate tanggal 7 hari ke depan
$tanggal_opsi = [];
for ($i = 0; $i < 7; $i++) {
    $tgl = date('Y-m-d', strtotime("+$i day"));
    $hari = hariIndo($tgl);
    if (isset($jadwal[$hari])) {
        $tanggal_opsi[] = [
            'tanggal' => $tgl,
            'hari' => $hari,
            'jam_buka' => $jadwal[$hari]['jam_buka'],
            'jam_tutup' => $jadwal[$hari]['jam_tutup']
        ];
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
        <section class="container-fluid p-0 position-relative" style="height: 100vh; background: url('../../<?= htmlspecialchars($car['gambar_mobil']) ?>') no-repeat center center; background-size: cover;">
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
                                <button type="button" class="btn btn-primary btn-lg w-100 w-lg-30 px-5" onclick="document.getElementById('form-booking').scrollIntoView({ behavior: 'smooth' });">
                                    Enquire <i class="bi bi-arrow-down-circle ms-2"></i>
                                </button>
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
                            <div class="card border-0" style="background: rgba(255,255,255,0.92);">
                                <div class="card-body">
                                    <h2 class="mb-3" style="font-family: 'Cinzel', serif; color: #2c3e50;">
                                        <b><i class="bi bi-info-circle me-2"></i>Overview</b>
                                    </h2>
                                    <p class="mb-4 text-justify" style="font-size: 1.1rem; color: #444; text-align: justify;">
                                        <?= nl2br(htmlspecialchars($car['deskripsi_mobil'])) ?>
                                    </p>
                                    <ul class="list-unstyled text-start mx-auto" style="max-width:400px;">
                                        <li class="mb-2">
                                            <h5>
                                                <i class="bi bi-cash-stack text-success me-2"></i>
                                                <b>Price:</b> <span style="color:#27ae60;">Rp. <?= number_format($car['harga_mobil'], 0, ',', '.') ?></span>
                                            </h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
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
                <input type="hidden" name="id_mobil" value="<?= $car ? $car['id_mobil'] : '' ?>">
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
                                <?php foreach ($tanggal_opsi as $tgl): ?>
                                    <option value="<?= $tgl['tanggal'] ?>"
                                        data-hari="<?= $tgl['hari'] ?>"
                                        data-jam-buka="<?= $tgl['jam_buka'] ?>"
                                        data-jam-tutup="<?= $tgl['jam_tutup'] ?>">
                                        <?= date('l, d M Y', strtotime($tgl['tanggal'])) ?>
                                    </option>
                                <?php endforeach; ?>
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
                                <!-- Opsi jam akan diisi oleh JS -->
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
    <script>
    // --- JAM BOOKING DYNAMIC ---
    // Helper: generate time options per 1 jam interval
    function generateTimeOptions(jamBuka, jamTutup) {
        let options = '<option value="" disabled selected>Pilih jam</option>';
        if (!jamBuka || !jamTutup) return options;
        let [hBuka, mBuka] = jamBuka.split(':').map(Number);
        let [hTutup, mTutup] = jamTutup.split(':').map(Number);
        let start = new Date(0,0,0,hBuka,mBuka,0);
        let end = new Date(0,0,0,hTutup,mTutup,0);
        while (start < end) {
            let jam = start.getHours().toString().padStart(2,'0') + ':' + start.getMinutes().toString().padStart(2,'0');
            options += `<option value="${jam}">${jam}</option>`;
            start.setHours(start.getHours() + 1);
        }
        return options;
    }

    document.getElementById('date').addEventListener('change', function() {
        let selected = this.options[this.selectedIndex];
        let jamBuka = selected.getAttribute('data-jam-buka');
        let jamTutup = selected.getAttribute('data-jam-tutup');
        let timeSelect = document.getElementById('time');
        timeSelect.innerHTML = generateTimeOptions(jamBuka, jamTutup);
        timeSelect.disabled = false;
    });
    </script>
</body>

</html>
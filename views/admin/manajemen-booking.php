<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbard Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../statics/css/admin/content-wrapper.css">
</head>

<body>
    <div class="container-fluid row">
        <!-- sidebar start -->
        <?= include('sidebar.php') ?>
        <!-- sidebar end -->

        <!-- Wrapper start -->
        <div class="wrapper-content col-10 container-fluid ps-5">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <b>Manajemen Booking</b>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Pemesan</th>
                                            <th scope="col">Tanggal Booking</th>
                                            <th scope="col">Waktu Booking</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Example data, replace with dynamic data from your database -->
                                        <?php
                                        $bookings = [
                                            ['id' => 1, 'name' => 'John Doe', 'date' => '2023-10-01', 'time' => '10:00', 'status' => 'Confirmed'],
                                            ['id' => 2, 'name' => 'Jane Smith', 'date' => '2023-10-02', 'time' => '11:00', 'status' => 'Pending'],
                                        ];
                                        foreach ($bookings as $index => $booking) {
                                        ?>
                                            <tr>
                                                <td><?= $index + 1 ?></td>
                                                <td><?= htmlspecialchars($booking['name']) ?></td>
                                                <td><?= htmlspecialchars($booking['date']) ?></td>
                                                <td><?= htmlspecialchars($booking['time']) ?></td>
                                                <td><?= htmlspecialchars($booking['status']) ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card setting jadwal -->
                <div class="col-auto card p-0">
                    <div class="card-header">
                        <h3 class="fw-bold">
                            <i class="bi bi-gear"></i> Pengaturan Jadwal
                        </h3>
                        <!-- Bootstrap Icons CDN -->
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
                    </div>
                    <div class="card-body">
                        <?php
                        // Ambil data jadwal dari database
                        require_once('../../connections/koneksi.php');
                        $jadwal_data = [];
                        $result = mysqli_query($connection, "SELECT * FROM dm_jadwal_tbl");
                        while ($row = mysqli_fetch_assoc($result)) {
                            $jadwal_data[$row['hari_jadwal']] = $row;
                        }
                        ?>
                        <form action="../../logics/admin/crud-jadwal.php" method="POST">
                            <?php
                            $days = [
                                'Senin' => 'senin',
                                'Selasa' => 'selasa',
                                'Rabu' => 'rabu',
                                'Kamis' => 'kamis',
                                'Jumat' => 'jumat',
                                'Sabtu' => 'sabtu',
                                'Minggu' => 'minggu'
                            ];

                            foreach ($days as $day_name => $day_key) {
                                $jadwal = isset($jadwal_data[$day_key]) ? $jadwal_data[$day_key] : null;
                            ?>
                                <div class="row mb-2">
                                    <h5>
                                        <b><?= $day_name ?></b>
                                    </h5>
                                    <input type="hidden" name="id_jadwal_<?= $day_key ?>" value="<?= $jadwal ? $jadwal['id_jadwal'] : '' ?>">
                                    <div class="col">
                                        <label for="start_time_<?= $day_key ?>" class="form-label">Waktu buka</label>
                                        <input type="time" class="form-control" id="start_time_<?= $day_key ?>" name="start_time_<?= $day_key ?>" value="<?= $jadwal ? htmlspecialchars($jadwal['jam_buka']) : '' ?>" required>
                                    </div>
                                    <div class="col">
                                        <label for="end_time_<?= $day_key ?>" class="form-label">Waktu tutup</label>
                                        <input type="time" class="form-control" id="end_time_<?= $day_key ?>" name="end_time_<?= $day_key ?>" value="<?= $jadwal ? htmlspecialchars($jadwal['jam_tutup']) : '' ?>" required>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="card-footer m-0">
                                <button type="submit" class="btn btn-success w-100">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- card setting card end -->
    </div>
    </div>
    <!-- Wrapper End -->
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
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
                    </div>
                </div>
                <!-- card setting jadwal -->
                <div class="col-auto card">
                    <div class="card-header">
                        <h5>Pengaturan Jadwal</h5>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <?php
                            $days = [
                                'Senin' => 'monday',
                                'Selasa' => 'tuesday',
                                'Rabu' => 'wednesday',
                                'Kamis' => 'thursday',
                                'Jumat' => 'friday',
                                'Sabtu' => 'saturday',
                                'Minggu' => 'sunday'
                            ];

                            $id_jadwal = 1; // Initialize id_jadwal
                            foreach ($days as $day_name => $day_key) {
                            ?>
                                <div class="row mb-2">
                                    <h5>
                                        <b><?= $day_name ?></b>
                                    </h5>
                                    <input type="hidden" name="id_jadwal_<?= $day_key ?>" value="<?= $id_jadwal ?>">
                                    <div class="col">
                                        <label for="start_time_<?= $day_key ?>" class="form-label">Waktu buka</label>
                                        <input type="time" class="form-control" id="start_time_<?= $day_key ?>" name="start_time_<?= $day_key ?>" required>
                                    </div>
                                    <div class="col">
                                        <label for="end_time_<?= $day_key ?>" class="form-label">Waktu tutup</label>
                                        <input type="time" class="form-control" id="end_time_<?= $day_key ?>" name="end_time_<?= $day_key ?>" required>
                                    </div>
                                </div>
                            <?php
                                $id_jadwal++; // Increment id_jadwal for the next day
                            }
                            ?>
                            <button type="submit" class="btn btn-primary">Simpan</button>
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
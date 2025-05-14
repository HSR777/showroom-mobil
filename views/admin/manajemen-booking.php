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
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require_once('../../connections/koneksi.php');
                                    $q = mysqli_query($connection, "
                                        SELECT t.*, b.nama_depan_calon_buyer, b.nama_belakang_calon_buyer, b.email_calon_buyer, b.nomor_telepon_calon_buyer, m.nama_mobil
                                        FROM tr_pembelian_mobil_tbl t
                                        JOIN dm_calon_buyer_tbl b ON t.id_calon_buyer = b.id_calon_buyer
                                        JOIN dm_mobil_tbl m ON t.id_mobil = m.id_mobil
                                        ORDER BY t.created_at DESC
                                    ");
                                    $no = 1;
                                    $modals = [];
                                    while ($row = mysqli_fetch_assoc($q)) {
                                        $nama = htmlspecialchars($row['nama_depan_calon_buyer'].' '.$row['nama_belakang_calon_buyer']);
                                        $tanggal = htmlspecialchars($row['tanggal_jam_janjian']);
                                        $waktu = date('H:i', strtotime($row['tanggal_jam_janjian']));
                                        $status = htmlspecialchars($row['status_transaksi']);
                                        $id_transaksi = $row['id_transaksi'];
                                        ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $nama ?></td>
                                            <td><?= $tanggal ?></td>
                                            <td><?= $waktu ?></td>
                                            <td><?= $status ?></td>
                                            <td>
                                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal<?= $id_transaksi ?>">Detail</button>
                                                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#statusModal<?= $id_transaksi ?>">Update Status</button>
                                            </td>
                                        </tr>
                                        <?php
                                        $modals[] = [
                                            'id' => $id_transaksi,
                                            'data' => [
                                                'Nama Pemesan' => $nama,
                                                'Email' => htmlspecialchars($row['email_calon_buyer']),
                                                'No Telepon' => htmlspecialchars($row['nomor_telepon_calon_buyer']),
                                                'Mobil' => htmlspecialchars($row['nama_mobil']),
                                                'Tanggal Booking' => $tanggal,
                                                'Waktu Booking' => $waktu,
                                                'Status' => $status,
                                                'Harga Deal' => 'Rp. ' . number_format($row['harga_deal'], 0, ',', '.'),
                                                'Tanggal Transaksi' => htmlspecialchars($row['tanggal_transaksi']),
                                            ],
                                            'status' => $status
                                        ];
                                        $no++;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <!-- Render all modals after table -->
                                <?php foreach ($modals as $modal): ?>
                                <div class="modal fade" id="detailModal<?= $modal['id'] ?>" tabindex="-1" aria-labelledby="detailModalLabel<?= $modal['id'] ?>" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="detailModalLabel<?= $modal['id'] ?>">Detail Booking</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <ul class="list-group">
                                          <?php foreach ($modal['data'] as $label => $value): ?>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                              <span><?= $label ?></span>
                                              <span><?= $value ?></span>
                                            </li>
                                          <?php endforeach; ?>
                                        </ul>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- Modal Update Status -->
                                <div class="modal fade" id="statusModal<?= $modal['id'] ?>" tabindex="-1" aria-labelledby="statusModalLabel<?= $modal['id'] ?>" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <form method="post" action="../../logics/admin/crud-booking.php">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="statusModalLabel<?= $modal['id'] ?>">Update Status Booking</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <input type="hidden" name="id_transaksi" value="<?= $modal['id'] ?>">
                                          <div class="mb-3">
                                            <label for="status_transaksi_<?= $modal['id'] ?>" class="form-label">Status</label>
                                            <select class="form-select" id="status_transaksi_<?= $modal['id'] ?>" name="status_transaksi" required>
                                              <option value="pending" <?= $modal['status']=='pending'?'selected':''; ?>>Pending</option>
                                              <option value="on-going" <?= $modal['status']=='on-going'?'selected':''; ?>>On-Going</option>
                                              <option value="selesai" <?= $modal['status']=='selesai'?'selected':''; ?>>Selesai</option>
                                              <option value="batal" <?= $modal['status']=='batal'?'selected':''; ?>>Batal</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" name="update_status" class="btn btn-success">Simpan</button>
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                                <?php endforeach; ?>
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
    <script>
    function handleSimpan(id) {
        // Ganti dengan AJAX jika ingin update status tanpa reload
        if(confirm('Tandai booking ini sebagai selesai?')) {
            window.location.href = '../../logics/admin/crud-booking.php?action=simpan&id=' + id;
        }
    }
    </script>
</body>

</html>
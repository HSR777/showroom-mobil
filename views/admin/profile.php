<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Fetch admin data from database
require_once '../../connections/koneksi.php'; // adjust path as needed
$admin_id = $_SESSION['admin_id'] ?? 1; // fallback to 1 if not set
$stmt = $connection->prepare("SELECT username_akun, nomor_telpon_akun, recovery_key FROM dm_akun_tbl WHERE id_akun = ?");
$stmt->bind_param("i", $admin_id);
$stmt->execute();
$stmt->bind_result($username, $phone, $recovery_key);
$stmt->fetch();
$stmt->close();
$connection->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbard Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../statics/css/admin/content-wrapper.css">
</head>

<body>
    <div class="container-fluid row">
        <!-- sidebar start -->
        <?= include('sidebar.php') ?>
        <!-- sidebar end -->

        <!-- Wrapper start -->
        <div class="wrapper-content col-10">
            <!-- Show alert messages -->
            <?php if (isset($_SESSION['success_message'])): ?>
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    <?= htmlspecialchars($_SESSION['success_message']) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['success_message']); ?>
            <?php endif; ?>
            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    <?= htmlspecialchars($_SESSION['error_message']) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Profile</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-auto">
                            <img src="https://static.vecteezy.com/system/resources/thumbnails/020/429/953/small_2x/admin-icon-vector.jpg" class="img-fluid img-thumbnail rounded-circle" alt="admin profile" style="width: 150px; height: 150px;">
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <p>Nama : <strong><?= htmlspecialchars($username) ?></strong></p>
                            </div>
                            <div class="mb-3">
                                <p>Role : <strong>Admin</strong></p>
                            </div>
                            <div class="mb-3">
                                <p>Nomor Telepon : <strong><?= htmlspecialchars($phone) ?></strong></p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="row">
                                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#changePhoneNumberModal">
                                    <i class="bi bi-telephone"></i> Change Phone Number
                                </button>
                            </div>
                            <div class="row">
                                <button type="button" class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                                    <i class="bi bi-key"></i> Change Password
                                </button>
                            </div>
                            <div class="row">
                                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#showRecoveryKeyModal">
                                    <i class="bi bi-shield-lock"></i> Recovery key
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wrapper End -->
    </div>

    <!-- Change Phone Number Modal -->
    <div class="modal fade" id="changePhoneNumberModal" tabindex="-1" aria-labelledby="changePhoneNumberModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePhoneNumberModalLabel">Change Phone Number</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="../../logics/admin/update-akun.php">
                        <input type="hidden" name="action" value="change_phone">
                        <div class="mb-3">
                            <label for="newPhoneNumber" class="form-label">New Phone Number</label>
                            <div class="input-group">
                                <select class="form-select" name="region_code" style="max-width: 150px;">
                                    <option value="62" selected>+62 (ID)</option>
                                    <option value="60">+60 (MY)</option>
                                    <option value="65">+65 (SG)</option>
                                    <option value="1">+1 (US)</option>
                                    <option value="91">+91 (IN)</option>
                                    <!-- Add more as needed -->
                                </select>
                                <input type="number" class="form-control" id="newPhoneNumber" name="new_phone" placeholder="85798442160" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Change Password Modal -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">Change password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="../../logics/admin/update-akun.php">
                        <input type="hidden" name="action" value="change_password">
                        <div class="mb-3">
                            <label for="oldPassword" class="form-label">Password Sebelumnya</label>
                            <input type="password" class="form-control" id="oldPassword" name="old_password" placeholder="Enter old password" required>
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="new_password" placeholder="Enter new password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirm_password" placeholder="Confirm new password" required>
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Show Recovery Key Modal -->
    <div class="modal fade" id="showRecoveryKeyModal" tabindex="-1" aria-labelledby="showRecoveryKeyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showRecoveryKeyModalLabel">Recovery Key</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Recovery Key: <strong><?= htmlspecialchars($recovery_key) ?></strong></p>
                    <p>Note: Please keep this key safe. It is used to recover your account.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
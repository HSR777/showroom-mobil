<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: ../../views/admin/login.php');
    exit;
}

require_once '../../connections/koneksi.php'; // adjust path as needed

$admin_id = $_SESSION['admin_id'] ?? 1; // fallback to 1 if not set

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'change_phone') {
        $region_code = trim($_POST['region_code'] ?? '');
        $new_phone = trim($_POST['new_phone'] ?? '');
        if ($new_phone !== '') {
            // Remove leading zero if present
            $phone = ltrim($new_phone, '0');
            // Combine region code and phone
            $full_phone = $region_code . $phone;
            $stmt = $connection->prepare("UPDATE dm_akun_tbl SET nomor_telpon_akun = ? WHERE id_akun = ?");
            $stmt->bind_param("si", $full_phone, $admin_id);
            $stmt->execute();
            $stmt->close();
            $_SESSION['success_message'] = "Phone number updated successfully.";
        }
        header('Location: ../../views/admin/profile.php');
        exit;
    }

    if ($action === 'change_password') {
        $old_password = $_POST['old_password'] ?? '';
        $new_password = $_POST['new_password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';

        // Fetch current password (plain text)
        $stmt = $connection->prepare("SELECT password_akun FROM dm_akun_tbl WHERE id_akun = ?");
        $stmt->bind_param("i", $admin_id);
        $stmt->execute();
        $stmt->bind_result($current_password);
        $stmt->fetch();
        $stmt->close();

        // Compare plain text passwords
        if (
            $old_password !== '' &&
            $old_password === $current_password &&
            $new_password !== '' &&
            $new_password === $confirm_password
        ) {
            // Update password
            $stmt = $connection->prepare("UPDATE dm_akun_tbl SET password_akun = ? WHERE id_akun = ?");
            $stmt->bind_param("si", $new_password, $admin_id);
            $stmt->execute();
            $stmt->close();

            // Generate new 8-digit recovery key
            $new_recovery_key = str_pad(strval(random_int(0, 99999999)), 8, '0', STR_PAD_LEFT);
            $stmt = $connection->prepare("UPDATE dm_akun_tbl SET recovery_key = ? WHERE id_akun = ?");
            $stmt->bind_param("si", $new_recovery_key, $admin_id);
            $stmt->execute();
            $stmt->close();

            $_SESSION['success_message'] = "Password and recovery key updated successfully.";
        } else {
            $_SESSION['error_message'] = "Password change failed. Please check your input.";
        }
        header('Location: ../../views/admin/profile.php');
        exit;
    }
}

header('Location: ../../views/admin/profile.php');
exit;

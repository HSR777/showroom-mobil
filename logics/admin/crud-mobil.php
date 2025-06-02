<?php
include('../../connections/koneksi.php');

// Helper function to handle image upload
function upload_image($file_input_name, $upload_dir = '../../uploads/') {
    if (!isset($_FILES[$file_input_name]) || $_FILES[$file_input_name]['error'] !== UPLOAD_ERR_OK) {
        return null;
    }
    $file_tmp = $_FILES[$file_input_name]['tmp_name'];
    $file_name = uniqid() . '_' . basename($_FILES[$file_input_name]['name']);
    $target_path = $upload_dir . $file_name;
    // Create upload dir if not exists
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    if (move_uploaded_file($file_tmp, $target_path)) {
        // Return relative path to be stored in DB
        return 'uploads/' . $file_name;
    }
    return null;
}

// adding new car data to the database
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'addCar') {
    $nama_mobil = mysqli_real_escape_string($connection, $_POST['nama_mobil']);
    $merek_mobil = mysqli_real_escape_string($connection, $_POST['merek_mobil']);
    $tipe_mobil = mysqli_real_escape_string($connection, $_POST['tipe_mobil']);
    $deskripsi_mobil = mysqli_real_escape_string($connection, $_POST['deskripsi_mobil']);
    $stok_mobil = (int)$_POST['stok_mobil'];
    $harga_mobil = (float)$_POST['carPrice'];

    $gambar_mobil = upload_image('gambar_mobil');
    $gambar_mobil_overview = upload_image('gambar_mobil_overview');

    $query = "INSERT INTO dm_mobil_tbl (nama_mobil, merek_mobil, tipe_mobil, deskripsi_mobil, stok_mobil, harga_mobil, gambar_mobil, gambar_mobil_overview, tanggal_diperbaharui, tanggal_dibuat) 
              VALUES ('$nama_mobil', '$merek_mobil', '$tipe_mobil', '$deskripsi_mobil', $stok_mobil, $harga_mobil, " .
              ($gambar_mobil ? "'$gambar_mobil'" : "NULL") . ", " .
              ($gambar_mobil_overview ? "'$gambar_mobil_overview'" : "NULL") . ", NOW(), NOW())";

    if (mysqli_query($connection, $query)) {
        echo "<script>
                alert('Data successfully added!');
                window.location.href='../../views/admin/manajemen-mobil.php';
              </script>";
    } else {
        echo "<script>
            alert('Failed to add data. Please try again.');
            window.location.href='../../views/admin/manajemen-mobil.php';
              </script>";
    }
    exit();
}

// updating existing car data in the database
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'updateCar') {
    $id = (int)$_POST['id_mobil'];
    $nama_mobil = mysqli_real_escape_string($connection, $_POST['nama_mobil']);
    $merek_mobil = mysqli_real_escape_string($connection, $_POST['merek_mobil']);
    $tipe_mobil = mysqli_real_escape_string($connection, $_POST['tipe_mobil']);
    $deskripsi_mobil = mysqli_real_escape_string($connection, $_POST['deskripsi_mobil']);
    $stok_mobil = (int)$_POST['stok_mobil'];
    $harga_mobil = (float)$_POST['carPrice'];

    $gambar_mobil = upload_image('gambar_mobil');
    $gambar_mobil_overview = upload_image('gambar_mobil_overview');

    $set_img = "";
    if ($gambar_mobil) {
        $set_img .= ", gambar_mobil = '$gambar_mobil'";
    }
    if ($gambar_mobil_overview) {
        $set_img .= ", gambar_mobil_overview = '$gambar_mobil_overview'";
    }

    $query = "UPDATE dm_mobil_tbl 
              SET nama_mobil = '$nama_mobil', merek_mobil = '$merek_mobil', tipe_mobil = '$tipe_mobil', deskripsi_mobil = '$deskripsi_mobil', stok_mobil = $stok_mobil, harga_mobil = $harga_mobil, tanggal_diperbaharui = NOW() $set_img
              WHERE id_mobil = $id";

    if (mysqli_query($connection, $query)) {
        echo "<script>
                alert('Data successfully updated!');
                window.location.href='../../views/admin/manajemen-mobil.php';
              </script>";
    } else {
        echo "<script>
                alert('Failed to update data. Please try again.');
                window.location.href='../../views/admin/manajemen-mobil.php';
              </script>";
    }
    exit();
}

// delete car data from the database
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'deleteCar' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    // Optionally, delete images from server here if needed
    $query = "DELETE FROM dm_mobil_tbl WHERE id_mobil = $id";
    if (mysqli_query($connection, $query)) {
        echo "<script>
                alert('Car deleted successfully!');
                window.location.href='../../views/admin/manajemen-mobil.php';
              </script>";
    } else {
        echo "<script>
                alert('Failed to delete car. Please try again.');
                window.location.href='../../views/admin/manajemen-mobil.php';
              </script>";
    }
    exit();
}

// add new stock to car
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'addStock') {
    $id = (int)$_POST['mobil_id'];
    $stok_tambah = (int)$_POST['stok_mobil'];
    // Get current stock
    $result = mysqli_query($connection, "SELECT stok_mobil FROM dm_mobil_tbl WHERE id_mobil = $id");
    if ($row = mysqli_fetch_assoc($result)) {
        $stok_baru = $row['stok_mobil'] + $stok_tambah;
        $update = mysqli_query($connection, "UPDATE dm_mobil_tbl SET stok_mobil = $stok_baru, tanggal_diperbaharui = NOW() WHERE id_mobil = $id");
        if ($update) {
            echo "<script>
                alert('Stock successfully updated!');
                window.location.href='../../views/admin/manajemen-mobil.php';
            </script>";
        } else {
            echo "<script>
                alert('Failed to update stock. Please try again.');
                window.location.href='../../views/admin/manajemen-mobil.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Car not found.');
            window.location.href='../../views/admin/manajemen-mobil.php';
        </script>";
    }
    exit();
}
?>

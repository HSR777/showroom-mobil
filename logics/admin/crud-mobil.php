<?php
include('../../connections/koneksi.php');

// adding new car data to the database
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'addCar') {
    $nama_mobil = mysqli_real_escape_string($connection, $_POST['nama_mobil']);
    $merek_mobil = mysqli_real_escape_string($connection, $_POST['merek_mobil']);
    $tipe_mobil = mysqli_real_escape_string($connection, $_POST['tipe_mobil']);
    $deskripsi_mobil = mysqli_real_escape_string($connection, $_POST['deskripsi_mobil']);
    $stok_mobil = (int)$_POST['stok_mobil'];
    $harga_mobil = (float)$_POST['carPrice'];

    $query = "INSERT INTO dm_mobil_tbl (nama_mobil, merek_mobil, tipe_mobil, deskripsi_mobil, stok_mobil, harga_mobil, tanggal_diperbaharui, tanggal_dibuat) 
              VALUES ('$nama_mobil', '$merek_mobil', '$tipe_mobil', '$deskripsi_mobil', $stok_mobil, $harga_mobil, NOW(), NOW())";

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
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'updateCar') {
//     $id = (int)$_POST['id_mobil'];
//     $nama_mobil = mysqli_real_escape_string($connection, $_POST['nama_mobil']);
//     $merek_mobil = mysqli_real_escape_string($connection, $_POST['merek_mobil']);
//     $tipe_mobil = mysqli_real_escape_string($connection, $_POST['tipe_mobil']);
//     $deskripsi_mobil = mysqli_real_escape_string($connection, $_POST['deskripsi_mobil']);
//     $stok_mobil = (int)$_POST['stok_mobil'];
//     $harga_mobil = (float)$_POST['carPrice'];

//     $query = "UPDATE dm_mobil_tbl 
//               SET nama_mobil = '$nama_mobil', merek_mobil = '$merek_mobil', tipe_mobil = '$tipe_mobil', deskripsi_mobil = '$deskripsi_mobil', stok_mobil = $stok_mobil, harga_mobil = $harga_mobil, tanggal_diperbaharui = NOW() 
//               WHERE id_mobil = $id";

//     if (mysqli_query($connection, $query)) {
//         echo "<script>
//                 alert('Data successfully updated!');
//                 window.location.href='../../views/admin/manajemen-mobil.php';
//               </script>";
//     } else {
//         echo "<script>
//                 alert('Failed to update data. Please try again.');
//                 window.location.href='../../views/admin/manajemen-mobil.php';
//               </script>";
//     }
//     exit();
// }

?>

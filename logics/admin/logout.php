<?php
session_start();
session_destroy();
header('Location: ../../views/admin/login.php');
exit;
?>

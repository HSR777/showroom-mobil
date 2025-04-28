<?php
// Database connection settings
$host = 'localhost'; // Database host
$user = 'root'; // Database username
$password = ''; // Database password
$database = 'showroom_car_db'; // Database name

// Create connection
$connection = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";
?>
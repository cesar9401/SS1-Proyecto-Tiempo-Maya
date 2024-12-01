<?php
$servername = "127.0.0.1";
$username_DB = "root";
<<<<<<< HEAD
<<<<<<< Updated upstream
$password_DB = "root";
=======
$password_DB = "";
>>>>>>> Stashed changes
=======
$password_DB = "";
>>>>>>> 156e4d905f28022a54848bc4b1cba2a82b9b4dbb
$dbname = "tiempomaya";

// Create connection
$conn = new mysqli($servername, $username_DB, $password_DB, $dbname, '3306');
if ($conn->connect_error) {
    echo 'Conexion fallida: ' . $conn->connect_error;
    die("Connection failed: " . $conn->connect_error);
} else {
    return $conn;
}
?>

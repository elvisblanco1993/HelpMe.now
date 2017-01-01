<?php
$servername = "localhost";
$username = "root";
$password = "bahia9397";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE helpmenow";
if ($conn->query($sql) === TRUE) {
    echo "Database successfully created";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>

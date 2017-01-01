<?php
// Connect the db server
$servername = "localhost";
$username = "root";
$password = "bahia9397";
$dbname = "helpmenow";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
 ?>

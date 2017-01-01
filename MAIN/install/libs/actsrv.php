<?php
/*
Made by: Elvis Blanco Gonzalez <elvisblanco1993@gmail.com>;
*/
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

$company = $_POST['company'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$license = $_POST['license'];

$sql = "INSERT INTO reg (company, phone, email, license)
VALUES ('$company', '$phone', '$email', '$license')";

if ($conn->query($sql) === TRUE) {
    echo "Platform Successfully activated";
}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

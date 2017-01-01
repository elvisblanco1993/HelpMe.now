<?php
$servername = "localhost";
$username = "root";
$password = "bahia9397";
$dbname = "helpmenow";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection to the database failed: " . $conn->connect_error);
} else{
	echo 'Connected...' . '<br />';
}

// sql to create user
$sql = "CREATE TABLE reg (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
date TIMESTAMP,
company VARCHAR(30) NOT NULL,
phone VARCHAR(15),
email VARCHAR(50),
license VARCHAR(30)
)";

if ($conn->query($sql) === TRUE) {
    echo "Activation API created";
} else {
    echo "Could not create API: " . $conn->error;
    echo "Please contact your administrator";
}

$conn->close();
?>

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
	echo "Connected... ";
	echo "<br />";
	}

// sql to create tickets
$sql = "CREATE TABLE tickets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
date TIMESTAMP,
email VARCHAR(50),
phone VARCHAR(15),
issue_relation VARCHAR(30),
description VARCHAR(600)
)";

if ($conn->query($sql) === TRUE) {
    echo "Tables created.";
} else {
    echo "Could not create the tables: " . $conn->error;
    echo "Please contact your provider";
}

$conn->close();
?>

<?php 
$dbserver = 'localhost';
$dbuser = 'root';
$dbpsk = 'bahia9397';
$dbname = 'plataforma';
$dbCon = mysqli_connect($dbserver, $dbuser , $dbpsk, $dbname);
if (mysqli_connect_errno()) {
echo 'Failed to connect: ' . mysqli_connect_error();
}
?>

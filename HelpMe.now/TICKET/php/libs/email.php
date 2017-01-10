<?php
  require 'dbconnect.php';
  $conn = new mysqli($dbserver, $dbuser, $dbpsk, $dbname);
  $sql = "SELECT * FROM tickets ORDER BY id DESC LIMIT 1";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_array($result)){
    $id = $row["id"];
    $date = $row["date"];
    $email = $row["email"];
    $phone = $row["phone"];
  }
?>

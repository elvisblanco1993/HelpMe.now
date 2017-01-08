<?php
if(isset($_POST['close'])) {
  require 'dbconnect.php';
  $search = $_POST['search'];
  $connect = mysqli_connect("$dbserver", "$dbuser", "$dbpsk", "$dbname");
  $close = "INSERT INTO closed (SELECT * FROM tickets WHERE id = $search)";
  $closeTicket = mysqli_query($connect, $close);
  header ('Location: search.php');
  mysqli_close($connect);
}
?>

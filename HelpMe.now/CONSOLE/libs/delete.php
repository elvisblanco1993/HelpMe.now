<?php
if(isset($_POST['delete'])) {
  require 'dbconnect.php';
  $search = $_POST['search'];
  $connect = mysqli_connect("$dbserver", "$dbuser", "$dbpsk", "$dbname");
  $remove = "DELETE FROM tickets WHERE id = $search";
  $removeTicket = mysqli_query($connect, $remove);
  header ('Location: search.php');
  mysqli_close($connect);
}
?>

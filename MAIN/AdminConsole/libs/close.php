<?php
if(isset($_POST['close'])) {
  $search = $_POST['search'];
  $connect = mysqli_connect("localhost", "root", "bahia9397","helpmenow");
  $close = "INSERT INTO closed (SELECT * FROM tickets WHERE id = $search)";
  $closeTicket = mysqli_query($connect, $close);
  header ('Location: search.php');
  mysqli_close($connect);
}
?>

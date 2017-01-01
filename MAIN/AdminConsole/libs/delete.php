<?php
if(isset($_POST['delete'])) {
  $search = $_POST['search'];
  $connect = mysqli_connect("localhost", "root", "bahia9397","helpmenow");
  $remove = "DELETE FROM tickets WHERE id = $search";
  $removeTicket = mysqli_query($connect, $remove);
  header ('Location: search.php');
  mysqli_close($connect);
}
?>

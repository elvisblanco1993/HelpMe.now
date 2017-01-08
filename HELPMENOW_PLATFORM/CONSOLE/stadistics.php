
<?php
$connect = mysqli_connect("localhost", "root", "bahia9397","helpmenow");
$count = mysqli_query("SELECT COUNT(*) FROM tickets");
$result = mysqli_query($connect, $count);
echo $count;
?>

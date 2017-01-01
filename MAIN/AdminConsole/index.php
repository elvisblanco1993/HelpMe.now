<?php
require 'libs/dbconnect.php';
require 'libs/refresh.php';

$sql = "SELECT * FROM tickets";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   // output data of each row
   echo "<div class='topbar'><a href='search.php'>Search</a></div>";
   echo "<table>";
   echo "<tr>";
   echo "<th>ID</th>";
   echo "<th>Date</th>";
   echo "<th>Email</th>";
   echo "<th>Phone</th>";
   echo "<th>Issue</th>";
   echo "<th>Description</th>";
   echo "</tr>";
   while($row = $result->fetch_assoc()) {
     echo "<tr>";
     echo "<td>" . $row["id"] . "</td>";
     echo "<td>" . $row["date"] . "</td>";
     echo "<td>" . $row["email"] . "</td>";
     echo "<td>" . $row["phone"] . "</td>";
     echo "<td>" . $row["issue_relation"] . "</td>";
     echo "<td><div class='tooltip'>Hover over for description<span class='tooltiptext'>" . $row["description"] . "</span></div></td>";
   }
   echo "</table>";
} else {
  echo "<div class='topbar'><a href='search.php'>Search</a><span>Still no tickets in your inbox</span></div>";
  echo "<table>";
  echo "<tr>";
  echo "<th>ID</th>";
  echo "<th>Date</th>";
  echo "<th>Email</th>";
  echo "<th>Phone</th>";
  echo "<th>Issue</th>";
  echo "<th>Description</th>";
  echo "</tr>";
  echo "</table>";
}
$conn->close();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/tooltip.css">
    <title></title>
  </head>
  <body>
  </body>
</html>

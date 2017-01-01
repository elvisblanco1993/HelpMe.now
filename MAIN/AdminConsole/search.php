<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/tooltip.css">
    <link rel="stylesheet" href="css/master.css">
    <meta charset="utf-8">
    <title>Tickets</title>
  </head>
  <body>
    <form class="topbar" action="search.php" method="post">
      <input type="text" name="search" placeholder="Search by ID / Phone">
      <input type="submit" name="find" value="Search">
      <input type="submit" name="delete" value="Delete">
      <a class="right-side" href="index.php">Back</a>
    </form>
  </body>
</html>
<?php
if(isset($_POST['find'])) {
  $search = $_POST['search'];
  $connect = mysqli_connect("localhost", "root", "bahia9397","helpmenow");
  $query = "SELECT * FROM tickets WHERE id = $search OR phone like $search";
  $result = mysqli_query($connect, $query);

  if(mysqli_num_rows($result) > 0)
   {
     echo "<table>";
     echo "<tr>";
     echo "<th>ID</th>";
     echo "<th>Date</th>";
     echo "<th>Email</th>";
     echo "<th>Phone</th>";
     echo "<th>Issue</th>";
     echo "<th>Description</th>";
     echo "</tr>";
     while ($row = mysqli_fetch_array($result))
     {
       echo "<tr>";
       echo "<td>" . $row["id"] . "</td>";
       echo "<td>" . $row["date"] . "</td>";
       echo "<td>" . $row["email"] . "</td>";
       echo "<td>" . $row["phone"] . "</td>";
       echo "<td>" . $row["issue_relation"] . "</td>";
       echo "<td><div class='tooltip'>Hover over for description<span class='tooltiptext'>" . $row["description"] . "</span></div></td>";
       echo "</tr>";
     }
     echo "</table>";
   }else {
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
    mysqli_close($connect);
  }
  require 'libs/delete.php';
  ?>

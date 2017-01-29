<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="css/tooltip.css">
    <link rel="stylesheet" href="css/master.css">
    <meta charset="utf-8">
    <title>Search Inbox | HelpMe.now</title>
  </head>
  <body>
    <form class="topbar" action="search.php" method="post">
      <input type="text" name="search" placeholder="Search by ID / Phone" value="<?php echo isset($_POST['search']) ? $_POST['search'] : '' ?>">
      <input type="submit" name="find" value="Search">
      <input type="submit" name="close" value="Archive">
      <input type="submit" name="delete" value="Delete from Inbox">
      <p class="tooltip">?<span class='tooltiptext'>Always delete the tickets after archiving them</span></p>
      <a class="right-side" href='libs/logout.php'>Logout</a>
      <a class="right-side" href="console.php">Inbox</a>
    </form>
  </body>
</html>
<?php

session_start();

if(isset($_SESSION['id'])) {
    $username = $_SESSION['username'];
    $userId = $_SESSION['id'];

    if(isset($_POST['find'])) {
      require 'libs/dbconnect.php';
      $search = $_POST['search'];
      $connect = mysqli_connect("$dbserver", "$dbuser", "$dbpsk", "$dbname");
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
      require 'libs/close.php';
      require 'libs/delete.php';

} else {
    header('Location: index.php');

    die();
}

  ?>

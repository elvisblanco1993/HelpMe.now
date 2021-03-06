<?php
session_start();

if(isset($_SESSION['id'])) {
    $username = $_SESSION['username'];
    $userId = $_SESSION['id'];

    require 'libs/dbconnect.php';
    require 'libs/refresh.php';

    // Create connection
    $conn = new mysqli($dbserver, $dbuser, $dbpsk, $dbname);
    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM closed";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       // output data of each row
       echo "<div class='topbar'>
       <span><a href='libs/logout.php'>Logout</a></span>
       </div>";
       echo "<div class='topbar'>
       <a href='closed.php'><i class='fa fa-refresh' aria-hidden='true'></i></a>
       <a href='search_closed.php'><i class='fa fa-search' aria-hidden='true'></i></a>
       <a href='console.php'>Inbox</a>
       </div>";
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
      echo "<div class='topbar'>
      <span><a href='libs/logout.php'>Logout</a></span>
      </div>";
      echo "<div class='topbar'><a href='search_closed.php'>Search</a><a href='console.php'>Inbox</a><span>Still no tickets in your inbox</span></div>";
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
} else {
    header('Location: index.php');

    die();
}

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/tooltip.css">
    <title>Archived | HelpMe.now</title>
  </head>
  <body>

  </body>
</html>

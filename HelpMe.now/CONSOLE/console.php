<?php
<<<<<<< HEAD
session_start();
if(isset($_SESSION['id'])) {
   $username = $_SESSION['username'];
   $userId = $_SESSION['id'];
//////////////////////////////////////////////////////////
/////////////////////////START///////////////////////////
////////////////////////////////////////////////////////
require 'libs/dbconnect.php';
require 'views/console.view.php';
=======

session_start();

if(isset($_SESSION['id'])) {
    $username = $_SESSION['username'];
    $userId = $_SESSION['id'];
//////////////////////////////////////////////////////////
/////////////////////////START///////////////////////////
////////////////////////////////////////////////////////

require 'libs/dbconnect.php';
require 'libs/refresh.php';

>>>>>>> master
// Create connection
$conn = new mysqli($dbserver, $dbuser, $dbpsk, $dbname);
// Check connection
if ($conn->connect_error) {
<<<<<<< HEAD
  die("Connection failed: " . $conn->connect_error);
=======
   die("Connection failed: " . $conn->connect_error);
>>>>>>> master
}

$sql = "SELECT * FROM tickets";
$result = $conn->query($sql);

<<<<<<< HEAD
echo "<table class='striped'>
        <thead>
          <tr>
            <th data-field='id'>ID</th>
            <th data-field='date'>Date</th>
            <th data-field='email'>Email</th>
            <th data-field='phone'>Phone</th>
            <th data-field='about'>Section</th>
            <th data-field='description'>Description</th>
          </tr>
        </thead>
        <tbody>";
if ($result->num_rows > 0 && !$_POST['find']) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
=======
if ($result->num_rows > 0) {
   // output data of each row
   echo "<div class='topbar'>
   <span><a href='libs/logout.php'>Logout</a></span>
   </div>";
   echo "<div class='topbar'>
   <a href='console.php'><i class='fa fa-refresh' aria-hidden='true'></i></a>
   <a href='search.php'><i class='fa fa-search' aria-hidden='true'></i></a>
   <a href='closed.php'>Archived tickets</a>
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
>>>>>>> master
     echo "<td>" . $row["id"] . "</td>";
     echo "<td>" . $row["date"] . "</td>";
     echo "<td>" . $row["email"] . "</td>";
     echo "<td>" . $row["phone"] . "</td>";
     echo "<td>" . $row["issue_relation"] . "</td>";
     echo "<td><div class='tooltip'>Hover over for description<span class='tooltiptext'>" . $row["description"] . "</span></div></td>";
<<<<<<< HEAD
  }
  echo "</tbody>";
  echo "</table>";
}

//////////////////////////////////////////////////////////////////////////////
if(isset($_POST['find'])) {
  require 'libs/dbconnect.php';
  $search = $_POST['search'];
  $connect = mysqli_connect("$dbserver", "$dbuser", "$dbpsk", "$dbname");
  $query = "SELECT * FROM tickets WHERE id = $search OR phone like $search";
  $result = mysqli_query($connect, $query);

  if(mysqli_num_rows($result) > 0){
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
     echo "<p style='color:red; text-align:center;'>No ticked ID was selected, or does not exist on this list. Please enter a ticket number.</p>";
    }
    mysqli_close($connect);
  }

  ////////////////////////////////////////////////////////////////////////////
  if(isset($_POST['archive'])) {
    require 'libs/dbconnect.php';
    $search = $_POST['search'];
    $connect = mysqli_connect("$dbserver", "$dbuser", "$dbpsk", "$dbname");
    $close = "INSERT INTO closed (SELECT * FROM tickets WHERE id = $search)";
    $closeTicket = mysqli_query($connect, $close);
    $remove = "DELETE FROM tickets WHERE id = $search";
    $removeTicket = mysqli_query($connect, $remove);
    header('Location: console.php');
    mysqli_close($connect);
  }

$conn->close();

} else {
   header('Location: index.php');
   die();
 }

?>
=======
   }
   echo "</table>";
} else {
  echo "<div class='topbar'>
  <span><a href='libs/logout.php'>Logout</a></span>
  </div>";
  echo "<div class='topbar'><a href='search.php'>Search</a><a href='closed.php'>Archived</a><span>Still no tickets in your inbox</span></div>";
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
    <title>Inbox | HelMenow</title>
  </head>
  <body>


  </body>
</html>
>>>>>>> master

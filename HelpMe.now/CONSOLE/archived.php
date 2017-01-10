<?php

session_start();

if(isset($_SESSION['id'])) {
   $username = $_SESSION['username'];
   $userId = $_SESSION['id'];
//////////////////////////////////////////////////////////
/////////////////////////START///////////////////////////
////////////////////////////////////////////////////////

require 'libs/dbconnect.php';
require 'views/archived.view.php';
// Create connection
$conn = new mysqli($dbserver, $dbuser, $dbpsk, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM closed";
$result = $conn->query($sql);

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
     echo "<td>" . $row["id"] . "</td>";
     echo "<td>" . $row["date"] . "</td>";
     echo "<td>" . $row["email"] . "</td>";
     echo "<td>" . $row["phone"] . "</td>";
     echo "<td>" . $row["issue_relation"] . "</td>";
     echo "<td><div class='tooltip'>Hover over for description<span class='tooltiptext'>" . $row["description"] . "</span></div></td>";
  }
  echo "</tbody>";
  echo "</table>";
}

//////////////////////////////////////////////////////////////////////////////
if(isset($_POST['find'])) {
  require 'libs/dbconnect.php';
  $search = $_POST['search'];
  $connect = mysqli_connect("$dbserver", "$dbuser", "$dbpsk", "$dbname");
  $query = "SELECT * FROM closed WHERE id = $search OR phone like $search";
  $result = mysqli_query($connect, $query);

  if(mysqli_num_rows($result) > 0){
     while ($row = mysqli_fetch_array($result))
     {
       echo "<tr>";
       echo "<td>" . "TN-00" . $row["id"] . "</td>";
       echo "<td>" . $row["date"] . "</td>";
       echo "<td>" . $row["email"] . "</td>";
       echo "<td>" . $row["phone"] . "</td>";
       echo "<td>" . $row["issue_relation"] . "</td>";
       echo "<td><div class='tooltip'>Hover over for description<span class='tooltiptext'>" . $row["description"] . "</span></div></td>";
       echo "</tr>";
     }
     echo "</table>";
   }else {
     echo "<p style='color:red; text-align:center;'>No ticked ID was selected, or does not exist on this list. Please enter a ticket number.</hp>";

    }
    mysqli_close($connect);
  }
/////////////////////////////////////////////////////////////////////////////
if(isset($_POST['restore'])) {
  require 'libs/dbconnect.php';
  $search = $_POST['search'];
  $connect = mysqli_connect("$dbserver", "$dbuser", "$dbpsk", "$dbname");
  $close = "INSERT INTO tickets (SELECT * FROM closed WHERE id = $search)";
  $closeTicket = mysqli_query($connect, $close);
  $remove = "DELETE FROM closed WHERE id = $search";
  $removeTicket = mysqli_query($connect, $remove);
  header('Location: archived.php');
  mysqli_close($connect);
}

$conn->close();

} else {
   header('Location: index.php');
   die();
 }
?>

<?php
session_start();

if ($_SESSION) {
  $name = $_SESSION['name'];
  echo "<h1>Hello, $name</h1>";
} else {
  echo "Please start session";
}

 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Page 2</title>
   </head>
   <body>
     <a href="logoff.php">Logout</a>
   </body>
 </html>

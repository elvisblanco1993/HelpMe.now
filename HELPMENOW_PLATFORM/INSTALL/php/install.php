 <?php
 require 'views/install.view.php';

 if (isset($_POST["submit"])) {
   $server = $_POST["db_server"];
   $user = $_POST["db_user"];
   $psk = $_POST["db_psk"];
   $dbname = $_POST["db_name"];

   define("SERVER", "$server");
   define("USER", "$user");
   define("PSK", "$psk");
   define("DBNAME", "$dbname");

   ///////////////////////////////////////////////////////////////////////
   // Create connection
   $conn = new mysqli(SERVER, USER, PSK);
   // Check connection
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   // Create database
   $sql = "CREATE DATABASE $dbname";
   if ($conn->query($sql) === TRUE) {
       echo "Database $dbname successfully created";
       echo "<br>";
   } else {
       echo "Error creating database: " . $conn->error;
   }

   /////////////////////////////////////////////////////////////////////
   // Create tables Inbox
   $conn = new mysqli(SERVER, USER, PSK, DBNAME);
   // Check connection
   if ($conn->connect_error) {
       die("Connection to the database failed: " . $conn->connect_error);
   }

   $sql = "CREATE TABLE tickets (
   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   date TIMESTAMP,
   email VARCHAR(50),
   phone VARCHAR(15),
   issue_relation VARCHAR(30),
   description VARCHAR(600)
   )";
   if ($conn->query($sql) === TRUE) {
       echo "Table created." . "<br>";
   } else {
       echo "Could not create the tables: " . $conn->error;
       echo "Please contact your provider";
   }
   ////////////////////////////////////////////////////////////////////////
   // Archived table
   // Create connection
   $conn = new mysqli(SERVER, USER, PSK, DBNAME);
   // Check connection
   if ($conn->connect_error) {
       die("Connection to the database failed: " . $conn->connect_error);
   } else{
   	echo "Connected... ";
   	echo "<br />";
   	}

   // sql to create tickets
   $sql = "CREATE TABLE closed (
   id INT(6) UNSIGNED PRIMARY KEY,
   date TIMESTAMP,
   email VARCHAR(50),
   phone VARCHAR(15),
   issue_relation VARCHAR(30),
   description VARCHAR(600)
   )";
   if ($conn->query($sql) === TRUE) {
       echo "Table created." . "<br>";
   } else {
       echo "Could not create the tables: " . $conn->error;
       echo "Please contact your provider";
   }
   ////////////////////////////////////////////////////////////////////////
   // Create connection
   $conn = new mysqli(SERVER, USER, PSK, DBNAME);
   // Check connection
   if ($conn->connect_error) {
       die("Connection to the database failed: " . $conn->connect_error);
   } else{
   	echo 'Connected...' . '<br />';
   }

   // sql to create user
   $sql = "CREATE TABLE users (
   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   date TIMESTAMP,
   username VARCHAR(30) NOT NULL,
   email VARCHAR(50),
   password VARCHAR(30)
   )";

   if ($conn->query($sql) === TRUE) {
       echo "Table created";
   } else {
       echo "Could not create API: " . $conn->error;
       echo "Please contact your administrator";
   }

   $conn->close();
   ////////////////////////////////////////////////////////////////////////////
   //Create DBCONNECT
   $dbconnect = fopen("libs/dbconnect.php", "w") or die("Unable to open file!");
   $php = "<?php \n";
   fwrite($dbconnect, $php);
   $php = "\$dbserver = '$server';\n";
   fwrite($dbconnect, $php);
   $php = "\$dbuser = '$user';\n";
   fwrite($dbconnect, $php);
   $php = "\$dbpsk = '$psk';\n";
   fwrite($dbconnect, $php);
   $php = "\$dbname = '$dbname';\n";
   fwrite($dbconnect, $php);
   $php = "?>\n";
   fwrite($dbconnect, $php);
   fclose($dbconnect);
//////////////////////////////////////////////////////////////////////////////
   $dbconnect = fopen("../../CONSOLE/libs/dbconnect.php", "w") or die("Unable to open file!");
   $php = "<?php \n";
   fwrite($dbconnect, $php);
   $php = "\$dbserver = '$server';\n";
   fwrite($dbconnect, $php);
   $php = "\$dbuser = '$user';\n";
   fwrite($dbconnect, $php);
   $php = "\$dbpsk = '$psk';\n";
   fwrite($dbconnect, $php);
   $php = "\$dbname = '$dbname';\n";
   fwrite($dbconnect, $php);
   $php = "?>\n";
   fwrite($dbconnect, $php);
   fclose($dbconnect);
//////////////////////////////////////////////////////////////////////////////
   $dbconnect = fopen("../../TICKET/php/libs/dbconnect.php", "w") or die("Unable to open file!");
   $php = "<?php \n";
   fwrite($dbconnect, $php);
   $php = "\$dbserver = '$server';\n";
   fwrite($dbconnect, $php);
   $php = "\$dbuser = '$user';\n";
   fwrite($dbconnect, $php);
   $php = "\$dbpsk = '$psk';\n";
   fwrite($dbconnect, $php);
   $php = "\$dbname = '$dbname';\n";
   fwrite($dbconnect, $php);
   $php = "?>\n";
   fwrite($dbconnect, $php);
   fclose($dbconnect);
/////////////////////////////////////////////////////////////////////////////
   header("Location: adduser.php");
 }
  ?>


 <?php
 if (isset($_POST["submit"])) {
   $username = $_POST["username"];
   $email = $_POST["email"];
   $password = $_POST["password"];
   $password2 = $_POST["password_2"];

   if ($password === $password2) {
     require 'libs/dbconnect.php';

     $conn = new mysqli($dbserver, $dbuser, $dbpsk, $dbname);
     // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }

     $username = $_POST['username'];
     $email = $_POST['email'];
     $password = $_POST['password'];

     $sql = "INSERT INTO users (username, email, password)
     VALUES ('$username', '$email', '$password')";

     if ($conn->query($sql) === TRUE) {
         echo "User Added";
     }else {
         echo "Error: " . $sql . "<br>" . $conn->error;
     }

     $conn->close();
   }else {
      echo "Passwords does not match";
   }
  }
  ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Add user | HelpMe.now</title>
   </head>
   <body>
     <h1>Add User</h1>
     <form class="form" action="adduser.php" method="post">
       <label>Username:<br>
         <input type="text" name="username" value="" placeholder="username" required validate>
       </label><br><br>
       <label>E-mail:<br>
         <input type="email" name="email" value="" placeholder="e-mail" required validate>
       </label><br><br>
       <label>Password:<br>
         <input type="password" name="password" value="" placeholder="**********" required>
       </label><br><br>
       <label>Repeat password:<br>
         <input type="password" name="password_2" value="" placeholder="**********" required>
       </label><br><br>
       <input type="submit" name="submit" value="Add user">
     </form>
     <a href="finish.php">Finish</a>
   </body>
 </html>

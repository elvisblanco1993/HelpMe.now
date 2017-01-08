<!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Installation Form</title>
   </head>
   <body>
     <h2>Setup database</h2>
     <form class="" action="install.php" method="post">
       <label for="db_server">Database Server: </label><br>
       <input type="text" name="db_server" value="" placeholder="localhost" required><br><br>
       <label for="db_user">Mysql Username: </label><br>
       <input type="text" name="db_user" value="" placeholder="root" required><br><br>
       <label for="db_psk">Mysql Password: </label><br>
       <input type="password" name="db_psk" value="" required><br><br>
       <label for="db_name">Database Name: </label><br>
       <input type="text" name="db_name" value="" placeholder="Name your database" required><br><br>
       <input type="submit" name="submit" value="Setup database">
     </form>
   </body>
 </html>

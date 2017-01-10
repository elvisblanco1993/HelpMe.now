<?php
  if (isset($_POST["submit"])) {
    $smtpsrv = $_POST["mail-server"];
    $smtp_port = (int)$_POST["mail-port"];
    $smtp_security = $_POST["security"];
    $email = htmlentities(trim($_POST["email"]));
    $email_psk = $_POST["email-password"];
    $email_psk_r = $_POST["confirm-password"];
    $company = strip_tags(trim($_POST["company"]));


    if ($email_psk == $email_psk_r) {
      $dbconnect = fopen("../../TICKET/php/libs/mailconnect.php", "w") or die("Unable to open file!");
      $php = "<?php \n";
      fwrite($dbconnect, $php);
      $php = "\$smtpsrv = '$smtpsrv'; \n";
      fwrite($dbconnect, $php);
      $php = "\$smtp_port = $smtp_port; \n";
      fwrite($dbconnect, $php);
      $php = "\$smtp_security = '$smtp_security'; \n";
      fwrite($dbconnect, $php);
      $php = "\$mailtouse = '$email'; \n";
      fwrite($dbconnect, $php);
      $php = "\$mailpsktouse = '$email_psk'; \n";
      fwrite($dbconnect, $php);
      $php = "\$companyname = '$company'; \n";
      fwrite($dbconnect, $php);
      $php = "?> \n";
      fwrite($dbconnect, $php);
      fclose($dbconnect);
    } else {
      echo "Passwords does not match";
    }
    header("Location: adduser.php");
  }
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Add email | HelpMe.now</title>
   </head>
   <body>
     <h2>Add email information</h2>
     <p>In this section you will setup the email that will be used <br> for sending emails to clients.</p>
     <form class="form" action="" method="post">
       <label for="mail-server">SMTP Server</label><br>
        <input type="text" name="mail-server" value="" placeholder="SMTP Server"><br><br>
       <label for="mail-port">SMTP Port</label><br>
        <input type="text" name="mail-port" value="" placeholder="SMTP Port"><br><br>
       <label for="security">Encryption Type</label><br>
        <select name="security">
         <option value="tls">TLS</option>
         <option value="ssl">SSL</option>
         <option value="ssl-tls">SSL/TLS</option>
       </select><br><br>
       <label for="email">Email address</label><br>
        <input type="email" name="email" placeholder="Email"><br><br>
       <label for="password">Email Password</label><br>
        <input type="password" name="email-password" placeholder="Password"><br><br>
       <label for="confirm-password">Repeat Password</label><br>
        <input type="password" name="confirm-password" placeholder="Confirm password"><br><br>
       <label for="company">Company name (This will appear on all sent emails)</label><br>
        <input type="text" name="company" placeholder="Sent from"><br><br>
       <input type="submit" name="submit" value="Submit">
     </form>
   </body>
 </html>

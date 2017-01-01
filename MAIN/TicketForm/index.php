<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="css/master.css">
    <title>Support Request</title>
  </head>
  <body>
    <div class="container">
      <h3>Submit ticket</h3>
      <form class="form" action="php/script.php" method="post">
        <input type="text" name="email" placeholder="enter your email" required><br>
        <input type="text" name="phone" placeholder="enter your phone" required><br>
        <select class="selector" name="issue_relation" required><br>
          <option value="">Select an option</option>
          <option value="MS Windows">Windows OS</option>
          <option value="macOS/OSX/Apple products">Apple related</option>
          <option value="printers">Printer / scanner</option>
          <option value="GNU/Linux">Gnu/Linux Desktop</option>
          <option value="Linux server">Gnu/Linux server</option>
          <option value="other issues">Other</option>
        </select><br>
        <textarea name="description" rows="10" cols="60" placeholder="Please add a brief description(600 characters MAX)"></textarea><br>
        <input type="submit" name="send" value="Submit">
      </form>
      <p>Please fill in all the spaces in order to successfully send your ticket.</p>
    </div>
    <!-- <script src="js/script.js" charset="utf-8"></script> -->
  </body>
</html>

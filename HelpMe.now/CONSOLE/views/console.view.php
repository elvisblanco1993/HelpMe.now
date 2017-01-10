<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <link rel="stylesheet" href="css/tooltip.css">
    <title>Console</title>
  </head>
  <body>
    <nav>
      <div class="nav-wrapper green">
        <a href="console.php" class="brand-logo center hide-on-med-and-down">Inbox | Console</a>
        <ul class="">
          <li><a href="console.php">Inbox</a></li>
          <li><a href="archived.php">Archived</a></li>
          <form class="" action="" method="post">
            <li><input type="text" name="search" placeholder="Search Inbox"></li>
            <li><input type="submit" name="find" value="Search"></li>
            <li><input type="submit" name="archive" value="Archive it"></li>
          </form>
        </ul>
        <ul class="right">
          <!-- Right Top Corner -->
          <li><a style="font-weight: 300;"><?php echo ucfirst($username); ?></a></li>
          <li><a style="font-weight: 300;" href="libs/logout.php">Logout</a></li>
        </ul>
      </div>
    </nav>
    <script src="https://code.jquery.com/jquery-3.1.1.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
  </body>
</html>

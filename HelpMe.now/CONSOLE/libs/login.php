<?php
    session_start();

    if (isset($_POST['submit'])) {
        include("dbconnect.php");
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);

        $sql = "SELECT * FROM users WHERE username = '$username' AND activated = '1' LIMIT 1";

        $query = mysqli_query($dbCon, $sql);
         if ($query) {
            $row = mysqli_fetch_row($query);
            $userId = $row[0];
            $dbUsername = $row[2];
            $dbPassword = $row[4];
            echo "$userId $dbUsername $dbPassword";
         }
        if ($username == $dbUsername && $password == $dbPassword) {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $userId;
            header('Location: ../console.php');
        } else {
            echo "Incorrect Password";
            header('Location: ../index.php');
        }
    }
?>

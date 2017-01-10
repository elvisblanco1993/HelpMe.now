<?php
require_once '../libs/email.php'
?>
    <h1>Hi there</h1>
    <h3>Just wanted to let you know your ticket was successfully submited</h3>
    <p>Ticket number: TN-00<?php echo $id?></p>
    <p>Date submited: <?php echo $date ?></p>
    <p>Your email: <?php echo $email ?></p>
    <p>Phone number: <?php echo $phone ?></p>

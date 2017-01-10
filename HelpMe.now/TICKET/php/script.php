<?php
/*
Made by: Elvis Blanco Gonzalez <elvisblanco1993@gmail.com>;
*/
require 'libs/dbconnect.php';
// Create connection
$conn = new mysqli($dbserver, $dbuser, $dbpsk, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$phone = $_POST['phone'];
$email = $_POST['email'];
$issuerelation = $_POST['issue_relation'];
$description = $_POST['description'];
$sql = "INSERT INTO tickets (email, phone, issue_relation, description)
VALUES ('$email', '$phone', '$issuerelation', '$description')";
if ($conn->query($sql) === TRUE) {
    header("Location: views/success.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
////////////////////////////////SEND MAIL/////////////////////////////////
/////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
require_once "vendor/autoload.php";
require "libs/mailconnect.php";

$mail = new PHPMailer;
//Enable SMTP debugging.
// $mail->SMTPDebug = 3;
//Set PHPMailer to use SMTP.
$mail->isSMTP();
//Set SMTP host name
$mail->Host = $smtpsrv;
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;
//Provide username and password
$mail->Username = $mailtouse;
$mail->Password = $mailpsktouse;
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = $smtp_security;
//Set TCP port to connect to
$mail->Port = $smtp_port;
$mail->From = $mailtouse;
$mail->FromName = $companyname;
$mail->addAddress($email, "");      // EMAIL WILL BE SEND TO THE EMAIL ADDRESS THE USER ENTERED
$mail->isHTML(true);
$mail->Subject = "Ticket Notice";
$mail->msgHTML(file_get_contents('views/email.html'), dirname(__FILE__));
if(!$mail->send())
{
    echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
    echo "Message has been sent successfully";
}
$conn->close();
?>

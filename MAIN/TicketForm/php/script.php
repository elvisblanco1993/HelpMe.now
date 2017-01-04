<?php
/*
Made by: Elvis Blanco Gonzalez <elvisblanco1993@gmail.com>;
*/
$servername = "localhost";
$username = "root";
$password = "bahia9397";
$dbname = "helpmenow";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
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

$mail = new PHPMailer;

//Enable SMTP debugging.
// $mail->SMTPDebug = 3;
//Set PHPMailer to use SMTP.
$mail->isSMTP();
//Set SMTP host name
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;
//Provide username and password
$mail->Username = "dev.helpmenow@gmail.com";
$mail->Password = "bahia#9398";
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";
//Set TCP port to connect to
$mail->Port = 587;

$mail->From = "dev.helpmenow@gmail.com";
$mail->FromName = "HelpMe.now team";

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

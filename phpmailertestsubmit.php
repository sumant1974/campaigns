<?php
ini_set( 'session.cookie_secure', 1 );
//Import PHPMailer classes into the global namespace
 //These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';


//include("config.php"); 
error_reporting(0);

?>

<?php 

/*if(isset($_POST['submit']))
	{
$name = mysqli_real_escape_string($con,$_POST["fname"]);
$email = mysqli_real_escape_string($con,$_POST["email"]);
$phone = mysqli_real_escape_string($con,$_POST["phone"]);
$subject = mysqli_real_escape_string($con,$_POST["subject"]);
$msg = mysqli_real_escape_string($con,$_POST["textarea-349"]);

*/

$mail = new PHPMailer();
$mail->IsSMTP(); // tell the class to use SMTP
$mail->SMTPDebug = 1; // uncomment to print debugging info

// Timezone
date_default_timezone_set('Asia/Kolkata');

// SMTPProvider Engine installation settings
$mail->Host = "app-camu.01.hartlecuyerpoetry.com"; // Connect to this SMTPProvider server
$mail->SMTPAuth = true; // enables SMTP authentication. 
$mail->Port = 587; // SMTP submission port to inject mail into. Usually port 587
$mail->Username = "smtpprov-uaabaffhh"; // SMTP username
$mail->Password = "ssworks1368"; // SMTP password

// Campaign Settings
$mail_class = "transactional"; // Mail Class to use
$mail->SetFrom("noreply@eduskillsfoundation.org", "EduSkills Foundation");
$mail->Subject = "PHPMailer Example";
$mail->MsgHTML("HTML body");
$mail->AltBody = "Text body";
//$mail->addAttachment('images/phpmailer_mini.png');

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);


// Individual Recipient Settings
$recipient = "sumant1974@gmail.com";
$recipient_name = "Sumanta Sahoo";

// Generate the To: and X-SMTPProvider-MailClass headers
$mail->AddAddress($recipient, $recipient_name);
$mail->addCustomHeader("X-SMTPProvider-MailClass: $mail_class");

$mail->send();
    ?>
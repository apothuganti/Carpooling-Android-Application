<?php
require './PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'ourcarpoolingapp@gmail.com';          // SMTP username
$mail->Password = 'arizonastate'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('ourcarpoolingapp@gmail.com', 'CarPoolingApp');
$mail->addReplyTo('ourcarpoolingapp@gmail.com', 'vijetha');
$mail->addAddress('vijetha.gattupalli@gmail.com');   // Add a recipient
$mail->addCC('');
$mail->addBCC('');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h4>Your account has been successfully created in OurCarPoolingApp.</h4>';
//$bodyContent .= '<p>This is the HTML email sent from localhost using PHP script </p>';

$mail->Subject = 'Email from OurCarPoolingApp';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
	echo 'Message could not be sent.';
	echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
	echo 'Message has been sent';
}
?>
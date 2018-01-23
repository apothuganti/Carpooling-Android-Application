<?php
require("config.inc.php");
if (!empty($_POST)) {
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
	$mail->addAddress($_POST['Email']);   // Add a recipient
	$mail->addCC('');
	$mail->addBCC('');

	$mail->isHTML(true);  // Set email format to HTML
	$bodyContent = 'The OTP is '.$_POST['OTP'];
	//$bodyContent .= '<p>This is the HTML email sent from localhost using PHP script </p>';

	$mail->Subject = 'Email from OurCarPoolingApp';
	$mail->Body    = $bodyContent;

	if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'Message has been sent';
	}

    $response["success"] = 1;
    $response["message"] = "Successfully Added!";
    echo json_encode($response);
    
    //for a php webservice you could do a simple redirect and die.
    //header("Location: login.php"); 
    //die("Redirecting to login.php");
    
    
} else {
?>
	<form action="getOTP.php" method="post"> 
	    OTP<br/>
		<input type="text" name="OTP" value="" /> 
	    <br /><br /> 
		Email Id:<br /> 
	    <input type="text" name="Email" value="" /> 
	    <br /><br /> 
		<input type="submit" value="get OTP" />
	</form>
	<?php
}

?>
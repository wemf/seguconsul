<?php
require './vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
require './config/config.php';
$mail = new PHPMailer;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	//Sanitaze inputs
    $name    = stripslashes(trim($_POST['name']));
    $email   = stripslashes(trim($_POST['email']));
    $surname   = stripslashes(trim($_POST['surname']));
    $phone   = stripslashes(trim($_POST['phone']));
    $message   = stripslashes(trim($_POST['message']));
    
    $pattern = '/[\r\n]|Content-Type:|Bcc:|Cc:/i';
    if (preg_match($pattern, $name) || preg_match($pattern, $email)) {
		die("Header injection detected");
    }
    $emailIsValid = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($name && $email && $emailIsValid) {
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		$mail->SMTPOptions = array('ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true));
		//Set the hostname of the mail server
		$mail->Host = 'uscentral447.accountservergroup.com';
		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 465;
		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = user;
		//Password to use for SMTP authentication
		$mail->Password = pass;
        $mail->addAddress(to);
		//Set who the message is to be sent from
		$mail->setFrom(from, from);
		//Set email Subject
		$mail->Subject = prefix;
		//Set email body content
        $body = "
        <!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
        <html>
            <head>
                <meta charset=\"utf-8\">
            </head>
            <body>
                <h1>Cliente registrado del formulario de contacto:</h1>
                <p><strong>Nombre:</strong> {$name}</p>
                <p><strong>Apellido:</strong> {$surname}</p>
                <p><strong>Email:</strong> {$email}</p>
                <p><strong>Telf:</strong> {$phone}</p>
                <p><strong>Mensaje:</strong> {$message}</p>
            </body>
		</html>";
		$mail->isHTML(true);
		$mail->Body = $body;


$okMessage = 'Mensaje enviado correctamente. Pronto nos pondremos en contacto con usted.';
$errorMessage = 'Hubo un error durante el envío del mensaje. Por favor intente más tarde.';
$responseArray = array('type' => 'success', 'message' => $okMessage);

		//Send email, save data on users_emails.txt and show error if not
		if(!$mail->send()) {
			$hasError = true;
			$msgError = $mail->ErrorInfo;
$encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
		}
		else {
			$emailSent = true;
			$fp = fopen('users_emails.txt', 'a');
			fwrite($fp, 'Nombre: '.$name.'; Email: '.$email.';'."\n");
			fclose($fp);
$encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
		}
    } 
}
?>
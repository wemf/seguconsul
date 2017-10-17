<?php
$name    = stripslashes(trim($_POST['name']));
$email   = stripslashes(trim($_POST['email']));
$surname   = stripslashes(trim($_POST['surname']));
$phone   = stripslashes(trim($_POST['phone']));
$message   = stripslashes(trim($_POST['message']));
	
$to = "contacto@seguconsul.com";
$subject = "Solicitud de Contacto desde Seguconsul";

$message = "
<html>
<head>
<title>Nueva solicitud</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<h1>Cliente registrado del formulario de contacto:</h1>
<p><strong>Nombre:</strong> {$name}</p>
<p><strong>Apellido:</strong> {$surname}</p>
<p><strong>Email:</strong> {$email}</p>
<p><strong>Telf:</strong> {$phone}</p>
<p><strong>Mensaje:</strong> {$message}</p>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <admin@seguconsul.com>' . "\r\n";
$headers .= 'Cc: williameduardomeza@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);

header('Location: ' . $_SERVER['HTTP_REFERER'].'?msg=success');
die();
?>
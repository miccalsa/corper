<?php
	if ($_POST["txtName"]<>''){
		$ToEmail = 'info@cortinasyserviciosrojas.com';
		$EmailSubject = 'Cotizacion';
		$mailheader = "From: info@cortinasyserviciosrojas.com\r\n";
		$mailheader .= "Reply-To: info@cortinasyserviciosrojas.com\r\n";
		$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$MESSAGE_BODY = "Nombre: ".$_POST["txtName"]."";
		$MESSAGE_BODY .= "Telefono: ".$_POST["txtPhone"]."";
		$MESSAGE_BODY .= "Email: ".$_POST["txtEmail"]."";
		$MESSAGE_BODY .= "Consulta: ".nl2br($_POST["txtMessage"])."";
		mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Error de Envio"); 
	}
?>
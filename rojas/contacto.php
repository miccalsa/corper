<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <?php
        if ($_POST["txtName"]<>''){
            $ToEmail = 'info@cortinasyserviciosrojas.com';
            $EmailSubject = 'Cotizacion';
            $mailheader = "From: info@cortinasyserviciosrojas.com\r\n";
            $mailheader .= "Reply-To: info@cortinasyserviciosrojas.com\r\n";
            $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";
            $MESSAGE_BODY = "Nombre: ".$_POST["txtName"]."<br />";
            $MESSAGE_BODY .= "Telefono: ".$_POST["txtPhone"]."<br />";
            $MESSAGE_BODY .= "Email: ".$_POST["txtEmail"]."<br />";
            $MESSAGE_BODY .= "Consulta: ".nl2br($_POST["txtMessage"])."<br />";
            if(mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader)){
                echo'<script> window.location="index.html"; </script> ';
            }else{
                echo "<h3>Lo sentimos! Al parecer hubo un error con su consulta</h3>";
            }
        }else{
    ?>
    <section id="contactSection">
        <h1>Contacto</h1>
        <p>
            Complete el siguiente formulario y nos comunicaremos con usted lo antes posible.
            Estamos al servicio del cliente de Lunes a Domingo previa cita.
        </p>
        <form method="post" action="contacto.php">
            <div class="field_name">Nombre*</div>
            <div class="field_value">
                <input type="text" id="txtName" name="txtName">
            </div>
            <div class="field_name">Telefono*</div>
            <div class="field_value">
                <input type="text" id="txtPhone" name="txtPhone">
            </div>
            <div class="field_name">Email*</div>
            <div class="field_value">
                <input type="text" id="txtEmail" name="txtEmail">
            </div>
            <div class="field_name">Consulta*</div>
            <div class="field_value contact">
                <textarea id="txtMessage" cols="20" rows="2" name="txtMessage"></textarea>
            </div>
            <div class="send">
                <input type="submit" value="Enviar" name="send">
            </div>
        </form>
    </section>
    <?php } ?>
</body>
</html>
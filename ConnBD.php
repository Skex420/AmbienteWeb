<?php

    function AbrirBD()
    {
        $server = "localhost";
        $user = "root";
        $pass = "";        
        $database = "letech";

        return new mysqli($server,$user,$pass,$database);
    }    
    function CerrarBD($conexion)
    {
        $conexion -> close();
    }

    function NotificarUsuario($destinatario,$Asunto,$contenidoCorreo)
    {
        require 'PHPMailer/src/PHPMailer.php';
		require 'PHPMailer/src/SMTP.php';

		$mail = new PHPMailer();
		$mail -> CharSet = 'UTF-8';

		$body = $contenidoCorreo;

		$mail -> IsSMTP();
		$mail -> Host = 'smtp.office365.com';
		$mail -> SMTPSecure = 'tls';
		$mail -> Port = 587;
		$mail -> SMTPAuth = true;
		$mail -> Username = 'claseProgra3.5@outlook.com';
		$mail -> Password = 'progra3.5';
		$mail -> SetFrom('claseProgra3.5@outlook.com', "Le Tech");
		$mail -> Subject = $Asunto;
		$mail -> MsgHTML($body);

		$mail->AddAddress($destinatario, 'Cliente');
		$mail->send();
    }
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$respuesta;

$mail = new PHPMailer;
$my_email = 'contacto@tupulsera.cl';
$to_email = 'jerexxypunto@gmail.com';
try {        
        $mail->SMTPDebug = 3;                               // Enable verbose debug output
        $ancho = $_POST['color'];
        $impresion =  $_POST['color_frase'];
        $cantidad = $_POST['cantidad']; 
        $nombre = $_POST['name'];
        $email = $_POST['email'];
        $telefono = $_POST['phone'];
        $msj = $_POST['comments'];
        $msj = utf8_decode($msj);

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.tupulsera.cl ';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $my_email;                 // SMTP username
        $mail->Password = '@Jworg914';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->setFrom($my_email, 'tupulsera.cl');
        $mail->addAddress($to_email, $nombre);     


        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Nuevo pedido de tupulsera.cl';
        $mail->Body    = '<style>
                                h2{padding-bottom:10px;margin-bottom:0;}
                                p b{font-weight:bolder;}
                          </style>
                          <h2>Nuevo pedido de'.$nombre.'</h2>
                          <p><b>Ancho: </b>'.$ancho.'</p>
						  <p><b>Impresión: </b>'.$impresion.'</p>
						  <p><b>Cantidad: </b>'.$cantidad.'</p>
						  <h2>Datos de contacto:'.$cantidad.'</h2>
						  <p><b>email: </b>'.$email.'</p>
						  <p><b>Telefono: </b>'.$telefono.'</p>
						  <p><b>Comentarios: </b>'.$msj.'</p>';
        $mail->send();

		echo $mail->body;
        $respuesta = 'El mensaje fue enviado correctamente';
} catch (Exeption $e) {
        $respuesta = "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
}

echo $respuesta;
header("location:../gracias.html");
?>
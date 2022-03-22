<?php
  if( !empty($_POST['color']) && 
  	  !empty($_POST['frase_pulsera']) &&
	  !empty($_POST['color_frase']) && 
	  !empty($_POST['cantidad']) && 
	  !empty($_POST['name']) && 
	  !empty($_POST['email']) && 
	  !empty($_POST['phone']) &&
	  !empty($_POST['comments'])
	){
	   	$color = $_POST['color'];
		$frase_pulsera = $_POST['frase_pulsera'];
		$color_frase = $_POST['color_frase'];
		$cantidad = $_POST['cantidad'];
		$nombre = $_POST['name'];
		$email  = $_POST['email'];
		$telefono  = $_POST['phone'];
		$msj = $_POST['comments'];

			$cabeceras = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$to = 'jerexxypunto.cl@gmail.com';
			$subject = "Pedido: Pulseras luz LED";
			$message = "<html>".
						"<h2>Tiene un pedido de una Pulseras con luz LED</h2>".
						"<h3>Datos de contacto:</h3>".
						"<p><b>Nombre:</b> $nombre</p>".
						"<p><b>Email:</b> $email</p>".
						"<p><b>Telefono:</b> $telefono</p>".
						"<h3>Datos del pedido:</h3>".
						"<p><b>Color:</b> $color</p>".
						"<p><b>Frase pulsera:</b> $frase_pulsera</p>".
						"<p><b>Color frase:</b> $color_frase</p>".
						"<p><b>Cantidad:</b> $cantidad</p>".
						"<h3>Comentarios:</h3>".
						"<p>$msj</p>".
						"</html>";
			$message = utf8_decode($message);
			
			if(mail(  $to, $subject, $message, $cabeceras)){
				header('Location:../gracias.html');
			}else{
				echo '¡ups ha ocurrido un error al enviar el mensaje!';
			}
  }else{
	  echo '¡ups! no lleno todos los campos';
  }
?>
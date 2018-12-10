<?php
$nombre = $_POST['nombre'];
$mail = $_POST['mail'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

$header = 'From: ' . $mail . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$c_mensaje = "Este mensaje fue enviado por " . $nombre . ",\r\n";
$c_mensaje .= "Su e-mail es: " . $mail . " \r\n";
$c_mensaje .= "Mensaje: " . $mensaje . " \r\n";
$c_mensaje .= "Enviado el " . date('d/m/Y', time());

$para = 'ivonnevazquez@vazda.com.mx';

mail($para, $asunto, utf8_decode($c_mensaje), $header);

?>
<body>
		<script type="text/javascript">
		window.location="/vazda-web-v3/contacto.php";
		alert("Mensaje Enviado");
		</script>
</body>

<?php


 ?>
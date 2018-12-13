<?php 
	$user = $_POST['user'];
	$password = $_POST['password'];

	require_once 'conexion.php';

	$consulta = "SELECT * FROM usuario WHERE usuario = '$user' AND contrasena = '$password'";
 	
 	$resultado = mysqli_query($conexion, $consulta);

 	$filas = mysqli_num_rows($resultado);

 	if ($filas > 0) {
 	  	session_start();

		$_SESSION['usuario'] = $user;

		$sql    = "SELECT * FROM usuario WHERE usuario = '$user'";
	    $result = mysqli_query($conexion, $sql);
	    while ($mostrar = mysqli_fetch_array($result)) {
       		$id = $mostrar["usuario_id"];
    	}
		
		header("Location:/vazda-web-v2/pedidos.php");
 	}else{
 		header("location:/vazda-web-v2/login.php");
 	}
 	
 	mysqli_free_result($resultado);

 	mysqli_close($conexion);
 ?>
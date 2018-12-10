<?php 

if (isset($_POST['agregar-usuario'])) {

	$nombre = $_POST['nombre'];
	$puesto = $_POST['puesto'];
	$usuario = $_POST['user'];
	$password = $_POST['password'];

	try {
  		include_once "conexion.php";
		$stmt = $conexion->prepare("INSERT INTO usuario (nombre, puesto, usuario, contrasena) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("ssss", $nombre, $puesto, $usuario, $password);
		$stmt->execute();
		$id_registro = $stmt->insert_id;
		if ($id_registro > 0) {
			$respuesta = array(
				'respuesta' => 'exito',
				'id_admin' => $id_registro,
				'nombre' => $nombre
			);
			die(json_encode($respuesta));
		}else{
			$respuesta = array(
				'respuesta' => 'error'
			);
		}
		$stmt->close();
		$conexion->close();
	} catch (Exception $e) {
		echo "error" . $e->getMessage;
	}

	die(json_encode($respuesta));
}
?>
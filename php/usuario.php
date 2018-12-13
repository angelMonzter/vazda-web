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

if (isset($_POST['usuario_id'])) {

	$usuario_id = $_POST['usuario_id'];

	try {
  		include_once "conexion.php";
		$stmt = $conexion->prepare("DELETE FROM usuario WHERE usuario_id = ?");
		$stmt->bind_param("i", $usuario_id);
		$stmt->execute();
		if ($stmt->affected_rows) {
			$respuesta = array(
				'respuesta' => 'exito',
				'usuario_id' => $usuario_id
			);
			
		}else{
			$respuesta = array(
				'respuesta' => 'error'
			);
		}
	} catch (Exception $e) {
		echo "error" . $e->getMessage;
	}

	die(json_encode($respuesta));
}


?>
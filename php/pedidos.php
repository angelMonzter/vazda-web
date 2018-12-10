<?php 

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $descripcion_pedido = htmlspecialchars($_POST['descripcion_pedido']);
  $no_piezas = $_POST['no_piezas'];
  $material = $_POST['material'];
  $especifica_material = $_POST['especifica_material'];
  $fecha_pedido = date("Y/m/d");

if (isset($_POST['pedido'])) {

  /*revisar si se estan enviando los datos con imagen
  $respuesta = array(
      'post' => $_POST, 
      'file' => $_FILES
  );

  die(json_encode($respuesta));
  */
  $directorio = "../img/archivos_pedidos/";

  if (!is_dir($directorio)) {
    mkdir($directorio, 0755, true);
  }

  if (move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $_FILES['imagen']['name'])) {
    $nombre_archivo = $_FILES['imagen']['name'];
    $ruta_archivo = "img/archivos_pedidos/" . $_FILES['imagen']['name'];
    $imagen_resultado = "se subio correctamente";
  }else{
    $respuesta = array(
        'respuesta' => error_get_last()
    );
  }


  try {
    require_once 'conexion.php';
    $stmt = $conexion->prepare("INSERT INTO pedidos (nombre, apellido, correo, telefono, descripcion_pedido, nombre_archivo, ruta_archivo, piezas, material, especifica_material, fecha_pedido) VALUES (?, ?, ? , ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisssisss", $nombre, $apellido, $correo, $telefono, $descripcion_pedido, $nombre_archivo, $ruta_archivo, $no_piezas, $material, $especifica_material, $fecha_pedido);
    $stmt->execute();
    $id_insertado = $stmt->insert_id;
    if ($stmt->affected_rows) {
      $respuesta = array(
        'respuesta' => 'exito',
        'id_insertado' => $id_insertado,
        'resultado_img' => $imagen_resultado
      );
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
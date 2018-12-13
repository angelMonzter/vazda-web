<?php 
    require 'templates/header.php';
    require_once 'php/conexion.php';
         
    error_reporting(0);

    session_start();
    $usuario = $_SESSION['usuario'];

    $sql = "SELECT * FROM usuario WHERE usuario = '$usuario'";
    $result = mysqli_query($conexion, $sql);
    while ($mostrar = mysqli_fetch_array($result)) {
        $id = $mostrar["usuario_id"];
        $puesto = $mostrar["puesto"];
    }

    if ($usuario == null || $usuario = '') {
        header("location:login.php");
        die();
    }
?>

 <!--body/container-->
<section>
	<!--pedidos-->
	<div class="pedidos">
	<br>
    <h2 class="row wow fadeInDown animated" data-wow-delay=".3s">Pedidos</h2>
    <hr>
    <br>

    <!--datos de usuario logueado-->
    <div class="row datos_usuario">
        <div>
            <li><b><?php echo $_SESSION['usuario'];?></b> <span>| <?php echo $puesto; ?></span></li>
            <li>
                <a data-tooltip tabindex="1" title="Regresar a pedidos" data-position="top" data-alignment="center" title="Regresar a Pedidos" class="button small hollow alert" href="pedidos.php"><i class="fas fa-backspace"></i></a>
            </li>
        </div>
    </div>
    <!--datos de usuario logueado-->

    <!--tarjeta de pedidos-->
    <div class="row">
        <table>
          <thead>
            <tr>
              <th class="nombre">Nombre</th>
              <th class="puesto">Puesto</th>
              <th>Usuario</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
    <?php
        $sql = "SELECT * FROM usuario";
        $result = mysqli_query($conexion, $sql);
        while ($mostrar = mysqli_fetch_array($result)) {
    ?>
            <tr>
                <td class="nombre"><?php echo $mostrar['nombre']; ?></td>
                <td class="puesto"><?php echo $mostrar['puesto']; ?></td>
                <td><?php echo $mostrar['usuario']; ?></td>
                <form class="eliminar-usuario" action="php/usuario.php" method="POST">
                    <input type="hidden" name="usuario_id" value="<?php echo $mostrar['usuario_id']; ?>">
                    <td><input type="submit" class="boton-eliminar button small boton" value="Eliminar"></td>
                </form>
            </tr>
    <?php 
        }
    ?>
          </tbody>
        </table>
    </div>
               
    <br>
    <!--tarjeta de pedidos-->
    
    <br><br>

<script src="js/eliminar-usuario.js"></script>

    <!--pedidos-->
</section>
<!--body/container-->


<?php 
	require 'templates/footer.php';
 ?>

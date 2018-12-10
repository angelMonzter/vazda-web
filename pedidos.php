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
                <a data-tooltip tabindex="1" title="Cerrar Sesion" data-position="top" data-alignment="center" title="Cerrar Sesion" class="button small hollow alert" href="php/cerrar-sesion.php"><i class="fas fa-backspace"></i></a>
                <!-- Trigger/Open The Modal -->
                <a data-tooltip tabindex="1" title="Nuevo Administrador" data-position="top" data-alignment="center" id="myBtn" class="button small hollow"><i class="fas fa-users"></i></a>
            </li>
        </div>
    </div>
    <!--datos de usuario logueado-->

    <!--tarjeta de pedidos-->
    <?php
        $conexion = mysqli_connect("localhost", "root" ,"" , "vazdaweb");
        $sql = "SELECT * FROM pedidos";
        $result = mysqli_query($conexion, $sql);
        while ($mostrar = mysqli_fetch_array($result)) {
    ?>
    <div class="row pedidos">
        <div id="datos">
            <div class="row">
                <div class="large-4 columns">
                    <p><b>Nombre: </b><?php echo $mostrar['nombre'] . " " . $mostrar['apellido']; ?></p>
                </div>
                <div class="large-3 columns">
                    <p><b>Correo: </b><?php echo $mostrar['correo']; ?></p>
                </div>
                <div class="large-3 columns">
                    <p><b>Telefono: </b><?php echo $mostrar['telefono']; ?></p>
                </div>
                <div class="large-2 columns">
                    <p><b>Fecha: </b><?php echo $mostrar['fecha_pedido']; ?></p>
                </div>
            </div>
            <div>
                <p class="descripcion"><b>Descripcion del pedido:</b><br><?php echo $mostrar['descripcion_pedido']; ?></p>
            </div>
            <div class="row">
                <div class="large-4 columns">
                    <p><b>Piezas: </b><?php echo $mostrar['piezas']; ?></p>
                </div>
                <div class="large-4 columns">
                    <p><b>Material: </b><?php echo $mostrar['material'] . " " . $mostrar['especifica_material']; ?></p>
                </div>
                <div class="large-4 columns">
                    <div>
                        <span>
                            <a class="descargar button" href="<?php echo $mostrar['ruta_archivo']; ?>" download="<?php echo $mostrar['nombre_archivo']; ?>">Descargar <i class="fas fa-download"></i></a>
                        </span>
                        <!--<span class="editar">
                            <input type="submit" id="editar" class="button boton" value="Editar" onclick="editar();">
                        </span>-->
                    </div>
                </div>
            </div>
        </div>
        
        <div id="input">
            <form action="php/editar_pedidos.php" method="POST" id="formulario_editar">
                <div class="row">
                    <div class="large-3 medium-3 columns">
                        <label for="">Nombre:
                            <input type="text" name="nombre" value="<?php echo $mostrar['nombre']; ?>">
                            <input type="hidden" name="pedido_id" value="<?php echo $mostrar['pedido_id']; ?>">
                        </label>
                    </div>
                    <div class="large-3 medium-3 columns">
                        <label for="">Apellido:
                            <input type="text" name="apellido" value="<?php echo $mostrar['apellido']; ?>">
                        </label>
                    </div>
                    <div class="large-3 medium-3 columns">
                        <label for="">Correo:
                            <input type="email" name="correo" value="<?php echo $mostrar['correo']; ?>">
                        </label>
                    </div>
                    <div class="large-3 medium-3 columns">
                        <label for="">Telefono:
                            <input type="text" name="telefono" value="<?php echo $mostrar['telefono']; ?>">
                        </label>
                    </div>
                </div>
                <div>
                    <label for="">Descripcion:
                        <textarea name="descripcion_pedido" cols="10" rows="7"><?php echo $mostrar['descripcion_pedido']; ?></textarea>
                    </label>
                </div>
                <div class="row">
                    <div class="large-4 medium-4 columns">
                        <label for="">Piezas:
                            <input type="text" name="piezas" value="<?php echo $mostrar['piezas']; ?>">
                        </label>
                    </div>
                    <div class="large-4 medium-4 columns">
                        <label for="">Material:
                            <input type="text" name="material" value="<?php echo $mostrar['material'];?>">
                        </label>
                    </div>
                    <div class="large-4 medium-4 columns">
                        <label for="">Otro:
                            <input type="text" name="especifica_material" value="<?php echo $mostrar['especifica_material']; ?>">
                        </label>
                    </div>
                </div>
                <input type="submit" onclick="editar();" id="guardar<?php echo $mostrar['pedido_id']; ?>" class="button expanded boton" value="Guardar">
            </form>
        </div>
    </div>
    <br>
    <?php 
        }
    ?>
    <!--tarjeta de pedidos-->
    

    <!-- The Modal -->
    <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
            <form action="php/usuario.php" method="POST" id="crear-usuario">
                <div class="row">
                    <div class="">
                        <label for="">Nombre:
                            <input type="text" class="letras" name="nombre" placeholder="Nombre Completo">
                        </label>
                        <label for="">Puesto:
                            <input type="text" class="letras" name="puesto" placeholder="Puesto/Cargo">
                        </label>
                        <label for="">Usuario:
                            <input type="text" name="user" placeholder="Usuario">
                        </label>
                        <label for="">Contraseña:
                            <input type="password" name="password" placeholder="Contraseña">
                        </label>
                        <input type="hidden" name="agregar-usuario" value="1">
                        <input type="submit" value="Registrar"  class="button expanded small boton">
                    </div>
                </div>
            </form>
      </div>
    </div>
    <!-- The Modal -->

    <br><br>

    <!--pedidos-->
</section>
<!--body/container-->

<?php 
	require 'templates/footer.php';
 ?>

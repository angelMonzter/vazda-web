<?php 
    require 'templates/header.php';
?>
 <!--body/container-->
<section>
	<!--login-->
	<div class="contacto">
	<br>
    <h2 class="row wow fadeInDown animated" data-wow-delay=".3s">Iniciar Sesion</h2>
    <hr>
    
    <div class="row large-5 medium-7 small-11 colums login">
        <form action="php/sesion.php" method="POST">
            <div>
                <label for="">Usuario:
                    <input type="text" name="user">
                </label>
                <label for="">Contraseña:
                    <input type="password" name="password">
                </label>
                <input type="submit" value="Entrar" class="button small boton">
            </div>
        </form>
    </div>    
    
    <br><br>
    
    <!--login-->
</section>
<!--body/container-->

<?php 
	require 'templates/footer.php';
 ?>
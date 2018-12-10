<?php 
require 'templates/header.php';
 ?>

 <!--body/container-->
<section>
	<!--contacto-->
	<div class="contacto">
	<br>
        <h2 class="row wow fadeInDown animated" data-wow-delay=".3s">Contacto</h2>
        <hr>

        <div class="tab row">
          <button class="tablinks" onclick="openTab(event, 'tabone')" id="defaultOpen">Pedido</button>
          <button class="tablinks" onclick="openTab(event, 'tabtwo')">Correo</button>
        </div>


        <div id="tabone" class="tabcontent row">
                <form action="php/pedidos.php" method="POST" enctype="multipart/form-data" id="formulario_pedido">
                    <div class="wow fadeInDown animated" data-wow-delay=".4s">
                            <div>
                                    <div class="large-6 columns">
                                            <label>Nombre:
                                                    <input class="letras" type="text" required="" name="nombre"  placeholder="Nombre(s)">
                                            </label>
                                    </div>
                                    <div class="large-6 columns">
                                            <label>Apellido:
                                                    <input class="letras" type="text" required="" name="apellido"  placeholder="Apellidos">
                                            </label>
                                    </div>
                            </div>
                            <div>
                                    <div class="large-6 columns">
                                            <label>Correo:
                                                    <input type="email" name="correo" required="" placeholder="contacto@vazda.com">
                                            </label>
                                    </div>
                                    <div class="large-6 columns">
                                            <label>Telefono:
                                                    <input class="numero" type="text" required="" name="telefono"  placeholder="Numero de Telefono">
                                            </label>
                                    </div>
                            </div>
                            <label>Descripcion de pedido:
                                    <textarea cols="10" rows="5" name="descripcion_pedido" required="" placeholder="Descripcion de Pedido (No copiar y pegar texto)"></textarea>
                            </label>
                            <div class="row">
                                    <div class="large-4 columns">
                                            <div class="archivo">
                                                <label class="file" for="file">Subir Archivos
                                                    <input type="file" name="imagen" id="file">
                                                </label>
                                            </div>
                                    </div>
                                    <div class="large-4 columns">
                                            <label>Numero piezas:
                                                    <input class="numero" required="" type="text" name="no_piezas"  placeholder="No. Piezas">
                                            </label>
                                    </div>
                                    <div class="large-4 columns" id="div-materiales">
                                            <label>Material:
                                                    <select name="material" id="material" required="" onclick="materiales();" >
                                                            <option value="Acero">Acero</option>
                                                            <option value="Acero-4140 T">Acero-4140 T</option>
                                                            <option value="Acero-4140 R">Acero-4140 R</option>
                                                            <option value="Acero-1018">Acero-1018</option>
                                                            <option value="Acero-A36">Acero-A36</option>
                                                            <option value="Duraluminio">Duralumino</option>
                                                            <option value="Laton">Laton</option>
                                                            <option value="Acero Inoxidable">Acero Inoxidable</option>
                                                            <option value="Bronce">Bronce</option>
                                                            <option value="Nylamind">Nynalimd</option>
                                                            <option value="Cobre">Cobre</option>
                                                            <option id="otro-material" value="otro">Otro</option>
                                                    </select>
                                            </label>
                                    </div>
                                    <div class="large-4 columns" id="especifica-material">
                                            <label>Especifica el material:
                                                    <input type="text" name="especifica_material" placeholder="Material">
                                            </label>
                                    </div>
                            </div>
                            <div>	
                            		<input type="hidden" name="pedido" value="1">
                                    <input type="submit" id="agregar_pedido" class="button expanded boton" value="Enviar">
                            </div>
                    </div>
                </form>
        </div>
               
        <div id="tabtwo" class="tabcontent row">
                <form action="php/email.php" method="POST">
                    <div>
                            <div class="large-4 columns">   
                                    <label>Nombre:
                                            <input class="letras" type="text" name="nombre" placeholder="Nombre Completo">
                                    </label>
                            </div>
                            <div class="large-4 columns">
                                    <label>Correo:
                                            <input type="email" name="mail" placeholder="contacto@vazda.com">
                                    </label>  
                            </div>
                            <div class="large-4 columns">
                                    <label>Asunto:
                                            <input type="text" name="asunto" placeholder="Asunto">
                                    </label>  
                            </div>
                            <label>Mensaje:
                                    <textarea cols="30" rows="10" name="mensaje" placeholder="Mensaje"></textarea>
                            </label>
                            <div>
                                    <input type="submit" class="button expanded boton" value="Enviar">
                            </div>
                    </div>
                </form>
        </div>
    <!--contacto-->
</section>
<!--body/container-->

<br><br>
<?php 
	require 'templates/footer.php';
 ?>
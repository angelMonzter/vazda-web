function editar() {
  var input = document.getElementById('input');
  var datos = document.getElementById('datos');
  var botonEditar = document.getElementById('editar');

  datos.style.display = "block";

  if (datos.style.display === "block") {
    input.style.display = "block";
    datos.style.display = "none";
  }else{
    input.style.display = "none";
  }
}

var botonEditar = document.getElementById('guardar');
var formulario = document.getElementById('formulario_editar');
var action = formulario.getAttribute('action');

function edicionExitosa(id) {
 console.log("exito");
 
  var input = document.getElementById('input' + id);
  var datos = document.getElementById('datos' + id);
  var botonEditar = document.getElementById('editar' + id);

  input.style.display = "block";

  if (input.style.display === "block") {
    datos.style.display = "block";
    input.style.display = "none";
  }else{
    datos.style.display = "none";
  }
}

function editarPedidos(){
  var form_datos = new FormData(formulario);
  for([key, value] of form_datos.entries()){
    console.log(key + " :" + value);
  }
  var xhr = new XMLHttpRequest();
  xhr.open('POST', action, true);
  xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var resultado = xhr.responseText;
      var json = JSON.parse(resultado);
      if (json.respuesta == true) {
        edicionExitosa(json.pedido_id);
      }
    }
  }
  xhr.send(form_datos);
}

botonEditar.addEventListener('click', function (e) {
  e.preventDefault();
  editarPedidos();
});

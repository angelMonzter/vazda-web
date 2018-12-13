$(document).ready(function () {
  $('#formulario_pedido').on('submit', function (e) {
    e.preventDefault();

    var datos = new FormData(this);

    $.ajax({
      type: $(this).attr('method'),
      data: datos,
      url: $(this).attr('action'),
      dataType: 'json',
      contentType: false,
      processData: false,
      async: true,
      cache: false,
      success: function(data){
        var resultado = data;
        if (resultado.respuesta == 'exito') {
          $('#formulario_pedido')[0].reset();
          swal({
            title: "Correcto!",
            text: "El pedido se realizo correctamente!",
            icon: "success",
          });
        }else{
          swal({
            title: "Error!",
            text: "El pedido no se realizo, vuelva a intenar",
            icon: "error",
          });
        }
      }
    })
  });

  $('#crear-usuario').on('submit', function (e) {
    e.preventDefault();

    var datos = $(this).serializeArray();

    $.ajax({
      type: $(this).attr('method'),
      data: datos,
      url: $(this).attr('action'),
      dataType: 'json',
      success: function(data){
        var resultado = data;
        if (resultado.respuesta == 'exito') {
          $('#crear-usuario')[0].reset();
          swal({
            title: "Correcto!",
            text: "El administrador se creo correctamente!",
            icon: "success",
          });
        }else{
          swal({
            title: "Error!",
            text: "El administrador no se creo!",
            icon: "error",
          });
        }
      }
    })
  });

  var fila_usuario = document.getElementsByClassName('eliminar-usuario');

  $('.eliminar-usuario').on('submit', function (e) {
    e.preventDefault();

    var datos = $(this).serializeArray();

    $.ajax({
      type: $(this).attr('method'),
      data: datos,
      url: $(this).attr('action'),
      dataType: 'json',
      success: function(data){
        var resultado = data;
        if (resultado.respuesta == 'exito') {
          var id_user = resultado.usuario_id;
          swal({
            title: "Correcto!",
            text: "El administrador se elimino correctamente!",
            icon: "success",
          });
          fila_usuario[0].parentNode.remove();
        }else{
          swal({
            title: "Error!",
            text: "El administrador no se elimino!",
            icon: "error",
          });
        }
      }
    })
  });



});
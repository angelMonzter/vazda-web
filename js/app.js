$(document).foundation()

// Slideshow 1
$(function () {

    $("#slider1").responsiveSlides({
     maxwidth: 800,
     speed: 800
    });
});
// Slideshow 1

//Cargar el API de visualización y el paquete GeoChart.
     google.load('visualization', '1', {'packages': ['geochart']});
     //una devolución de llamada que se ejecutará cuando se carga el API de visualización de Google.
     google.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
    // se crea un arreglo, donde se indica que la primera linea como se va a particionar 
    //el mapa, nombre del estado y tamaño de la población.
        var data = google.visualization.arrayToDataTable([
          ['States','Estado','Trabajos Realizados'],   
          ['MX-MEX','Estado de Mexico',12],
          ['MX-DIF','Distrito Federal',15],
          ['MX-VER','Veracruz',2],
          ['MX-JAL','Jalisco',0],
          ['MX-PUE','Puebla',1],
          ['MX-GUA','Guanajuato',0],
          ['MX-CHP','Chiapas',1],
          ['MX-NLE','Nuevo Leon',11],
          ['MX-MIC','Michoacan de Ocampo',0],
          ['MX-OAX','Oaxaca',3],
          ['MX-CHH','Chihuahua',1],
          ['MX-GRO','Guerrero',2],
          ['MX-TAM','Tamaulipas',8],
          ['MX-BCN','Baja California',2],
          ['MX-SIN','Sinaloa',1],
          ['MX-COA','Cohahulia de Zaragoza',1],
          ['MX-SON','Sonora',3],
          ['MX-HID','Hidalgo',2],
          ['MX-SLP','San Luis Potosi',9],
          ['MX-TAB','Tabasco',0],
          ['MX-YUC','Yucatan',1],
          ['MX-QUE','Queretaro', 9],
          ['MX-MOR','Morelos',2],
          ['MX-DUR','Durango',10],
          ['MX-ZAC','Zacatecas',0],
          ['MX-ROO','Quintana Roo',1],
          ['MX-AGU','Aguascalientes',4],
          ['MX-TLA','Tlaxcala',2],
          ['MX-NAY','Nayarit',1],
          ['MX-CAM','Campeche',3],
          ['MX-BCS','Baja California Sur',1],
          ['MX-COL','Colima',0]
        ]);

    var options = 
    {
        legend: 'none', // se quita el slider indicador de poblacion minima y maxima
        //tooltip: {trigger:'none'}, 
        region: 'MX',   // region a dibujar en el mapa
        resolution: 'provinces',    //
        //displayMode: 'markers',
        // color minimo: 'LightYellow' y color maximo: 'Salmon', igual se pueden utilizar los valor rgb.
        colorAxis: {colors: ['LightYellow', 'Salmon'] }
    };
    //se instacia y se dibuja el grafico
    var chart = new google.visualization.GeoChart(document.getElementById('chart_div'));
    chart.draw(data, options);
};

$(".mygallery").justifiedGallery();

function openTab(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

function getUrl(){
  var url = document.getElementById('file').files[0].name;
  var nameUrl = document.getElementsByClassName('file');
  
  nameUrl[0].innerText = url;
}

//$("#arrow-down4").css("display","none");

function materiales() {
  var material = document.getElementById("material").selectedIndex;
  var divMateriales = document.getElementById('div-materiales');
  var especificaMaterial = document.getElementById('especifica-material');

  if (material === 11) {
    divMateriales.style.display = "none";
    especificaMaterial.style.display = "block";
    especificaMaterial.firstElementChild.firstElementChild.style.borderBottom = "2px solid #e83541";
  }
}

$('.numero').on('input', function () { 
    this.value = this.value.replace(/[^0-9]/g,'');
});

$('.letras').on('input', function () { 
    this.value = this.value.replace(/[^QWERTYUIOPASDFGHJKLÑZXCVBNMqwertyuiopasdfghjklñzxcvbnm ]/g,'');
});

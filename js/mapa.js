
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;
var cont=0;
var array = new Array();
var waypts = [];
 var tramo="Loja";


function initialize() {

  directionsDisplay = new google.maps.DirectionsRenderer();
  var chicago = new google.maps.LatLng(-3.99313, -79.20422);
  var mapOptions = {
    zoom: 10,
    center: chicago


  }
  map = new google.maps.Map(document.getElementById("mostrarMapa"), mapOptions);
  directionsDisplay.setMap(map);


}

function anadirArreglo(nombre){
  var guion=" - "
  var direc= nombre+", Loja";
 
   waypts.push({
          location:direc,
          stopover:true});

 tramo= tramo+guion+nombre;

 

}

function borrarRuta()
{
  waypts = [];
 initialize();
 document.getElementById("ruta").value=" ";
 
}


function calcRoute() {
 
  var start ="Loja, Ec";
  var end="Loja, Ec";

  var tramoini="";

  var total=0;
       

  var request = {
      origin: start,
      destination: end,
      waypoints: waypts,

      optimizeWaypoints: false,

      travelMode: google.maps.TravelMode.DRIVING
  };
  
    directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
      var route = response.routes[0];
      var summaryPanel = document.getElementById("directions_panel");
      summaryPanel.innerHTML = '';
      // For each route, display summary information.
  
      for (var i = 0; i < route.legs.length; i++) {

        var routeSegment = i + 1;
        summaryPanel.innerHTML += '<b>Recorrido: ' + routeSegment + '  ';
        summaryPanel.innerHTML += route.legs[i].start_address + ' a ';
        summaryPanel.innerHTML += route.legs[i].end_address + '  ';

      
        total=total+(route.legs[i].distance.value/1000);
        tramoini+=route.legs[i].start_address + ' - '+route.legs[i].end_address + ' - '
      }

      document.getElementById("total").value=Math.ceil(total);
     

    }
  });
  


}

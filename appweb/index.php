
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Taranis Project v.0.1</title>
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>     
    
<link rel="stylesheet" href="css/estilo_global.css" type="text/css" media="screen">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
    
   
    
<style type="text/css">
     #map { 
    width: 100%;
    height: 600px;
    
	}
      .leaflet-container.crosshair-cursor-enabled {
    cursor:crosshair;}
</style>


</head>

<body>

  <table class="default">
      <tr>
          <td>
          <img src="images/taranis-project.png" width="64" height="64">
          </td>
          
          <td>
            <left>
              <ul class="nav nav-pills">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="/vdata.php">View data</a></li>
              <li><a href="/udata.php">Upload data</a></li>
              <li><a href="/about.php">About...</a></li>
            </ul> 
            </left>
              
          </td>
          <td></td>
      </tr>
      <tr>
          <td></td>
          <td>
          
          <div class="global-content">
        <div id="map"></div>
          </div>
          </td>
      <td></td>
      </tr>
     </table>  
	
		 <script>
				  var map = new L.map('map').setView([23.00, -101.00],5);
				  L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {maxZoom: 18}).addTo(map);
				  L.tileLayer('https://tiles.openseamap.org/seamark/{z}/{x}/{y}.png', {maxZoom: 18}).addTo(map);
				  L.control.scale().addTo(map);
				  L.DomUtil.addClass(map._container,'crosshair-cursor-enabled');	
					
				  var markers = new Array();
				
					
						map.on('click', function(e) {
						var LamMarker = new L.marker([e.latlng.lat, e.latlng.lng], { draggable: true }).addTo(map).bindPopup('Lat: '+e.latlng.lat+ ', Lng: '+ e.latlng.lng);
						//document.getElementById("i_latitud").value = e.latlng.lat;
						//document.getElementById("i_longitud").value = e.latlng.lng;
						positions.push([e.latlng.lat, e.latlng.lng]);
						markers.push(LamMarker);

						
						marker.on('dragend', function (e) {
						//document.getElementById('i_latitud').value = marker.getLatLng().lat;
						//document.getElementById('i_longitud').value = marker.getLatLng().lng;
						
						
							});
							
						});
					function drawPolygon()
					{
						
							
							if (positions.length>=3)
							{
								
								polygon = new L.polygon(positions, {color: 'red'});	
								polygon.addTo(map);
								
							
							}
							else
							{
								alert("Imposible crear el polígono, se requiere al menos 3 puntos");
							}			
					}
					
					function clearPolygon()
					{
						
							for(i=0;i<markers.length;i++) {
								map.removeLayer(markers[i]);
							}  
						
						
						map.removeLayer(polygon);
						positions.length = 0;
					}
					
					drawPolygon();
				</script>		
    
    <footer>
	<p class="copyright">Taranis Project 2022 - v.0.1</p>
	</footer>
    
  </body>
</html>
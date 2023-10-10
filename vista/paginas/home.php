<!DOCTYPE html>
<html lang="en">
<head>
	<base target="_top">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Quick Start - Leaflet</title>
	
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>	
	<script src="vista/assets/js/leyenda.js"></script>
	<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
	<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
	<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
	<script src="https://nominatim.openstreetmap.org/ui/reverse.js"></script>
	<script src="https://unpkg.com/leaflet-heat@0.2.0/dist/leaflet-heat.js"></script>
	<script src="https://leaflet.github.io/Leaflet.heat/dist/leaflet-heat.js"></script>




	<style>
        /* Esta es la regla CSS que cambiará el tipo de letra de tu leyenda */
        .legend {
            font-family: arial;
			font-weight: bold ;
			font-size: 15px;
			margin: 10px; /* Añade un margen de 10px alrededor de la leyenda */
            box-shadow: 5px 5px 9px rgba(0, 0, 0, 0.1); /* Añade una sombra con desplazamiento horizontal de 2px, desplazamiento vertical de 2px, difuminado de 5px y color RGBA (negro con 0.1 de opacidad) */
            padding: 20px; 
			width: 255px;
			

			/* Reemplaza "TuTipoDeLetra" con el nombre del tipo de letra que deseas usar */
        }
    </style>
	

</head>
<body>
<div id="map" style="width: 100%; height: 800px;"></div>
<script src="vista/assets/js/mapa.js"></script>



</body>
</html>


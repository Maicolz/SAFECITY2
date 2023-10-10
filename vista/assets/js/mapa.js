var map = L.map('map');
console.log("Mapa inicializado");

var searchedMarker; // Variable para almacenar el marcador de la búsqueda

// Función para obtener la dirección a partir de latitud y longitud
function obtenerDireccion(latitud, longitud, marcador) {
    fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitud}&lon=${longitud}&zoom=18&addressdetails=1&countrycodes=PE&accept-language=es-PE`)
        .then(response => response.json())
        .then(data => {
            var direccion = data.display_name;
            // Agrega un Popup con la dirección al marcador
            marcador.bindPopup(`<b>Dirección:</b> ${direccion}`).openPopup();
        })
        .catch(error => console.error('Error obteniendo dirección:', error));
}

// Obtiene la ubicación actual del usuario
navigator.geolocation.getCurrentPosition(function(position) {
    var latitud = position.coords.latitude;
    var longitud = position.coords.longitude;

    // Establece la vista del mapa en la ubicación actual del usuario
    map.setView([latitud, longitud], 16);

    var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 23,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // Crea un marcador personalizado para la ubicación actual del usuario
    var marker = L.marker([latitud, longitud]).addTo(map);

    // Agrega un Popup al marcador de ubicación actual
    marker.bindPopup("<b>Tu ubicación actual</b>").openPopup();

    fetch('vista/recursos/bdmapa.php')
        .then(response => response.json())
        .then(data => {
            // Recorre los datos y crea marcadores en el mapa
            data.forEach(marcador => {
                var icono;
                switch (marcador.IdTipoReporte) {
                    case '1': // Asalto
                        icono = L.icon({ iconUrl: 'vista/assets/img/icono_asalto.png', iconSize: [32, 32] });
                        break;
                    case '2': // Venta de Drogas
                        icono = L.icon({ iconUrl: 'vista/assets/img/icono_venta_drogas.png', iconSize: [32, 32] });
                        break;
                    case '3': // Robo
                        icono = L.icon({ iconUrl: 'vista/assets/img/icono_robo_vehiculos.png', iconSize: [32, 32] });
                        break;
                    case '4': // Vandalismo
                        icono = L.icon({ iconUrl: 'vista/assets/img/icono_vandalismo.png', iconSize: [32, 32] });
                        break;
                    default:
                        // Icono predeterminado si IdTipoReporte no coincide
                        icono = L.icon({ iconUrl: 'vista/assets/img/default.png', iconSize: [32, 32] });
                        break;
                }

                // Crea un marcador con el icono correspondiente
                var reporteMarker = L.marker([marcador.latitud, marcador.logintud], { icon: icono });

                // Agrega un evento de clic al marcador
                reporteMarker.on('click', function() {
                    // Obtén la dirección y agrega un Popup al marcador de tipo de reporte
                    obtenerDireccion(marcador.latitud, marcador.logintud, reporteMarker);
                });

                reporteMarker.addTo(map);
            });
        })
        .catch(error => console.error('Error:', error));
});

// Agrega el control de búsqueda
L.Control.geocoder({
    geocoder: new L.Control.Geocoder.Nominatim({
        geocodingQueryParams: { countrycodes: 'PE', acceptLanguage: 'es-PE', viewbox: '-77.2609,-12.3933,-76.6048,-11.7350' }
    }),
    defaultMarkGeocode: false
}).on('markgeocode', function(e) {
    // Si hay un marcador de búsqueda previo, lo remueve
    if (searchedMarker) {
        map.removeLayer(searchedMarker);
    }
    
    // Añade un marcador en la ubicación buscada
    searchedMarker = L.marker(e.geocode.center).addTo(map);
    searchedMarker.bindPopup(`<b>Dirección:</b> ${e.geocode.name}`).openPopup();

    map.setView(e.geocode.center, 16);
}).addTo(map);

// Llama a la función cuando el documento esté completamente cargado
document.addEventListener('DOMContentLoaded', initMap);

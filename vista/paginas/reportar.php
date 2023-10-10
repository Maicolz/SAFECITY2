


<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reporte de Ubicación</title>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Dm4_qEwaCp4Y1dyXMBygTu-97pw_Vlo&libraries=places"></script>
        <style>
            #map {
                height: 500px;
                width: 100%;
            }

            #pac-input {
                width: 300px;
                margin: 10px 0;
            }
        </style>
    </head>
    <body>
    <div id="map"></div>

    <input id="pac-input" type="text" placeholder="Buscar Ubicación">
    
    <button onclick="buscarUbicacion()">Buscar</button>
    <!-- <button onclick="guardarUbicacion()" type="submit" class="btn btn-primary float-end"  data-bs-toggle="modal" data-bs-target="#verticalycentered">Continuar</button> -->

    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#verticalycentered">
      Continuar
    </button>
    <div class="modal fade" id="verticalycentered" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form>
              
              
              
              <fieldset class="row mb-3">
                <legend class="col-form-label  pt-0 fw-bold">Eliga el tipo de reporte</legend>
                <div class="col-sm-12">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="1" checked>
                    <label class="form-check-label fw-bold text-primary" for="gridRadios1">
                      Asalto 
                    </label> 
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="2">
                    <label class="form-check-label  fw-bold text-success" for="gridRadios2">
                      Venta de drogas
                    </label>
                  </div>
                  <div class="form-check ">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="4" >
                    <label class="form-check-label fw-bold text-dark" for="gridRadios3">
                      Vandalismo
                    </label>
                  </div>
                  <div class="form-check ">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios4" value="3" >
                    <label class="form-check-label fw-bold text-warning" for="gridRadios4">
                      Robo de vehiculos
                    </label>
                  </div>
                </div>
              </fieldset>
              
              <!-- <div class="text-center">
                <button type="submit" class="btn btn-primary">Reportar</button>
                <button type="reset" class="btn btn-secondary">Cancelar</button>
              </div> -->
            </form>
          
            




          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button onclick="guardarUbicacion()"  type="submit" class="btn btn-primary">Reportar</button>
          </div>
        </div>
      </div>
    </div><!-- End Vertically centered Modal-->





    <!-- ############fafa444444444444444444444###################################################### -->
    

    

    
    


    <!-- <button onclick="guardarUbicacion()">Guardar Ubicación</button> -->

    <script>
        var mapa;
        var marcador;
        var searchBox;

        function initMap() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    mapa = new google.maps.Map(document.getElementById('map'), {
                        center: pos,
                        zoom: 15,
                        zoomControl: true // Habilita el control de zoom
                    });

                    marcador = new google.maps.Marker({
                        map: mapa,
                        position: pos,
                        draggable: true
                    });

                    var input = document.getElementById('pac-input');
                    searchBox = new google.maps.places.SearchBox(input);

                    searchBox.addListener('places_changed', function() {
                        var places = searchBox.getPlaces();

                        if (places.length == 0) {
                            return;
                        }

                        var bounds = new google.maps.LatLngBounds();
                        places.forEach(function(place) {
                            if (!place.geometry) {
                                console.log("El lugar devuelto no tiene coordenadas: ", place);
                                return;
                            }

                            marcador.setPosition(place.geometry.location);
                            mapa.setCenter(place.geometry.location);

                            bounds.extend(place.geometry.location);
                        });
                        mapa.fitBounds(bounds);
                    });

                    mapa.addListener('click', function(event) {
                        marcador.setPosition(event.latLng);
                    });
                }, function() {
                    handleLocationError(true, marcador, mapa.getCenter());
                });
            } else {
                handleLocationError(false, marcador, mapa.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, marker, pos) {
            alert(browserHasGeolocation ?
                            'Error: El servicio de geolocalización falló.' :
                            'Error: Tu navegador no soporta geolocalización.');
            
            mapa = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -12.0464, lng: -77.0428},
                zoom: 15,
                zoomControl: true // Habilita el control de zoom
            });

            marcador = new google.maps.Marker({
                map: mapa,
                position: {lat: -12.0464, lng: -77.0428},
                draggable: true
            });

            var input = document.getElementById('pac-input');
            searchBox = new google.maps.places.SearchBox(input);

            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("El lugar devuelto no tiene coordenadas: ", place);
                        return;
                    }

                    marcador.setPosition(place.geometry.location);
                    mapa.setCenter(place.geometry.location);

                    bounds.extend(place.geometry.location);
                });
                mapa.fitBounds(bounds);
            });

            mapa.addListener('click', function(event) {
                marcador.setPosition(event.latLng);
            });
        }

        function buscarUbicacion() {
            var input = document.getElementById('pac-input');
            var direccion = input.value;

            var geocoder = new google.maps.Geocoder();

            geocoder.geocode({'address': direccion}, function(results, status) {
                if (status == 'OK') {
                    var pos = results[0].geometry.location;

                    marcador.setPosition(pos);
                    mapa.setCenter(pos);
                } else {
                    alert('La dirección no pudo ser encontrada por la siguiente razón: ' + status);
                }
            });
        }
        function guardarUbicacion() {
    var ubicacionSeleccionada = marcador.getPosition();

    if (ubicacionSeleccionada) {
        var latitud = ubicacionSeleccionada.lat();
        var logintud = ubicacionSeleccionada.lng();
        var IDreporte = document.querySelector('input[name="gridRadios"]:checked').value;
        
        // Obtener la fecha actual y formatearla como 10-08-23
        var fecha = new Date().toLocaleDateString('es-ES', {
            year: '2-digit',
            month: '2-digit',
            day: '2-digit'
        }).replace(/\//g, '-');

       

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "controlador/guardarReporte.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                alert(xhr.responseText);
            }
        }
        
        // Incluir latitud, longitud, IDreporte y fecha en la solicitud
        xhr.send("latitud=" + latitud + "& logintud=" + logintud + "&IDreporte=" + IDreporte + "&fecha=" + fecha);
    } else {
        alert("Por favor, selecciona una ubicación en el mapa.");
    }
}


    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Dm4_qEwaCp4Y1dyXMBygTu-97pw_Vlo&callback=initMap">
    </script>

    </body>
    </html>



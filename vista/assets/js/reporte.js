var posElt;
        var posLinkElt;
        var lat; // Variable para almacenar la latitud
        var long; // Variable para almacenar la longitud

        window.addEventListener('load', function(){
            posElt = document.getElementById('Pos');
            posLinkElt = document.querySelector('#PosLink > a');

            // Obtenemos la ubicación cuando se carga la página
            navigator.geolocation.getCurrentPosition(geoposOK, geoposKO);
        });

        function geoposOK(pos) {
            lat = pos.coords.latitude;
            long = pos.coords.longitude;

            posElt.textContent = `${lat}, ${long}`;
            document.getElementById('latitud').textContent = 'Latitud: ' + lat;
            posLinkElt.href = `https://maps.google.com/?q=${lat},${long}`;
            posLinkElt.textContent = 'Mostrar tu posición en un mapa';
        }

        function geoposKO(err) {
            console.warn(err.message);
            let msg;
            switch(err.code) {
                case err.PERMISSION_DENIED:
                    msg = "No nos has dado permiso para obtener tu posición";
                    break;
                case err.POSITION_UNAVAILABLE:
                    msg = "Tu posición actual no está disponible";
                    break;
                case err.TIMEOUT:
                    msg = "No se ha podido obtener tu posición en un tiempo prudencial";
                    break;
                default:
                    msg = "Error desconocido";
                    break;
            }
            posElt.textContent = msg;
        }

        function guardarUbicacion() {
            // Verificamos si tenemos valores de latitud y longitud
            if (lat !== undefined && long !== undefined) {
                // Obtenemos la fecha del campo de entrada
                var fecha = document.getElementById('fecha').value;
                var idTipoReporte = document.querySelector('input[name="idTipoReporte"]:checked').value; // Obtener el valor seleccionado
                // Enviamos los datos al servidor PHP
                $.ajax({
                    url: 'guardar_ubicacion.php', // URL de tu script PHP
                    method: 'POST',
                    data: { latitud: lat, longitud: long, fecha: fecha,  idTipoReporte: idTipoReporte }, // Datos a enviar
                    success: function(response) {
                        // Manejamos la respuesta del servidor (puedes mostrar un mensaje al usuario)
                        alert(response);
                    },
                    error: function() {
                        // Manejamos errores si la solicitud falla
                        alert('Error al enviar la ubicación al servidor.');
                    }
                });
            } else {
                alert('No se ha obtenido la ubicación. Asegúrate de habilitar la geolocalización.');
            }
        }
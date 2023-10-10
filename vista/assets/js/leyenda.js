	// Crear un objeto que contenga los tipos de incidentes y sus correspondientes colores e iconos
    var incidentTypes = {
        "Asalto": { color: "#FF5733", icon: "vista/assets/img/icono_asalto.png" },
        "Venta de Drogas": { color: "#33FF57", icon: "vista/assets/img/icono_venta_drogas.png" },
        "Robo": { color: "#3366FF", icon: "vista/assets/img/icono_robo_vehiculos.png" },
        "Vandalismo": { color: "#FF33FF", icon: "vista/assets/img/icono_vandalismo.png" }
    };
    
    // Crear un control de leyenda personalizado
    var legend = L.control({ position: "topright" });
    
    legend.onAdd = function (map) {
        var div = L.DomUtil.create("div", "legend");
        var labels = [];
    
        for (var incident in incidentTypes) {
            var type = incidentTypes[incident];
            var iconUrl = type.icon;
            var color = type.color;
            
            labels.push(
                '<img src="' + iconUrl + '" style="height: 25px; width: 25px;"> ' + incident
            );
        }
    
        div.innerHTML = labels.join("<br>");
        return div;
    };
    
    legend.addTo(map);
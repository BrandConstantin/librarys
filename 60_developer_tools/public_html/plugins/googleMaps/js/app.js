// Nuestro código irá aquí
var arregloPines = [];

//función para agregar pines
function agregarMarcador(location){
        var pin = new google.maps.Marker({
        position: location,
        map: map,
        animation: google.maps.Animation.DROP
    });
    
    console.log("Latitud: ", location.lat());
    console.log("Longitud: ", location.lng());
    
    //para guardar el ultimo pin
    for(var i in arregloPines){
        arregloPines[i].setMap(null);
    }
    
    arregloPines.push(pin);
}

function cargar_mapa(){
    var myOptions = {
        zoom: 12,
        center: new google.maps.LatLng(36.7109859,-4.4591884),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    
    map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
    
    //agregar listener click
    map.addListener('click', function(event){
       agregarMarcador(event.latLng);
    });
    
    var pin = new google.maps.Marker({
        position: new google.maps.LatLng(36.7109859,-4.4591884),
        map: map,
        title: "Hola Mundo"
    });
    
    arregloPines.push(pin);
}
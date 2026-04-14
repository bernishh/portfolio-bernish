window.onload = function(){

var map = L.map('map').setView([51.5073359, -0.12765], 16);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy ; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var icone = L.icon({
    iconUrl: "../images/icones/parking.png",
    iconeSize: [10, 10],
})

var marker = L.marker([48.852969, 2.349903],{icon: icone}).addTo(map);
marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();


    function onMapClick(e) {
        alert("You clicked the map at " + e.latlng);
    }
    
    map.on('click', onMapClick);

    var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(map);
}
//add route
map.on('click', onMapClick);

L.Routing.control({
    geocoder: L.Control.Geocoder.nominatim()
}).addTo(map)
//end
}

xmlhttp.onreadystatechange = () => {
    // La transaction est terminée ?
    if(xmlhttp.readyState == 4){
        // Si la transaction est un succès
        if(xmlhttp.status == 200){
            // On traite les données reçues
            let donnees = JSON.parse(xmlhttp.responseText)
            
            // On boucle sur les données (ES8)
            Object.entries(donnees.coordonnees).forEach(coordonnee => {
                // Ici j'ai une seule agence
                // On crée un marqueur pour l'agence
                let marker = L.marker([coordonnee[1].lat, coordonnee[1].lon]).addTo(map)
                marker.bindPopup(coordonnee[1].nom)
            })
        }else{
            console.log(xmlhttp.statusText);
        }
    }
}

xmlhttp.open("GET", "http://agence.test/liste_simple.php");

xmlhttp.send(null);




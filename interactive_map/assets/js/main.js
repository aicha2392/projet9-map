// Add header and footer content // ------------------------------------------
fetch("./parts/header.html")
  .then((response) => {
    return response.text();
  })
  .then((data) => {
    document.querySelector("header").innerHTML = data;
  });

fetch("./parts/footer.html")
  .then((response) => {
    return response.text();
  })
  .then((data) => {
    document.querySelector("footer").innerHTML = data;
  });

// Leaflet.js // -------------------------------------------------------------

let map = L.map("map").setView([48.852737, 2.350699], 14);
let customMarker = L.marker([48.852737, 2.350699]).addTo(map);
let clicMarker;
// customMarker.bindPopup("<b>Ici c'est Paris</b><br> <button>Ajouter un lieux</button>")

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
  attribution: "© OpenStreetMap",
}).addTo(map);

var circle = L.circle([48.852737, 2.350699], {
  color: "red",
  fillColor: "#f03",
  fillOpacity: 0.5,
  radius: 200,
}).addTo(map);

var polygon = L.polygon([
  [51.509, -0.08],
  [51.503, -0.06],
  [51.51, -0.047],
]).addTo(map);

customMarker.bindPopup("<b>Vous êtes ici !</b><br>").openPopup();
circle.bindPopup("I am a circle.");
polygon.bindPopup("I am a polygon.");

let popup = L.popup();

function onMapClick(e) {
  //on verifie s'il existe deja un marqueur
  if (clicMarker) {
    //si oui on le retire
    map.removeLayer(clicMarker);
  }

  //on place le marker au clic
  clicMarker = new L.marker(e.latlng, { draggable: true }).addTo(map).bindPopup(
    //FORMLAIRE AVEC BOUTON ENVOYER POUR UN EVENTUEL AJOUT DE DONNER PAR LE USER QUI SOUHAITE AJOUTER UN LIEUX QU'IL SOUHAITE PARTAGER
    "<form id='myform'>" +
    "<input type='text' id='name' name='name' placeholder='Nom établissement'>" +
    "<br><input type='text' id='adress' name='adress' placeholder='adresse'>" +
    // "<br><input type='text' id='category_id1' name='category_id1' placeholder='category'>" +
    // "<br><input id='city_id' name='city_id' placeholder='city'>" +
    // "<br><input id='longitude' name='longitude' placeholder='longitude' type='hidden' value='"+e.latlng.lat.toFixed(2)+"'>" +
    // "<br><input id='latitude' name='latitude' placeholder='latitude' type='hidden' value='"+e.latlng.lng.toFixed(2)+"'>" +
    "<button type='submit'>Envoyer</button>" +
    "</form>"
    )
 }

//on le surveille au clic
map.on("click", onMapClick);


  //   // traitement formulaire

    document.addEventListener('submit', function (event){
      event.preventDefault();
      console.log("c'est passé ?", event.target);
      let form = document.getElementById('myform');
      console.log(form);
      //on recupere tout le form a partir de l'evenenement, et on hydrate le Formdata avec
      let data= new FormData(event.target);
      console.log(data)
      let value = Object.fromEntries(data.entries());
      console.log({value})
      let namePlace = document.getElementById('name').value;
      let type = document.getElementById('adress').value;
      // let category_id1 = document.getElementById('category_id1').value;
      // let city_id = document.getElementById('city_id').value;
      // let lng = document.getElementById('longitude').value;
      // let lat = document.getElementById('latitude').value;

      console.log(JSON.stringify(value));

      fetch('../serveur/insertData.php', {
          method: 'POST',
          body: JSON.stringify(value),
          headers: {
              "Content-Type": "application/json; charset=UTF-8"
          }
      })
      .then((response)=> console.log(response.json()))
      .then((data)=> console.log(data))
  });

//liste des marqueurs
      fetch('../serveur/list.php') // on fait un fetch pour faire appel à lapi 
    .then((response) => { // et recupere la reponse json
      return response.json(); 
    })
     .then((data) => {
      data.map(place => //on fait une boucle qui recupere un element d'un objet pour créer des markers
      L.marker([place.lat, place.lng]).bindPopup(`${place.name}<br>${place.adress}<br>`).addTo(map))
  
    });

// list // -------------------------------------------------------------------
class Card {
  constructor(title, text, img) {
    this.title = title;
    this.text = text;
    this.img = img;
  }
}

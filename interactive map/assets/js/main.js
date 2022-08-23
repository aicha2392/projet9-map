

// Add header and footer content // ------------------------------------------
fetch("./parts/header.html")
  .then(response => {
    return response.text()
  })
  .then(data => {
    document.querySelector("header").innerHTML = data;
  });

fetch("./parts/footer.html")
  .then(response => {
    return response.text()
  })
  .then(data => {
    document.querySelector("footer").innerHTML = data;
  });


// Leaflet.js // -------------------------------------------------------------
let map = L.map('map').setView([48.852737, 2.350699], 14)

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}).addTo(map);

L.marker([48.852737, 2.350699]).addTo(map)
    .bindPopup('Vous êtes ici !')
    .openPopup();

// list // -------------------------------------------------------------------
class Card {
  constructor(title, text, img) {
    this.title = title;
    this.text = text;
    this.img = img;
  }
}

/*====MAP====*/
var map = L.map('map').setView([-3.8878235,-38.6808622], 14.3);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {foo: 'bar', attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(map);

var marker = L.marker([-3.872452, -38.670670]).addTo(map)
    marker.bindPopup("<b>Top-1</b><br>Área Verde").openPopup();
;

var marker = L.marker([-3.880709, -38.677712]).addTo(map)
    marker.bindPopup("<b>Top-1</b><br>Outra Banda").openPopup();
;

var marker = L.marker([-3.867488, -38.653801]).addTo(map)
    marker.bindPopup("<b>Top-1</b><br>Pau Serrado").openPopup();
;

<!DOCTYPE html>
<html>
<head>
  <title>API OPENSTREETMAPS</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>
</head>
<body>

  <h1>API OPENSTREETMAPS - ABASTECIMENTO</h1>
   <div id="mapid" style="width: 940px; height: 780px"></div>

   <script>
     
      window.onload = function(){

        console.log('Paginação');
      
        var abastecimento = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}';
        var abastecimentosCooord = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';

        var abastecimentoToken = 'pk.eyJ1IjoiYnJoZW4xMCIsImEiOiJjanh4dXQ0NTMwM21oM2JvZTlkcTh2a3ZzIn0.pV0YUKqDOn9dF5bvivCj_Q';

        var tileStreets = L.tileLayer(abastecimento, {
    attribution: abastecimentosCooord,
    maxZoom: 18,
    id: 'mapbox.streets', // visão via satelite streets visão rua
    accessToken: abastecimentoToken
});

        var tileStreets = L.tileLayer(abastecimento, {
    attribution: abastecimentosCooord,
    maxZoom: 18,
    id: 'mapbox.satellite', // visão via satelite streets visão rua
    accessToken: abastecimentoToken
});

          var mymap = L.map('mapid').setView([-6.252939, -36.534274], 13);
          
        tileStreets.addTo(mymap)

        var marker = L.marker([-6.252939, -36.534274]).addTo(mymap);
        marker.bindPopup("<b>IFRN</b><br>Coordenadas.").openPopup();

      var popup = L.popup();

      function onMapClick(e) {
         popup
        .setLatLng(e.latlng)
        .setContent("Você Clicou nessa Coordenadas " + e.latlng.toString())
        .openOn(mymap);
}

mymap.on('click', onMapClick);
      }

   </script>>

</body>
</html>


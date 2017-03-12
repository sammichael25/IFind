<?php
echo "<h1>".$_GET['roomID']."</h1>"; 
?>

<!DOCTYPE html>
<html>
  <head>
    <style>
      #map {
        height: 400px;
        width: 100%;
       }
    </style>
  </head>
  <body>
    <h3>My Google Maps Demo</h3> <!-- sample code -->
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: 10.640991, lng:  -61.400279}; //These coordinates need to be retrieved from database
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 20,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8WAwi-WLnOJEaR3Ocqmowep1fEuy1TnE&callback=initMap"> //API key here is exposed
    </script>
  </body>
</html>
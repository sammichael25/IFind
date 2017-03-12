<?php
if(!isset($_SESSION)){session_start();}
include "../lib.php";
$roomID = $_GET['roomID']; //retrieving roomid from timetable and storing it in variable roomID
$GPS=retrieveGPS($roomID);
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
        var uluru = {lat:<?php echo $GPS['gpsLat'] ?>, lng:<?php echo $GPS['gpsLng'] ?>}; //These coordinates need to be retrieved from retrieveGPS.php
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
<?php
 
  include 'connect.php';
 
  $apikey = "AIzaSyAuJLu8zsf5f2z3HjHUGTMhB0YjA8eWsuw";
  $id = $_GET['id'];
 
  $lat = 0;
  $long = 0;
  $zoom = 8;
 
  $findmap = "SELECT centerLat, centerLong, zoom FROM maps WHERE ID = $id";
 
  if(!$result = $con->query($findmap)){
     die('There was an error running the query [' . $con->error . ']');
  } else {
    $row = $result->fetch_assoc();
    $lat = $row['centerLat'];
    $long = $row['centerLong'];
    $zoom = $row['zoom'];
  }   
 
?><!DOCTYPE html>
<html>
  <head>
    <meta name="viewport"
        content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map-canvas { height: 100% }
    </style>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=
          <?php echo $apikey; ?>&sensor=false">
    </script>
    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(<?php echo $lat.', '.$long; ?>),
          zoom: <?php echo $zoom; ?>
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
    <div id="map-canvas"/>
  </body>
</html>
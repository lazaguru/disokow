<?php
  $getpoints = "SELECT pointLat, pointLong, pointText 
      FROM mappoints WHERE mapID = $id";
 
  if(!$result = $con->query($getpoints)){
    die('There was an error running the query 
        [' . $con->error . ']');
  } else {
    while ($row = $result->fetch_assoc()) {
      echo '  var myLatlng1 = new google.maps.LatLng('.
          $row[pointLat].', '.$row[pointLong].'); 
  var marker1 = new google.maps.Marker({ 
    position: myLatlng1, 
    map: map, 
    title:"'.$row[pointText].'"
  });';
    }
  }
?>
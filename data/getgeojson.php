<?php
  $pid = $_POST['pid'];
  $geojson = file_get_contents("boundary/boundary.geojson");
  $data = json_decode($geojson);
  print_r($data);
?>

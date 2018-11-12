<?php
require '_conn.inc';
$id = $_GET['id'];
try {
  $sql = "SELECT rec_lat, rec_lon, lat, lon, name, city, county, county_old_name, village, village_old_name FROM envanter WHERE inv_id = '$id'";
  $row = $conn->query($sql)->fetch();
  $lat=($row['rec_lat'] > 1) ? $row['rec_lat'] : $row['lat'];
  $lon=($row['rec_lon'] > 1) ? $row['rec_lon'] : $row['lon'];
      $data = array(
        'city' => $row['city'],
        'name' => $row['name'],
        'county' => $row['county'],
        'village' => $row['village'],
        'county_old_name' => $row['county_old_name'],
        'village_old_name' => $row['village_old_name'],
        'lat' => $lat,
        'lon' => $lon,
       );
  $conn = null;
}
catch(PDOException $err) {
echo "ERROR: Unable to connect: " . $err->getMessage();
}
  header("Content-Type:application/json",true);
  echo json_encode($data, JSON_NUMERIC_CHECK, JSON_UNESCAPED_UNICODE);
   ?>
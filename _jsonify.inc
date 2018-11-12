<?php
require '_conn.inc';
try {

$geojson = array(
   'type'      => 'FeatureCollection',
   'features'  => array()
);

$sql = "SELECT rec_lat, rec_lon, lat, lon, inv_id, name, Visual_1, en_ethnicity, tr_ethnicity, en_building_type, tr_building_type FROM envanter $where";
    foreach ($conn->query($sql) as $row) {
      /* check whether real coordinates are set, then use or fallback to arbitrary */
      $lat=($row['rec_lat'] > 1) ? $row['rec_lat'] : $row['lat'];
      $lon=($row['rec_lon'] > 1) ? $row['rec_lon'] : $row['lon'];
      /* assign image or no image */
      $visual =  ($row['Visual_1'] != '') ? "./site_images/".$row['Visual_1'] : './img/no.png';
      /* fill in geojson array */
      $feature = array(
             'type' => 'Feature',
           'geometry' => array(
             'type' => 'Point',
             'coordinates' => array((float)$lon, (float)$lat)
                 ),
           'properties' => array(
                 'id' => $row['inv_id'],
                 'name' => $row['name'],
                 'ethnicity' => $row[$language . '_ethnicity'],
                 'visual' => $visual,
                 'type' => $row[$language . '_building_type'],
                 'icon' => 'img/icons/'.$row['en_ethnicity'].'_'.$row['en_building_type'].'.svg'
                 )
             );
         array_push($geojson['features'], $feature);
      }
    $conn = null;
}
catch(PDOException $err) {
echo "ERROR: Unable to connect: " . $err->getMessage();
}
  header("Content-Type:application/json",true);
  echo json_encode($geojson, JSON_NUMERIC_CHECK, JSON_UNESCAPED_UNICODE);
   ?>
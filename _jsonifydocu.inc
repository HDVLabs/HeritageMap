<?php
require '_conn.inc';
try {

$docudata = array(
   'type'      => 'FeatureCollection',
   'features'  => array()
);

$qry = "SELECT id, lat, lon, tr_title, en_title, story_type FROM docubase $where";
    foreach ($conn->query($qry) as $row) {
      $lat=$row['lat'];
      $lon=$row['lon'];
      /* fill in geojson array */
      $feature = array(
             'type' => 'Feature',
           'geometry' => array(
             'type' => 'Point',
             'coordinates' => array((float)$lon, (float)$lat)
                 ),
           'properties' => array(
                 'title' => $row[$language . '_title'],
                 'type' => $row['story_type'],
                 'id' => $row['id'],
                 'lang' => $language,
                 'icon' => 'img/docuicons/'.$row['story_type'].'.png'
                 )
             );
         array_push($docudata['features'], $feature);
      }
    $conn = null;
}
catch(PDOException $err) {
echo "ERROR: Unable to connect: " . $err->getMessage();
}
  header("Content-Type:application/json",true);
  echo json_encode($docudata, JSON_NUMERIC_CHECK, JSON_UNESCAPED_UNICODE);
?>

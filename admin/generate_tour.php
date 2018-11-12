<?php
  require '_header.inc';
  include '../lang.tr.inc';
  require '_conn.inc';
  if (isset($_GET['id'])) {
      $id = $_GET['id'];
  } else {
    echo "Geçerli bir ID girilmedi. Lütfen <a href='list_docu.php'>buradan seçin</a>";
    die;
  }
  $docudata = array(
     'type'      => 'FeatureCollection',
     'features'  => array()
  );
    $qry = "SELECT * FROM toursteps WHERE tour_id = '$id' AND visible = '1' ORDER BY step ASC";
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
                     'tr_title' => $row['tr_title'],
                     'en_title' => $row['en_title'],
                     'name' => $row['step']
                     )
                 );
             array_push($docudata['features'], $feature);
          }
        $conn = null;
        $fp = fopen('../tour_sites_'.$id.'.geojson', 'w');
        fwrite($fp, json_encode($docudata, JSON_NUMERIC_CHECK, JSON_UNESCAPED_UNICODE));
        fclose($fp);
?>
<h1><?php echo $_POST['tr_title']; ?> Tur haritası başarıyla kaydedildi.</h1>
</div><div>
Duraklar listesine dönmek için <a href="<?php echo 'update_tour.php?id='.$row['tour_id'];?>">buraya</a> tıklayın.
<?php
require '_footer.inc';
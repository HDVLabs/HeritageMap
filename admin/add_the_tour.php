<?php
  require '_header.inc';
  include '../lang.tr.inc';
  require '_conn.inc';
  if (isset($_POST['visible'])) {
    $visible = '1';
  } else {
    $visible = '0';
  }
  if (isset($_POST['featured'])) {
    $featured = '1';
  } else {
    $featured = '0';
  }
try {
  $new = $conn->prepare("INSERT INTO docubase (visible, featured, tr_title, en_title, city, county, village, county_old_name, village_old_name, story_type, tr_story, en_story, lat, lon, bearing, zoom, url)
  VALUES (:visible, :featured, :tr_title, :en_title, :city, :county, :village, :county_old_name, :village_old_name, :story_type, :tr_story, :en_story, :lat, :lon, :bearing, :zoom, :url)");
  $new->bindParam(':visible', $visible);
  $new->bindParam(':featured', $featured);
  $new->bindParam(':tr_title', $tr_title);
  $new->bindParam(':en_title', $en_title);
  $new->bindParam(':city', $city);
  $new->bindParam(':county', $county);
  $new->bindParam(':village', $village);
  $new->bindParam(':county_old_name', $county);
  $new->bindParam(':village_old_name', $village);
  $new->bindParam(':story_type', $story_type);
  $new->bindParam(':tr_story', $tr_story);
  $new->bindParam(':en_story', $en_story);
  $new->bindParam(':lat', $lat);
  $new->bindParam(':lon', $lon);
  $new->bindParam(':bearing', $bearing);
  $new->bindParam(':zoom', $zoom);
  $new->bindParam(':url', $url);

  $tr_title = $_POST['tr_title'];
  $en_title = $_POST['en_title'];
  $city = $_POST['city'];
  $county = $_POST['county'];
  $village = $_POST['village'];
  $county_old_name = $_POST['county_old_name'];
  $village_old_name = $_POST['village_old_name'];
  $story_type = $_POST['story_type'];
  $tr_story = $_POST['tr_story'];
  $en_story = $_POST['en_story'];
  $lat = $_POST['lat'];
  $lon = $_POST['lon'];
  $bearing = $_POST['bearing'];
  $zoom = $_POST['zoom'];
  $url = $_POST['url'];

  $new->execute();
  }
  catch(PDOException $e) {
    echo $e->getMessage();
  }
  $conn = null;
?>
<h1>Tur başarıyla kaydedildi</h1>
</div><div>

<?php require '_footer.inc'; ?>

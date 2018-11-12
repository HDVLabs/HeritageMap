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
  $new = $conn->prepare("INSERT INTO docubase (visible, featured, tr_title, en_title, city, county, county_old_name, village, village_old_name, story_type, lat, lon, url)
  VALUES (:visible, :featured, :tr_title, :en_title, :city, :county, :county_old_name, :village, :village_old_name, :story_type, :lat, :lon, :url)");
  $new->bindParam(':visible', $visible);
  $new->bindParam(':featured', $featured);
  $new->bindParam(':tr_title', $tr_title);
  $new->bindParam(':en_title', $en_title);
  $new->bindParam(':city', $city);
  $new->bindParam(':county', $county);
  $new->bindParam(':county_old_name', $county_old_name);
  $new->bindParam(':village', $village);
  $new->bindParam(':village_old_name', $village_old_name);
  $new->bindParam(':story_type', $story_type);
  $new->bindParam(':lat', $lat);
  $new->bindParam(':lon', $lon);
  $new->bindParam(':url', $url);

  $tr_title = $_POST['tr_title'];
  $en_title = $_POST['en_title'];
  $city = $_POST['city'];
  $county = $_POST['county'];
  $village = $_POST['village'];
  $county_old_name = $_POST['county_old_name'];
  $village_old_name = $_POST['village_old_name'];
  $story_type = $_POST['story_type'];
  $lat = $_POST['lat'];
  $lon = $_POST['lon'];
  $url = $_POST['url'];

  $new->execute();
  }
  catch(PDOException $e) {
    echo $e->getMessage();
  }
  $conn = null;
?>
<h1><?php echo $_POST['story_type']; ?> başarıyla kaydedildi</h1>
</div><div>
<?php require '_footer.inc'; ?>

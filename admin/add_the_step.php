<?php
  require '_header.inc';
  include '../lang.tr.inc';
  require '_conn.inc';
  if (isset($_POST['visible'])) {
    $visible = '1';
  } else {
    $visible = '0';
  }
try {
  $new = $conn->prepare("INSERT INTO toursteps (step, visible, tr_title, en_title, tr_story, en_story, lon, lat, tour_id)
  VALUES (:step, :visible, :tr_title, :en_title, :tr_story, :en_story, :lon, :lat, :tour_id)");

  $new->bindParam(':step', $step);
  $new->bindParam(':visible', $visible);
  $new->bindParam(':tr_title', $tr_title);
  $new->bindParam(':en_title', $en_title);
  $new->bindParam(':tr_story', $tr_story);
  $new->bindParam(':en_story', $en_story);
  $new->bindParam(':lon', $lon);
  $new->bindParam(':lat', $lat);
  $new->bindParam(':tour_id', $tour_id);

  $step = $_POST['step'];
  $tr_title = $_POST['tr_title'];
  $en_title = $_POST['en_title'];
  $tr_story = $_POST['tr_story'];
  $en_story = $_POST['en_story'];
  $lon = $_POST['lon'];
  $lat = $_POST['lat'];
  $tour_id = $_POST['tour_id'];

  $new->execute();
  }
  catch(PDOException $e) {
    echo $e->getMessage();
  }
  $conn = null;
?>
<h1>Durak başarıyla kaydedildi</h1>
</div><div>

<?php require '_footer.inc'; ?>

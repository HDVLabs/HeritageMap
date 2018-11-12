<?php
  require '_header.inc';
  include '../lang.tr.inc';
  require '_conn.inc';
  if (isset($_POST['visible'])) {
    $visible = '1';
  } else {
    $visible = '0';
  }
  if (isset($_POST['id'])) {
      $id = $_POST['id'];
  }
  try {
   $sql = "UPDATE `toursteps`
   SET `visible` = :visible,
   `step` = :step,
   `tr_title` = :tr_title,
   `en_title` = :en_title,
   `tr_story` = :tr_story,
   `en_story` = :en_story,
   `lat` = :lat,
   `lon` = :lon,
   `id` = :id
    WHERE `id` = :id";

    $new = $conn->prepare($sql);

  $new->bindValue(':id', $id);
  $new->bindValue(':visible', $visible);
  $new->bindValue(':step', $_POST['step']);
  $new->bindValue(':tr_title', $_POST['tr_title']);
  $new->bindValue(':en_title', $_POST['en_title']);
  $new->bindValue(':tr_story', $_POST['tr_story']);
  $new->bindValue(':en_story', $_POST['en_story']);
  $new->bindValue(':lat', $_POST['lat']);
  $new->bindValue(':lon', $_POST['lon']);
  $count = $new->execute();
   $conn = null;        // Disconnect
 }
 catch(PDOException $e) {
   echo $e->getMessage();
 }
?>
<h1><?php echo $_POST['tr_title']; ?> durağının bilgileri başarıyla güncellendi.</h1>
</div><div>
  Tur durağını düzenlemeye devam etmek için <a href="<?php echo 'update_step.php?id='.$_POST['id'];?>">buraya</a>, duraklar listesine dönmek için <a href="<?php echo 'update_tour.php?id='.$_POST['tour_id'];?>">buraya</a> tıklayın.
<?php require '_footer.inc'; ?>

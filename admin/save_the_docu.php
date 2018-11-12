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
  if (isset($_POST['id'])) {
      $id = $_POST['id'];
  }
  try {
   $sql = "UPDATE `docubase`
   SET `visible` = :visible,
   `featured` = :featured,
   `tr_title` = :tr_title,
   `en_title` = :en_title,
   `city` = :city,
   `county` = :county,
   `village` = :village,
   `county_old_name` = :county_old_name,
   `village_old_name` = :village_old_name,
    `story_type` = :story_type,
    `tr_story` = :tr_story,
    `en_story` = :en_story,
    `lat` = :lat,
    `lon` = :lon,
    `url` = :url,
    `bearing` = :bearing,
    `zoom` = :zoom,
    `id` = :id
    WHERE `id` = :id";

    $new = $conn->prepare($sql);
    $new->bindValue(":abondonce_date", $_POST['abondonce_date']);

  $new->bindValue(':id', $id);
  $new->bindValue(':visible', $visible);
  $new->bindValue(':featured', $featured);
  $new->bindValue(':tr_title', $_POST['tr_title']);
  $new->bindValue(':en_title', $_POST['en_title']);
  $new->bindValue(':city', $_POST['city']);
  $new->bindValue(':county', $_POST['county']);
  $new->bindValue(':county_old_name', $_POST['county_old_name']);
  $new->bindValue(':village', $_POST['village']);
  $new->bindValue(':village_old_name', $_POST['village_old_name']);
  $new->bindValue(':story_type', $_POST['story_type']);
  $new->bindValue(':tr_story', $_POST['tr_story']);
  $new->bindValue(':en_story', $_POST['en_story']);
  $new->bindValue(':lat', $_POST['lat']);
  $new->bindValue(':lon', $_POST['lon']);
  $new->bindValue(':bearing', $_POST['bearing']);
  $new->bindValue(':zoom', $_POST['zoom']);
  $new->bindValue(':url', $_POST['url']);
  $count = $new->execute();
   $conn = null;
 }
 catch(PDOException $e) {
   echo $e->getMessage();
 }
?>
<h1><?php echo $_POST['tr_title']; ?> başarıyla güncellendi.</h1>
</div><div>
  Kaydedilen belgesel parçasını düzenlemeye devam etmek için <a href="<?php echo 'update_'.$_POST['story_type'].'.php?id='.$_POST['id'];?>">tıklayın</a>
<?php require '_footer.inc'; ?>

<?php
  require '_header.inc';
  include '../lang.tr.inc';
  require '_conn.inc';
  $id = $_GET['id'];
  $tid = $_GET['tour_id'];
try {
  $bldng = $conn->prepare("DELETE FROM toursteps WHERE id = $id");
  $bldng->execute();
  }
  catch(PDOException $e) {
    echo $e->getMessage();
  }
  $conn = null;
?>
<h1>Uçurdum durağı</h1>
</div><div>
  Kalanlara bakacaksan <a href="update_tour.php?id=<?php echo $tid; ?>">tıkla</a>
<?php require '_footer.inc'; ?>
<?php
  require '_header.inc';
  include '../lang.tr.inc';
  require '_conn.inc';
  $id = $_GET['id'];
try {
  $bldng = $conn->prepare("DELETE FROM docubase WHERE id = $id");
  $bldng->execute();
  }
  catch(PDOException $e) {
    echo $e->getMessage();
  }
  $conn = null;
?>
<h1>Gitti gül gibi belgesel şeyi :(</h1>
</div><div>
  Kalanlara bakacaksan <a href="list_docu_items.php">tıkla</a>
<?php require '_footer.inc'; ?>
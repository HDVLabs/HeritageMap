<?php require '_conn.inc';
$tid = $_POST['tid'];
$step = $_POST['id'];
$step = $step-1;
$lang = $_POST['lang'];
require_once("lang.".$lang.".inc");
try {
$query = $conn->query("SELECT * FROM toursteps WHERE tour_id = '$tid'");
  while ($stc = $query->fetch(PDO::FETCH_ASSOC)) {
    $row[] = $stc;
  };
  $no = count($row);
?>
      <div class="container">
        <div class="row">
          <div class="col-md-12">

            <h1><?php echo $row[$step][$lang.'_title']; ?>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </h1>
            <?php echo $row[$step][$lang.'_story']; ?>

            <?php echo "<!--debug docu ".$row['id']."-->";?>
          </div>
        </div>
      </div>
<?php
$conn = null;
    }
catch(PDOException $err) {
    echo "ERROR: Unable to connect: " . $err->getMessage();
} ?>
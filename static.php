<?php
$_POST['name'] == '' ? die : '';
if ($_POST['name'] == '_contribute') {
 header("Location: form.php?lang=".$_POST['lang']);
 die();
}
if ($_POST['name'] == '_adv_search') {
 header("Location: adv_form.php?lang=".$_POST['lang']);
 die();
}
  require '_conn.inc';
    try {
    $name = $_POST['name'];
    $lang = $_POST['lang'];
    require_once("lang.".$lang.".inc");

    $query = $conn->query("SELECT ".$lang."_content FROM static_content WHERE `field_name` = '$name'");
    ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h1 id="shead"><?php echo $language["$name"]; ?>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </h1>
            <?php
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
             echo '<div id="content">'.$row[$lang.'_content'].'</div>';
              } ?>
          </div>
        </div>
      </div>

    <?php
  $conn = null;
  }
catch(PDOException $err) {
  echo "ERROR: Unable to connect: " . $err->getMessage();
  }

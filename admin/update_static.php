<?php
  require '_header.inc';
  include '../lang.tr.inc';
  require '_conn.inc';

  try {
   $sql = "UPDATE `static_content`
   SET `tr_content` = :tr_content,
       `en_content` = :en_content
       WHERE `field_name` = :page";

   $statement = $conn->prepare($sql);
   $statement->bindValue(":tr_content", $_POST['new_tr_text']);
   $statement->bindValue(":en_content", $_POST['new_en_text']);
   $statement->bindValue(":page", $_POST['page']);
   $count = $statement->execute();

    $conn = null;        // Disconnect
  }
  catch(PDOException $e) {
    echo $e->getMessage();
  }
?>
    <div class="col-md-12">
      <h1>Güncellendi</h1>
        <div class="form-group">
          <label for="tr_updated"> türkçe: </label>
          <textarea id="tr_updated" class="viewer form-control w-100 h-100">
              <?php echo htmlspecialchars($_POST['new_tr_text']); ?>
          </textarea>
          <label for="en_updated"> english: </label>
          <textarea id="en_updated" class="viewer form-control w-100 h-100">
              <?php echo htmlspecialchars($_POST['new_en_text']); ?>
          </textarea>
        </div>
      </div>
      <?php require '_footer_functions.inc'; 
  require '_footer_map.inc';
  require '_footer.inc';

<?php
  require '_header.inc';
  include '../lang.tr.inc';
  require '_conn.inc';
  $lang = 'tr';
?>

      <h1>Yeni Panorama Yükle</h1>
    </div><div>
      <form method="POST" action="upload_panorama.php" enctype="multipart/form-data">
      		<label for="file"> Pick a file :  </label>
      		<input type="file" name ="file">
      		<input type="submit" value = "Upload">
      </form>
<?php require '_footer.inc'; ?>

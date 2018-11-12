<?php
  require '_header.inc';
  $lang = 'tr';
  $sql = "SELECT * FROM docubase WHERE `story_type` = 'panorama'";
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Görünür</th>
      <th scope="col">Başlık</th>
      <th scope="col">Title (eng)</th>
      <th scope="col">Şehir</th>
      <th scope="col">İlçe</th>
      <th scope="col">Köy</th>
    </tr>
  </thead>
  <tbody>
<?php
require '_conn.inc';
try {
      foreach ($conn->query($sql) as $row) { ?>
            <tr>
              <th scope="row">
                <a href="<?php echo 'update_panorama.php?id='.$row['id'];?>">
                  <?php echo $row['id']; ?>
               </a>
              </th>
              <td><?php echo $row['visible']; ?></td>
              <td><a href="<?php echo 'update_panorama.php?id='.$row['id'];?>">
                <?php echo $row['tr_title']; ?></td></a>
              <td><?php echo $row['en_title']; ?></td>
              <td><?php echo $row['city']; ?></td>
              <td><?php echo $row['county']; ?></td>
              <td><?php echo $row['village']; ?></td>
              <td><a href="<?php echo 'del_docu.php?id='.$row['id'];?>" onclick="return confirm('Silersen geri dönüşü yok, emin misin?');"><button type="button" class="btn btn-danger">Sil</button></a></td>              
            </tr>
<?php } ?>
          </tbody>
        </table>
<?php
      $conn = null;
    }
catch(PDOException $err) {
  echo "ERROR: Unable to connect: " . $err->SESSIONMessage();
  }
  require '_footer.inc';

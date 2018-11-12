<?php
$sql = "SELECT * FROM envanter";
foreach ($_POST as $key => $value)
  if (isset($value) && $value !== "") {
  } else {
    unset($_POST[$key]);
}
$_SESSION["filtered"] = $_POST;
if(isset($_POST['name'])) {
  $name .= " WHERE (name LIKE '%{$_POST['name']}%'
      OR also_known LIKE '%{$_POST['name']}%')";
      unset($_POST['name']);
}
$out = $sep = '';
foreach( $_POST as $key => $value ) {
    $out .= $sep . $key . '="'.$value.'"';
    $sep = ' AND ';
}
if (isset($name)) {
  $sql.= $name;
  if ($out !== '') {
    $sql.= " AND ".$out;
  }
} elseif ($out !== '') {
  $sql.= " WHERE ".$out;
  }
  $_SESSION["sql"] = $sql;
?>
<div class="container-fluid">
  <table class="table table-striped">
  <thead>
    <tr>
      <td colspan="7"><?php echo (implode(', ', $_SESSION['filtered']).' arandı.'); ?></td>
      <td><a class="btn btn-info" href="csv.php">CSV İndir</a></td>
    </tr>
    <tr>
      <th scope="col">yapı #</th>
      <th scope="col">Adı</th>
      <th scope="col">Topluluk</th>
      <th scope="col">Yapı</th>
      <th scope="col">Diğer İsimler</th>
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
              <th scope="row"><a href="update_building.php?inv_id=<?php echo $row['inv_id']; ?>"><?php echo $row['inv_id']; ?></a></th>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['tr_ethnicity']; ?></td>
              <td><?php echo $row['tr_building_type']; ?></td>
              <td><?php echo $row['also_known']; ?></td>
              <td><?php echo $row['city']; ?></td>
              <td><?php echo $row['county']; ?></td>
              <td><?php echo $row['village']; ?></td>
            </tr>
<?php } ?>
          </tbody>
        </table>
</div>
<?php
      $conn = null;
    }
catch(PDOException $err) {
  echo "ERROR: Unable to connect: " . $err->SESSIONMessage();
  }

?>
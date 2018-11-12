<?php
require '_conn.inc';
$city = $_GET['city'];
try {
  $sql = "SELECT inv_id, city FROM envanter WHERE city = '$city' ORDER BY inv_id DESC LIMIT 0,1";
  $row = $conn->query($sql)->fetch();
      $data = array(
        'city' => $row['city'],
        'id' => ++$row['inv_id'],
       );
  $conn = null;
}
catch(PDOException $err) {
echo "ERROR: Unable to connect: " . $err->getMessage();
}
  header("Content-Type:application/json",true);
  echo json_encode($data, JSON_NUMERIC_CHECK, JSON_UNESCAPED_UNICODE);
   ?>

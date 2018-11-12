<?php
require '_conn.inc';
    $query = $conn->query("SELECT DISTINCT city FROM envanter");
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
     echo '<option value="'.$row['city'].'">'.$row['city'].'</option>';
      };
?>

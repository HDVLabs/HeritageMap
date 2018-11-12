<?php
require '_conn.inc';
    $query = $conn->query("SELECT DISTINCT tr_building_type, en_building_type FROM envanter WHERE ".$lang."_building_type NOT IN ('', 'Huzurevi', 'Diğer', 'Fakirhane', 'Tapınak', '')");
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
     echo '<option value="'.$row['en_building_type'].'">'.$row[$lang.'_building_type'].'</option>';
  };
?>

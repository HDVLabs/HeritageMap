<?php
require '_conn.inc';
    $query = $conn->query("SELECT DISTINCT tr_ethnicity, en_ethnicity FROM envanter WHERE ".$lang."_ethnicity NOT IN ('', 'Misyoner', '')");
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
     echo '<option value="'.$row['en_ethnicity'].'">'.$row[$lang.'_ethnicity'].'</option>';
      };
?>

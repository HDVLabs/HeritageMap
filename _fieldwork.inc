<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <p class="lead"><?php echo $language['_fw_title']; ?></p>
    <p><?php echo $language['_fw_inspection'].'&nbsp;<small>'.$row['date_of_inspection'].'</small>';?>
    </p>
    <?php
      echo ($row['phsyical_and_social_evaluation'] != '') ? '<p>'.$row['phsyical_and_social_evaluation'].'</p>' : '';
      echo ($row['access'] != '') ? '<p>'.$row['access'].'</p>' : ''; 
      ?>
    </p>
  </div>
</div>

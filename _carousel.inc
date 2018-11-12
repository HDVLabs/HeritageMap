<div id="carouselBtns" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselBtns" data-slide-to="0" class="active"></li>
    <li data-target="#carouselBtns" data-slide-to="1"></li>
    <?php echo ($row['Visual_3'] != '') ? '<li data-target="#carouselBtns" data-slide-to="2"></li>' : '';
    ?>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="./site_images/<?php echo $row['Visual_1']; ?>" alt="<?php echo $row['name']; ?>">
      <?php echo ($row['visual_references_1'] != '') ? '<div class="carousel-caption d-none d-md-block"><p>'.$row['visual_references_1'].'</p></div>' : ''; ?>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./site_images/<?php echo $row['Visual_2']; ?>" alt="<?php echo $row['name']; ?>">
      <?php echo ($row['visual_references_2'] != '') ? '<div class="carousel-caption d-none d-md-block"><p>'.$row['visual_references_2'].'</p></div>' : ''; ?>
    </div>
    <?php echo ($row['Visual_3'] != '') ? '
      <div class="carousel-item">
        <img class="d-block w-100" src="./site_images/'.$row['Visual_3'].'" alt="'.$row['name'].'">'.(($row['visual_references_3']) ? '<div class="carousel-caption d-none d-md-block"><p>'.$row['visual_references_3'].'</p></div>':'').'</div>' : ''; ?>
  </div>
  <a class="carousel-control-prev" href="#carouselBtns" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselBtns" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

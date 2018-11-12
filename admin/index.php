<?php require '_header.inc'; ?>
      <h1 class="h2">Vitrin</h1>
      </div>
      <div>
        <div class="row">
        <?php
        require '_conn.inc';
        try {
          $sql = "SELECT inv_id, name, city, Visual_1 FROM envanter WHERE featured = '1'";

          foreach ($conn->query($sql) as $row) { ?>
            <div class="col-sm-3">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">
                      <a href="update_building.php?inv_id=<?php echo $row['inv_id']; ?>"><?php echo $row['name']; ?></a></h5>

                    <p class="card-text text-center"><a href="update_building.php?inv_id=<?php echo $row['inv_id']; ?>"><img class="img-fluid vitrin" src="../site_images/<?php echo $row['Visual_1']; ?>"/></a></p>
                  </div>
                </div>
            </div>

                <?php
            }
           }
        catch(PDOException $err) {
        echo "ERROR: Unable to connect: " . $err->getMessage();
        }
    ?>
            <?php
            require '_conn.inc';
            try {
              $sql = "SELECT id, story_type, tr_title, city, url FROM docubase WHERE featured = '1'";
              foreach ($conn->query($sql) as $row) {
                  $src = ($row['story_type'] == 'panorama') ? "../docu/360/" : "../docu/vitrin/" ; ?>
                <div class="col-sm-3">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">
                          <a href="update_<?php echo $row['story_type']; ?>.php?id=<?php echo $row['id']; ?>"><?php echo $row['tr_title']; ?></a></h5>
                        <p class="card-text text-center"><a href="update_<?php echo $row['story_type']; ?>.php?id=<?php echo $row['id']; ?>">
                          <?php if ($row['story_type'] == 'video') {
                            echo '<div class="embed-responsive embed-responsive-16by9">'.
                              $row['url'].'</div>';
                             } else { ?>
                          <img class="img-fluid vitrin" src="<?php echo $src.$row['url']; ?>"/>
                          <?php } ?>
                          </a></p>
                      </div>
                    </div>
                </div>

                    <?php
                }
               }
            catch(PDOException $err) {
            echo "ERROR: Unable to connect: " . $err->getMessage();
            }
        ?>
                </div>
      </div>
      <div>
<?php require '_footer.inc'; ?>

<?php
  require '_conn.inc';
    try {
    $id = $_POST['id'];
    $lang = $_POST['lang'];
    require_once("lang.".$lang.".inc");
    $sql = "SELECT * FROM envanter WHERE inv_id = '$id'";
    $row = $conn->query($sql)->fetch(); ?>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 id="shead"><?php
            echo ($row['name'] !== '') ? $row['name'] : $language['_noname'];
            ?>
              <span class="small">
                <?php
                echo $row[$lang.'_building_type']." / ";
                echo ($row[$lang.'_denomination'] != '') ? "".$row[$lang.'_denomination']." " : '' ;
                echo $row[$lang.'_ethnicity'];
              ?>
              </span>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </h1>
            <div id="placecrumb">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="search.php?q=&city=<?php echo $row['city']; ?>&ethnicity=&type=&lang=<?php echo $lang; ?>"><?php echo $row['city']; ?></a></li>
            <?php
              if ($row['county'] != '') {
                echo '<li class="breadcrumb-item"><a href="search.php?q='.$row['county'].'&city='.$row['city'].'&ethnicity=&type=&lang='.$lang.'">'.$row['county'].'</a>';
                };
                if ($row['county_old_name'] != '') {
                  echo ($row['county'] == '' ? '<li class="breadcrumb-item">('.$row['county_old_name'].')</li>' : '&nbsp;('.$row['county_old_name'].')</li>');
                } elseif ($row['county'] != '') {
                  echo '</li>';
                }
              if ($row['village'] != '') {
                echo '<li class="breadcrumb-item"><a href="search.php?q='.$row['village'].'&city='.$row['city'].'&ethnicity=&type=&lang='.$lang.'">'.$row['village'].'</a>';
                };
                if ($row['village_old_name'] != '') {
                  echo ($row['village'] == '' ? '<li class="breadcrumb-item">('.$row['village_old_name'].')</li>' : '&nbsp;('.$row['village_old_name'].')</li>');
                } elseif ($row['village'] != '') {
                  echo '</li>';
                }
              ?>
              </ol>
              <div id="sharer">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['REQUEST_URI']).'/search.php?q=&city='.$row['city'].'&inv_id='.$row['inv_id'].'&lang='.$lang); ?>" target="_blank" rel="noopener noreferrer"><img src="img/facebook.svg" title="<?php echo $language['_share_facebook']; ?>" alt="facebook logo"/></a>
                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode('http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['REQUEST_URI']).'/search.php?q=&city='.$row['city'].'&inv_id='.$row['inv_id'].'&lang='.$lang); ?>" target="_blank" rel="noopener noreferrer"><img src="img/twitter.svg" title="<?php echo $language['_share_twitter']; ?>" alt="twitter logo"/></a>
            </div>
            </nav>
          </div>
          <p>
            <?php
            if ($row['also_known'] != '')
              { $aka = explode(";", $row['also_known']);
                echo ($lang == 'en' ? 'Also known as ' : '');
                echo implode(", ", $aka);
                echo ($lang == 'tr' ? ' olarak da bilinir.</p>' : '');
              }
            if ($row['actual_status'] != '') { echo '<p>'.$language['_status'].': '.$row['actual_status'].'</p>'; }

            if ($row[$lang.'_historical_note'] != '') { echo '<p>'.$row[$lang.'_historical_note'].'</p>'; }

              if ($row['Visual_2'] != '') {
                include '_carousel.inc';
              }
              elseif ($row['Visual_1'] != '') {
                echo '<div class="row my-2">
                <figure class="figure d-block mx-auto">
                  <img class="figure-img img-fluid" src="./site_images/'.$row['Visual_1'].'" alt="'.$row['name'].'">';
                  if ($row['visual_references_1'] != '') {
                    echo '<figcaption class="figure-caption text-right">'.$row['visual_references_1'].'</figcaption>'; }
                  echo '</div>';
              }
              if ($row['registration_date'] != '')
              { echo '<p class="my-1">'.$language['_registration'].': '.$row['registration_date'].'</p>'; }

              if ($row['date_of_inspection'] != '') { include '_fieldwork.inc'; }

              if ($row['footnote'] != '') { echo '<p class="my-1 text-muted small">'.$language['_bibliofn'].':&nbsp;'.$row['footnote']."</p>"; }
              if ($row['external_links'] != '')
                { $links = explode("; ", $row['external_links']);
                  echo '<p class="my-1 text-muted small">'.$language['_links'].':<br/>';
                  foreach ($links as $link) echo "<a href='$link' target='_blank'>$link</a><br/>";
                  echo '</p>';
                }
            ?>
            </div>
          </div>
      </div>

    <?php
  echo "<!--debug ".$row['inv_id']."-->";
  $conn = null;
  }
catch(PDOException $err) {
  echo "ERROR: Unable to connect: " . $err->getMessage();
  }

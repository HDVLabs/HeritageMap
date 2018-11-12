<?php
  require '_header.inc';
  include '../lang.tr.inc';
  require '_conn.inc';
  $lang = 'tr';
  if (isset($_GET['id'])) {
      $id = $_GET['id'];
  } else {
    echo "Geçerli bir ID girilmedi. Lütfen <a href='list_docu.php'>buradan seçin</a>";
    die;
  }

  $bldng = $conn->prepare("SELECT * FROM toursteps WHERE id = '$id'");
  $bldng->execute();
  $row = $bldng->fetch();
?>
    <div class="col-md-12">
      <form method="post" action="save_the_step.php">
        <input type='hidden' name='id' value='<?php echo $id; ?>'/>
        <input type='hidden' name='tour_id' value='<?php echo $row['tour_id']; ?>'/>
        <input type='hidden' name='story_type' value='story'/>
      <h1><?php echo $row['step']; ?>. tur durağını güncelle
        <small class="float-sm-right">
        <?php
          if ($row['visible'] == '1') {
            echo '<input id="vis" type="checkbox" name="visible" checked>';
          } else {
            echo '<input id="vis" type="checkbox" name="visible">';
          }
        ?>
        <button type="submit" class="btn btn-primary">Kaydet</button>
      </small>
      </h1>
        <div class="form-row border-top  py-2 my-2">
          <div class="col-md-1">
            <label for="step" class="col-form-label pr-2">Durak#</label>
            <input type="text" class="form-control" name="step" value="<?php echo $row['step']; ?>">
          </div>
          <div class="col-md-2">
            <label for="name" class="col-form-label pr-2">Başlık</label>
            <input type="text" class="form-control" name="tr_title" value="<?php echo $row['tr_title']; ?>">
          </div>
          <div class="col-md-3">
            <label for="name" class="col-form-label pr-2">Title (English)</label>
            <input type="text" class="form-control" name="en_title" value="<?php echo $row['en_title']; ?>">
          </div>
          <div class="col-md-3">
            <label for="lat" class="col-form-label pr-2">Enlem (lat)</label>
            <?php $lat = $row['lat'];
              echo "<input id='lat' type='text' class='form-control' name='lat' value=".$row['lat'].">"; ?>
          </div>
          <div class="col-md-3">
            <label for="lon" class="col-form-label pr-2">Boylam (lon)</label>
            <?php $lon = $row['lon'];
              echo "<input id='lon' type='text' class='form-control' name='lon' value=".$row['lon'].">"; ?>
          </div>
        </div>

        <div class="form-row border-top py-2 my-2">
            <div class="col-md-9">
              <ul id="tabbed" class="nav nav-tabs">
                <li class="nav-item"><a href="" data-target="#turkish" data-toggle="tab" class="nav-link small active">Türkçe</a></li>
                  <li class="nav-item"><a href="" data-target="#english" data-toggle="tab" class="nav-link small">English</a></li>
                </ul>
            <div id="tabbedcontent" class="tab-content story">
                <div id="turkish" class="tab-pane fade active show">
                  <textarea id="new_tr_text" name="tr_story" class="editor form-control">
                    <?php echo $row['tr_story']; ?>
                  </textarea>
                </div>
                <div id="english" class="tab-pane fade">
                  <textarea id="new_en_text" name="en_story" class="editor form-control">
                    <?php echo htmlspecialchars($row['en_story']); ?>
                  </textarea>
                </div>
            </div>
            </div>
            <div class="col-md-3">
              <div id="map"></div>
            </div>
        </div>
      </form>
      </div>
      <?php require '_footer_functions.inc';
      require '_footer_map.inc';
      require '_footer.inc';
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

  $bldng = $conn->prepare("SELECT * FROM docubase WHERE id = '$id'");
  $bldng->execute();
  $row = $bldng->fetch();
?>
    <div class="col-md-12">
      <form method="post" action="save_the_docu.php">
        <input type='hidden' name='url' value='<?php echo $row['url']; ?>'/>
        <input type='hidden' name='id' value='<?php echo $id; ?>'/>
        <input type='hidden' name='story_type' value='video'/>
      <h1><?php echo $row['story_type']?> güncelle
        <small class="float-sm-right">
        <?php
          if ($row['featured'] == '1') {
            echo '<input id="feat" type="checkbox" name="featured" class="mx-1" checked>&nbsp;';
          } else {
            echo '<input id="feat" type="checkbox" name="featured">&nbsp;';
          }
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
          <div class="col-md-2">
            <label for="city" class="col-form-label pr-2">Bulunduğu Şehir</label>
            <select class="form-control" name="city">
              <?php
              $query = $conn->query("SELECT DISTINCT `city` FROM docubase WHERE `city` != ''");
              while ($ethnic = $query->fetch()) {
                if ($row['city'] == $ethnic['city']) {
                  echo '<option SELECTED value="'.$ethnic['city'].'">'.$ethnic['city'].'</option>';
                  } else {
                  echo '<option value="'.$ethnic['city'].'">'.$ethnic['city'].'</option>';
                  }
                };
               ?>
            </select>
          </div>
          <div class="col-md-3">
            <label for="name" class="col-form-label pr-2">Başlık</label>
            <input type="text" class="form-control" name="tr_title" value="<?php echo $row['tr_title']; ?>">
          </div>
          <div class="col-md-3">
            <label for="name" class="col-form-label pr-2">Title (English)</label>
            <input type="text" class="form-control" name="en_title" value="<?php echo $row['en_title']; ?>">
          </div>
          <div class="col-md-2">
            <label for="lat" class="col-form-label pr-2">Enlem (lat)</label>
            <?php $lat = $row['lat'];
              echo "<input id='lat' type='text' class='form-control' name='lat' value=".$row['lat'].">"; ?>
          </div>
          <div class="col-md-2">
            <label for="lon" class="col-form-label pr-2">Boylam (lon)</label>
            <?php $lon = $row['lon'];
              echo "<input id='lon' type='text' class='form-control' name='lon' value=".$row['lon'].">"; ?>
          </div>
        </div>
        <div class="form-row py-2 my-2">
          <div class="col-md-2">
            <label for="county" class="col-form-label pr-2">Bulunduğu İlçe</label>
            <input type="text" class="form-control" name="county" value="<?php echo $row['county']; ?>">
          </div>
          <div class="col-md-3">
            <label for="county_old_name" class="col-form-label pr-2">İlçenin Eski Adı (Varsa)</label>
            <input type="text" class="form-control" name="county_old_name" value="<?php echo $row['county_old_name']; ?>">
          </div>
          <div class="col-md-3">
            <label for="village" class="col-form-label pr-2">Bulunduğu Köy</label>
            <input type="text" class="form-control" name="village" value="<?php echo $row['village']; ?>">
          </div>
          <div class="col-md-2">
            <label for="village_old_name" class="col-form-label pr-2">Köyün Eski Adı (varsa)</label>
            <input type="text" class="form-control" name="village_old_name" value="<?php echo $row['village_old_name']; ?>">
          </div>
        </div>

        <div class="form-row border-top py-2 my-2">
            <div class="col-md-6">
              <textarea id="url" name="url">
                <?php echo $row['url']; ?>
              </textarea>
            </div>
            <div class="col-md-6">
              <div id="map"></div>
            </div>
        </div>
      </form>
      </div>
      <?php require '_footer_functions.inc'; ?>
          <script>
          tinymce.init({
            relative_urls : true,
            document_base_url : "http://localhost/harita/",
            menubar:false,
            statusbar:false,
            entity_encoding : "raw",
            selector: '#url',
            force_br_newlines : true,
            force_p_newlines : false,
            forced_root_block : '',
            plugins: [
              'media autoresize code',
            ],
            toolbar: 'media code',
            media_live_embeds: true
          });
        </script>
      <?php require '_idfill.inc';
      require '_footer_map.inc';
      require '_footer.inc';

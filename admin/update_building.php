<?php
  require '_header.inc';
  include '../lang.tr.inc';
  require '_conn.inc';
  $lang = 'tr';
  if (isset($_GET['inv_id'])) {
      $id = $_GET['inv_id'];
  } else {
    echo "Geçerli bir yapı kodu girilmedi. <a href='find_building.php'>Yapı Bul / Düzenle</a>";
    die;
  }

  $bldng = $conn->prepare("SELECT * FROM envanter WHERE inv_id = '$id'");
  $bldng->execute();
  $row = $bldng->fetch();
?>
    <div class="col-md-12">
      <form method="post" action="save_building.php">
      <h1>Yapı Bilgisi Güncelle<small class="float-sm-right">
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
				<button type="submit" class="btn btn-primary">Kaydet</button></small>
      </h1>
        <div class="form-row border-top  py-2 my-2">
          <div class="col-md-1">
            <label for="inv_id" class="col-form-label pr-2">Envanter #</label>
              <input type="text" class="form-control" name="inv_id" value="<?php echo $row['inv_id']; ?>">
          </div>
          <div class="col-md-2">
            <label for="city" class="col-form-label pr-2">Bulunduğu Şehir</label>
            <select class="form-control" name="city">
              <?php
              $query = $conn->query("SELECT DISTINCT `city` FROM envanter WHERE `city` != ''");
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
            <label for="name" class="col-form-label pr-2">Yapı Adı</label>
            <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
          </div>
          <div class="col-md-2">
            <label for="tr_ethnicity" class="col-form-label pr-2">Etnik Topluluk</label>
            <select class="form-control" name="tr_ethnicity">
              <?php
              $query = $conn->query("SELECT DISTINCT `tr_ethnicity` FROM envanter WHERE `tr_ethnicity` != ''");
              while ($ethnic = $query->fetch()) {
                if ($row['tr_ethnicity'] == $ethnic['tr_ethnicity']) {
                  echo '<option SELECTED value="'.$ethnic['tr_ethnicity'].'">'.$ethnic['tr_ethnicity'].'</option>';
                  } else {
                  echo '<option value="'.$ethnic['tr_ethnicity'].'">'.$ethnic['tr_ethnicity'].'</option>';
                  }
                };
               ?>
            </select>
          </div>
          <div class="col-md-2">
            <label for="tr_building_type" class="col-form-label pr-2">Yapı Cinsi</label>
            <select class="form-control" name="tr_building_type">
              <?php
              $query = $conn->query("SELECT DISTINCT tr_building_type FROM envanter WHERE tr_building_type NOT IN ('', 'Huzurevi', 'Diğer', 'Fakirhane', 'Tapınak', '')");
              while ($ethnic = $query->fetch()) {
                if ($row['tr_building_type'] == $ethnic['tr_building_type']) {
                  echo '<option SELECTED value="'.$ethnic['tr_building_type'].'">'.$ethnic['tr_building_type'].'</option>';
                  } else {
                  echo '<option value="'.$ethnic['tr_building_type'].'">'.$ethnic['tr_building_type'].'</option>';
                  }
                };
               ?>
            </select>
          </div>

          <div class="col-md-2">
            <label for="tr_denomination" class="col-form-label pr-2">Mezhep</label>
            <select class="form-control" name="tr_denomination">
              <?php
              $query = $conn->query("SELECT DISTINCT `tr_denomination` FROM envanter");
              while ($ethnic = $query->fetch()) {
                if ($row['tr_denomination'] == $ethnic['tr_denomination']) {
                  echo '<option SELECTED value="'.$ethnic['tr_denomination'].'">'.$ethnic['tr_denomination'].'</option>';
                  } else {
                  echo '<option value="'.$ethnic['tr_denomination'].'">'.$ethnic['tr_denomination'].'</option>';
                  }
                };
               ?>
            </select>
          </div>
        </div>
        <div class="form-row py-2 my-2">
          <div class="col-md-4">
            <label for="also_known" class="col-form-label pr-2">Diğer bilindiği isimler ( ; ile ayrılmalı)</label>
            <input type="text" class="form-control" name="also_known" value="<?php echo $row['also_known']; ?>">
          </div>
          <div class="col-md-2">
            <label for="county" class="col-form-label pr-2">Bulunduğu İlçe</label>
            <input type="text" class="form-control" name="county" value="<?php echo $row['county']; ?>">
          </div>
          <div class="col-md-2">
            <label for="county_old_name" class="col-form-label pr-2">İlçenin Eski Adı (Varsa)</label>
            <input type="text" class="form-control" name="county_old_name" value="<?php echo $row['county_old_name']; ?>">
          </div>
          <div class="col-md-2">
            <label for="village" class="col-form-label pr-2">Bulunduğu Köy</label>
            <input type="text" class="form-control" name="village" value="<?php echo $row['village']; ?>">
          </div>
          <div class="col-md-2">
            <label for="village_old_name" class="col-form-label pr-2">Köyün Eski Adı (varsa)</label>
            <input type="text" class="form-control" name="village_old_name" value="<?php echo $row['village_old_name']; ?>">
          </div>
        </div>
        <div class="form-row border-top py-2 my-2">
          <div class="col-md-3">
            <label for="building_date" class="col-form-label pr-2">İnşa Tarihi</label>
            <input type="text" class="form-control" name="building_date" value="<?php echo $row['building_date']; ?>">
          </div>
          <div class="col-md-3">
            <label for="building_date_century" class="col-form-label pr-2">İnşa Edildiği Yüzyıl</label>
            <input type="text" class="form-control" name="building_date_century" value="<?php echo $row['building_date_century']; ?>">
          </div>
          <div class="col-md-3">
            <label for="abondonce_date" class="col-form-label pr-2">Terk Edildiği Tarih</label>
            <input type="text" class="form-control" name="abondonce_date" value="<?php echo $row['abondonce_date']; ?>">
          </div>
          <div class="col-md-3">
            <label for="abondonce_date_century" class="col-form-label pr-2">Terk Edildiği Yüzyıl</label>
            <input type="text" class="form-control" name="abondonce_date_century" value="<?php echo $row['abondonce_date_century']; ?>">
          </div>
          <div class="col-md-6">
            <label for="historical_note" class="col-form-label pr-2">Tarihi Bilgi (türkçe) <span class="muted small">(biçimsel araçlar sağ tuşa yüklü)</span></label>
            <textarea rows="4" class="viewer form-control" name="tr_historical_note"><?php echo $row['tr_historical_note']; ?></textarea>
          </div>
          <div class="col-md-6">
            <label for="historical_note" class="col-form-label pr-2">Tarihi Bilgi (ingilizce) <span class="muted small">(biçimsel araçlar sağ tuşa yüklü)</span></label>
            <textarea rows="4" class="viewer form-control" name="en_historical_note"><?php echo $row['en_historical_note']; ?></textarea>
          </div>
          <div class="col-md-6">
            <label for="footnote" class="col-form-label pr-2">Kaynakça <span class="muted small">(biçimsel araçlar sağ tuşa yüklü)</span></label>
            <textarea rows="4" class="viewer form-control" name="footnote"><?php echo $row['footnote']; ?></textarea>
          </div>
          <div class="col-md-6">
            <label for="external_links" class="col-form-label pr-2">Linkler ( ; ile ayrılmalı)</label>
            <textarea class="form-control" name="external_links"><?php echo $row['external_links']; ?></textarea>
          </div>
        </div>
        <div class="form-row border-top py-2 my-2">

          <div class="form-row py-2 my-2">
            <div class="col-md-6">
              <div class="form-row">
              <div class="col-md-12">
                <label for="date_of_inspection" class="col-form-label pr-2">Envanter Kayıt Tarihi (saha araştırması fişi)</label>
                <input type="date" class="form-control" name="date_of_inspection" value="<?php echo $row['date_of_inspection']; ?>">
              </div>
              <div class="col-md-6">
                <label for="lat" class="col-form-label pr-2">Yaklaşık Enlem (lat)</label>
                <?php
                if ($row['rec_lat'] > 1) {
                  $lat = $row['rec_lat'];
                  echo "<input disabled type='text' class='form-control' name='lat' value=".$row['lat'].">";
                  } else {
                  $lat = $row['lat'];
                  echo "<input id='lat' type='text' class='form-control' name='lat' value=".$row['lat'].">";
                  }
                 ?>
              </div>
              <div class="col-md-6">
                <label for="lon" class="col-form-label pr-2">Yaklaşık Boylam (lon)</label>
                <?php
                if ($row['rec_lon'] > 1) {
                  $lon = $row['rec_lon'];
                  echo "<input disabled type='text' class='form-control' name='lon' value=".$row['lon'].">";
                  } else {
                  $lon = $row['lon'];
                  echo "<input id='lon' type='text' class='form-control' name='lon' value=".$row['lon'].">";
                  }
                 ?>
              </div>
              <div class="col-md-6">
                <label for="rec_lat" class="col-form-label pr-2">Kaydedilen Enlem (lat)</label>
                <?php
                if ($row['rec_lat'] > 1) {
                  echo "<input id='lat' type='text' class='form-control' name='rec_lat' value=".$row['rec_lat'].">";
                  } else {
                  echo "<input type='text' class='form-control' name='rec_lat' value=".$row['rec_lat'].">";
                  }
                 ?>
              </div>
              <div class="col-md-6">
                <label for="rec_lon" class="col-form-label pr-2">Kaydedilen Boylam (lon)</label>
                <?php
                if ($row['rec_lon'] > 1) {
                  echo "<input id='lon' type='text' class='form-control' name='rec_lon' value=".$row['rec_lon'].">";
                  } else {
                  echo "<input type='text' class='form-control' name='rec_lon' value=".$row['rec_lon'].">";
                  }
                 ?>
              </div>
            </div>
            </div>
            <div class="col-md-6">
              <div id="map"></div>
            </div>
          </div>

          <div class="form-row py-2 my-2">
            <div class="col-md-4">
              <label for="access" class="col-form-label pr-2">Erişim Bilgisi</label>
              <input type="text" class="form-control" name="access" value="<?php echo $row['access']; ?>">
            </div>
            <div class="col-md-4">
              <label for="actual_status" class="col-form-label pr-2">Güncel Kullanım</label>
              <input type="text" class="form-control" name="actual_status" value="<?php echo $row['actual_status']; ?>">
            </div>
            <div class="col-md-4">
              <label for="registration_date" class="col-form-label pr-2">Tescil Bilgisi</label>
              <input type="text" class="form-control" name="registration_date" value="<?php echo $row['registration_date']; ?>">
            </div>
            <div class="col-md-5">
              <label for="ownership" class="col-form-label pr-2">Mülkiyet Durumu</label>
              <input type="text" class="form-control" name="ownership" value="<?php echo $row['ownership']; ?>">
            </div>
            <div class="col-md-7">
              <label for="ownership_note" class="col-form-label pr-2">Mülkiyet Notu</label>
              <input type="text" class="form-control" name="ownership_note" value="<?php echo $row['ownership_note']; ?>">
            </div>
            <div class="col-md-6">
              <label for="phsyical_and_social_evaluation" class="col-form-label pr-2">Fiziksel ve Sosyal Durumu <span class="muted small">(biçimsel araçlar sağ tuşa yüklü)</span></label>
              <textarea rows="3" class="viewer form-control" name="phsyical_and_social_evaluation"><?php echo $row['phsyical_and_social_evaluation']; ?></textarea>
            </div>
            <div class="col-md-6">
              <label for="notes" class="col-form-label pr-2">Araştırmacı Notu <span class="muted small">(biçimsel araçlar sağ tuşa yüklü)</span> (kuruma özel)</label>
              <textarea rows="3" class="viewer form-control" name="notes"><?php echo $row['notes']; ?></textarea>
            </div>
            <div class="col-md-4">
              <label for="ada" class="col-form-label pr-2">Ada</label>
              <input type="text" class="form-control" name="ada" value="<?php echo $row['ada']; ?>">
            </div>
            <div class="col-md-4">
              <label for="pafta" class="col-form-label pr-2">Pafta</label>
              <input type="text" class="form-control" name="pafta" value="<?php echo $row['pafta']; ?>">
            </div>
            <div class="col-md-4">
              <label for="parsel" class="col-form-label pr-2">Parsel</label>
              <input type="text" class="form-control" name="parsel" value="<?php echo $row['parsel']; ?>">
            </div>
          </div>
        </div>
        <div class="form-row border-top py-2 my-2">
          <div class="col-md-4">
            <label for="Visual_1" class="col-form-label pr-2">Görsel Dosya Adı - 1 (site_images klasöründe!)</label>
            <input type="text" class="form-control" name="Visual_1" value="<?php echo $row['Visual_1']; ?>" data-toggle="tooltip" data-html="true" title="<img src='../site_images/<?php echo $row['Visual_1']; ?>' class='img-fluid'>">
          </div>
          <div class="col-md-2">
            <label for="visual_date_1" class="col-form-label pr-2">Görsel Tarihi</label>
            <input type="text" class="form-control screenshot" name="visual_date_1" rel="../site_images/<?php echo $row['visual_date_1']; ?>" value="<?php echo $row['visual_date_1']; ?>">
          </div>
          <div class="col-md-6">
            <label for="visual_references_1" class="col-form-label pr-2">Görsel Kaynakça</label>
            <input type="text" class="form-control" name="visual_references_1" value="<?php echo $row['visual_references_1']; ?>">
          </div>
          <div class="col-md-4">
            <label for="Visual_2" class="col-form-label pr-2">Görsel Dosya Adı - 2</label>
            <input type="text" class="form-control" name="Visual_2" value="<?php echo $row['Visual_2']; ?>" data-toggle="tooltip" data-html="true" title="<img src='../site_images/<?php echo $row['Visual_2']; ?>' class='img-fluid'>">
          </div>
          <div class="col-md-2">
            <label for="visual_date_2" class="col-form-label pr-2">Görsel Tarihi</label>
            <input type="text" class="form-control" name="visual_date_2" value="<?php echo $row['visual_date_2']; ?>">
          </div>
          <div class="col-md-6">
            <label for="visual_references_2" class="col-form-label pr-2">Görsel Kaynakça</label>
            <input type="text" class="form-control" name="visual_references_2" value="<?php echo $row['visual_references_2']; ?>">
          </div>
          <div class="col-md-4">
            <label for="Visual_3" class="col-form-label pr-2">Görsel Dosya Adı - 3</label>
            <input type="text" class="form-control" name="Visual_3" value="<?php echo $row['Visual_3']; ?>" data-toggle="tooltip" data-html="true" title="<img src='../site_images/<?php echo $row['Visual_3']; ?>' class='img-fluid'>">
          </div>
          <div class="col-md-2">
            <label for="visual_date_3" class="col-form-label pr-2">Görsel Tarihi</label>
            <input type="text" class="form-control" name="visual_date_3" value="<?php echo $row['visual_date_3']; ?>">
          </div>
          <div class="col-md-6">
            <label for="visual_references_3" class="col-form-label pr-2">Görsel Kaynakça</label>
            <input type="text" class="form-control" name="visual_references_3" value="<?php echo $row['visual_references_3']; ?>">
          </div>
        </div>
      </form>
      </div>
<?php
require '_footer_functions.inc';
require '_footer_map.inc';
require '_footer.inc';

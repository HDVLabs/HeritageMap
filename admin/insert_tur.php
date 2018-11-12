<?php
  require '_header.inc';
  include '../lang.tr.inc';
  require '_conn.inc';
  $lang = 'tr';
?>
<div class="container-fluid">
    <form method="post" action="add_the_tour.php">
    <div class="col-md-12">
      <h1>Yeni Tur Ekle
        <small class="float-sm-right">
          <input id="feat" type="checkbox" name="featured">
          <input id="vis" type="checkbox" name="visible" checked>
				 <button type="submit" class="btn btn-primary">Kaydet</button>
        </small>
      </h1>
      <input type='hidden' name='story_type' value='tour'/>
    </div>
    <div class="form-row border-top py-1 my-1">
      <div class="col-md-2">
          <label for="city" class="col-form-label pr-2">Bulunduğu Şehir</label>
              <select class="form-control" id="city" name="city">
                <?php
                $query = $conn->query("SELECT DISTINCT `city` FROM envanter");
                while ($row = $query->fetch()) {
                  echo '<option value="'.$row['city'].'">'.$row['city'].'</option>';
                  };
                 ?>
               </select>
      </div>
      <div class="col-md-3">
        <label for="name" class="col-form-label pr-2">Başlık (Türkçe)</label>
        <input type="text" class="form-control" id="tr_title" name="tr_title" value="">
      </div>
      <div class="col-md-3">
        <label for="name" class="col-form-label pr-2">Title (english)</label>
        <input type="text" class="form-control" id="en_title" name="en_title" value="">
      </div>
      <div class="col-md-2">
        <label for="lat" class="col-form-label">Kaydedilen Enlem (lat)</label>
        <input id='lat' type='text' class='form-control' name='lat' value=''>
      </div>
      <div class="col-md-2">
        <label for="lon" class="col-form-label">Kaydedilen Boylam (lon)</label>
        <input id='lon' type='text' class='form-control mb-3' name='lon' value=''>
      </div>
    </div>
    <div class="form-row py-1 my-1">
      <div class="col-md-2">
        <label for="county" class="col-form-label pr-2">Bulunduğu İlçe</label>
        <input type="text" class="form-control" id="county" name="county" value="">
      </div>
      <div class="col-md-2">
        <label for="county" class="col-form-label pr-2">İlçenin eski adı (varsa)</label>
        <input type="text" class="form-control" id="county_old_name" name="county_old_name" value="">
      </div>
      <div class="col-md-2">
        <label for="village" class="col-form-label pr-2">Bulunduğu Köy</label>
        <input type="text" class="form-control" id="village" name="village" value="">
      </div>
      <div class="col-md-2">
        <label for="village" class="col-form-label pr-2">Köyün eski adı (varsa)</label>
        <input type="text" class="form-control" id="village_old_name" name="village_old_name" value="">
      </div>
      <div class="col-md-1">
        <label for="bearing" class="col-form-label pr-2">bearing</label>
        <input type="text" class="form-control" id="bearing" name="bearing" value="-80">
      </div>
      <div class="col-md-1">
        <label for="zoom" class="col-form-label pr-2">zoom</label>
        <input type="text" class="form-control" id="zoom" name="zoom" value="15">
      </div>
      <div class="col-md-2">
        <label for="url" class="col-form-label pr-2">Dosya adı (docu/vitrin)</label>
        <input type="text" class="form-control" name="url" value="">
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-9 h-100">
        <ul id="tabbed" class="nav nav-tabs">
          <li class="nav-item"><a href="" data-target="#turkish" data-toggle="tab" class="nav-link small active">Türkçe</a></li>
            <li class="nav-item"><a href="" data-target="#english" data-toggle="tab" class="nav-link small">English</a></li>
        </ul>
        <div id="tabbedcontent" class="tab-content story">
          <div id="turkish" class="tab-pane fade active show">
            <textarea id="new_tr_text" name="tr_story" class="editor form-control">
            </textarea>
        </div>
        <div id="english" class="tab-pane fade">
            <textarea id="new_en_text" name="en_story" class="editor form-control">
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

  <?php require '_footer_map.inc'; ?>
  <?php require '_footer_functions.inc'; ?>
<?php require '_footer.inc'; ?>

<?php
  require '_header.inc';
  include '../lang.tr.inc';
  require '_conn.inc';
  $lang = 'tr';
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
			<form method="post" action="add_the_media.php">
      <h1>Yeni video Ekle<small class="float-sm-right">
        <input id="feat" type="checkbox" name="featured">
				<input id="vis" type="checkbox" name="visible" checked>
				<button type="submit" class="btn btn-primary">Kaydet</button></small></h1>
        <input type='hidden' name='story_type' value='video'/>
        <div class="form-row border-top py-1 my-1">
          <div class="col-md-1">
            <label for="inv_id" class="col-form-label pr-2">Envanter ID</label>
            <input type="text" class="form-control" id="inv_id" name="inv_id" value="">
          </div>
          <div class="col-md-3">
            <label for="name" class="col-form-label pr-2">Yapı Adı/Başlık</label>
            <input type="text" class="form-control" id="tr_title" name="tr_title" value="">
          </div>
          <div class="col-md-3">
            <label for="name" class="col-form-label pr-2">Title (english)</label>
            <input type="text" class="form-control" id="en_title" name="en_title" value="">
          </div>
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
        </div>
      <div class="row py-1 my-1">
				<div class="col-md-2">
					<label for="county" class="col-form-label pr-2">Bulunduğu İlçe</label>
					<input type="text" class="form-control" id="county" name="county" value="">
				</div>
				<div class="col-md-2">
					<label for="county" class="col-form-label pr-2">İlçenin eski adı (varsa)</label>
					<input type="text" class="form-control" id="county_old_name" name="county" value="">
				</div>
				<div class="col-md-2">
					<label for="village" class="col-form-label pr-2">Bulunduğu Köy</label>
					<input type="text" class="form-control" id="village" name="village" value="">
				</div>
				<div class="col-md-2">
					<label for="village" class="col-form-label pr-2">Köyün eski adı (varsa)</label>
					<input type="text" class="form-control" id="village_old_name" name="village" value="">
				</div>
				<div class="col-md-2">
					<label for="rec_lat" class="col-form-label pr-2">Kaydedilen Enlem (lat)</label>
					<input id='lat' type='text' class='form-control' name='lat' value='<?php echo $gpsarray['latitude']; ?>'>
				</div>
				<div class="col-md-2">
					<label for="rec_lon" class="col-form-label pr-2">Kaydedilen Boylam (lon)</label>
					<input id='lon' type='text' class='form-control' name='lon' value='<?php echo $gpsarray['longitude']; ?>'>
				</div>
			</div>
      <div class="form-row py-2 my-2">
        <div class="col-md-6">
          <div id="map"></div>
        </div>
        <div class="col-md-6">
          <textarea id="url" name="url">
          </textarea>
        </div>
      </div>
      </div>
      </div>
      </form>
    </div>
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

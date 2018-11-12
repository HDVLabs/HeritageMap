<?php
	if($_FILES['file']['error'] > 0) { echo 'Error during uploading, try again'; }
	$extsAllowed = array( 'jpg', 'jpeg');
	$extUpload = strtolower( substr( strrchr($_FILES['file']['name'], '.') ,1) ) ;
	if (in_array($extUpload, $extsAllowed) ) {
	$name = "{$_FILES['file']['name']}";
  $url = "../docu/360/{$_FILES['file']['name']}";
	$result = move_uploaded_file($_FILES['file']['tmp_name'], $url);
	if($result){
    $gpsarray = $returned_data = triphoto_getGPS($url);
  }
	} else { echo 'File is not valid. Please try again'; }
  function triphoto_getGPS($url)
  {
      $exif = exif_read_data($url);
      if(isset($exif["GPSLatitudeRef"])) {
          $LatM = 1; $LongM = 1;
          if($exif["GPSLatitudeRef"] == 'S') {
              $LatM = -1;
          }
          if($exif["GPSLongitudeRef"] == 'W') {
              $LongM = -1;
          }
          $gps['LatDegree']=$exif["GPSLatitude"][0];
          $gps['LatMinute']=$exif["GPSLatitude"][1];
          $gps['LatgSeconds']=$exif["GPSLatitude"][2];
          $gps['LongDegree']=$exif["GPSLongitude"][0];
          $gps['LongMinute']=$exif["GPSLongitude"][1];
          $gps['LongSeconds']=$exif["GPSLongitude"][2];
          foreach($gps as $key => $value){
              $pos = strpos($value, '/');
              if($pos !== false){
                  $temp = explode('/',$value);
                  $gps[$key] = $temp[0] / $temp[1];
              }
          }
          $result['latitude']  = $LatM * ($gps['LatDegree'] + ($gps['LatMinute'] / 60) + ($gps['LatgSeconds'] / 3600));
          $result['longitude'] = $LongM * ($gps['LongDegree'] + ($gps['LongMinute'] / 60) + ($gps['LongSeconds'] / 3600));
          $result['datetime']  = $exif["DateTime"];
          return $result;
      }
  }
	$lat = $gpsarray['latitude'];
	$lon = $gpsarray['longitude'];
  require '_header.inc';
  include '../lang.tr.inc';
  require '_conn.inc';
  $lang = 'tr';
?>
    <div class="col-md-12">
			<form method="post" action="add_the_media.php">
      <h1>360'ı Haritaya Kaydet<small class="float-sm-right">
				<input id="feat" type="checkbox" name="featured">
				<input id="vis" type="checkbox" name="visible" checked>
				<button type="submit" class="btn btn-primary">Kaydet</button></small></h1>
        <input type='hidden' name='story_type' value='panorama'/>
        <input type='hidden' name='url' value='<?php echo $name; ?>'/>
        <div class="form-row border-top py-1 my-1">
          <div class="col-md-2">
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
					<label for="county_old_name" class="col-form-label pr-2">İlçenin eski adı (varsa)</label>
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
				<div class="col-md-2">
					<label for="rec_lat" class="col-form-label pr-2">Kaydedilen Enlem (lat)</label>
					<input id='lat' type='text' class='form-control' name='lat' value='<?php echo $lat; ?>'>
				</div>
				<div class="col-md-2">
					<label for="rec_lon" class="col-form-label pr-2">Kaydedilen Boylam (lon)</label>
					<input id='lon' type='text' class='form-control' name='lon' value='<?php echo $lon; ?>'>
				</div>
			</div>
      <div class="row py-2 my-2">
        <div class="col-md-6">
          <div id="map"></div>
        </div>
        <div class="col-md-6">
          <div id="panorama"></div>
        </div>
      </div>

      </form>
			</div>
			<?php include '_footer_functions.inc' ?>
			<?php include '_footer_map.inc' ?>
			<?php include '_idfill.inc' ?>
      <script>
      pannellum.viewer('panorama', {
          "type": "equirectangular",
          "panorama": "<?php echo $url; ?>",
          "autoLoad": true
      });
    </script>
		<?php include '_footer.inc' ?>

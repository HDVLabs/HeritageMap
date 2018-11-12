<?php require '_head_box.inc';
  try {
  $id = $_GET['id'];
  $lang = $_GET['lang'];
  $sql = "SELECT * FROM docubase WHERE id = '$id'";
  $row = $conn->query($sql)->fetch(); ?>
        <div id="sidebar" class="col-md-7 order-first">
          <h1><?php echo $row[$lang.'_title']; ?></h1>
            <?php echo $row[$lang.'_story']; ?>
        </div>
      </div>
<script>
  $('#map_canvas').css("height", $(window).innerHeight() - 80).addClass("col-md-5 position-sticky");
  $('#sidebar').css("height", $(window).innerHeight() - 80);
  mapboxgl.accessToken = '<?php echo $mapboxToken; ?>';
  var map = new mapboxgl.Map({
      container: 'map_canvas',
      style: 'mapbox://styles/mapbox/streets-v10',
      center: [<?php echo $row['lon'];?>,<?php echo $row['lat'];?>],
      pitch: 70,
      zoom: 10
  });
  map.addControl(new mapboxgl.NavigationControl());
  map.scrollZoom.disable();
  var marker = new mapboxgl.Marker()
      .setLngLat([<?php echo $row['lon'];?>,<?php echo $row['lat'];?>])
      .addTo(map);
</script>
<?php
$conn = null;
}
catch(PDOException $err) {
echo "ERROR: Unable to connect: " . $err->getMessage();
} ?>
</div>
</body>
</html>

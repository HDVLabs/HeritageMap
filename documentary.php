<?php require '_head.inc';
require '_conn.inc';
  try {
  $lang = $_GET['lang'] == 'en' ? 'en' : 'tr';
  $query = $conn->query("SELECT ".$lang."_content FROM static_content WHERE `field_name` = '_about_docu'");
  ?>
        <div id="sidebar" class="col-md-4 order-first">
          <h1><?php echo $language['_layer_documentary']; ?></h1>
          <?php
          while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
           echo '<div id="content">'.$row[$lang.'_content'].'</div>';
            } ?>
        </div>
      </div>
<script>
$('#map_canvas').css("height", $(window).innerHeight() - 80).addClass("col-md-8 position-sticky");
$('#sidebar').css("height", $(window).innerHeight() - 80);

var docudata = 'docu_json.php?lang=<?php echo $lang; ?>';
var documentary = new L.geoJson();
var basetiles = L.tileLayer('<?php echo $tileUrl; ?>',{ maxZoom: 19, minZoom: 5, attribution: '<?php echo $mapAttrib; ?>' });
var map = L.map('map_canvas', {center: [39.01,35.35],zoom: 6,layers: [basetiles]});
var scale = L.control.scale().addTo(map);

$.getJSON(docudata, function (geojson) {
var data = L.geoJson(geojson, {
  pointToLayer: function(feature, latlng) {
      var smallIcon = new L.Icon({
              iconUrl: feature.properties.icon,
              iconSize: [28, 28]
      });
      return L.marker(latlng, {icon: smallIcon});
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties.type == 'panorama' || feature.properties.type == 'video') {
      layer.bindPopup('<a href="#" data-toggle="modal" data-id="'+ feature.properties.id +'" data-type="docu" data-lang="'+ feature.properties.lang +'" data-target="#DetailModal"><p class="popup">' + feature.properties.title + '</p> </a>');
    } else {
      layer.bindPopup('<a href="'+feature.properties.type+'.php?id='+feature.properties.id+'&lang='+feature.properties.lang+'"> <p class="popup">' + feature.properties.title + '</p> </a>');
    }
  }
});
documentary.addLayer(data);
map.fitBounds(documentary.getBounds());

});
map.addLayer(documentary);

</script>
<?php
$conn = null;
}
catch(PDOException $err) {
echo "ERROR: Unable to connect: " . $err->getMessage();
}
require '_foot.inc';
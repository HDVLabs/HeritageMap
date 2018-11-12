<?php require '_head.inc';
?>
<script>
var docudata = 'docu_json.php?story_type=<?php echo $_GET['type'];?>&lang=<?php echo $lang; ?>';
$('#map_canvas').css("height", $(document).height() - 80).addClass("col-md-12");
  var pioneer = L.tileLayer('<?php echo $tileUrl; ?>',{ maxZoom: 19, minZoom: 5, attribution: '<?php echo $mapAttrib; ?>' });
  var map = L.map('map_canvas', {center: [39.01,35.35],zoom: 6,layers: [pioneer]});
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
    }).addTo(map);
    });
</script>
<?php
require '_foot.inc';

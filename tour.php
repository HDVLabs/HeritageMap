<?php require '_head_box.inc';
$id = $_GET['id'];
require '_conn.inc';
$sql = "SELECT lat, lon, bearing, zoom FROM docubase WHERE id = '$id'";
$row = $conn->query($sql)->fetch(); ?>
<div id="loader" class="container-fluid">
  <div class="spinner row justify-content-center align-items-center">
  <div class="bounce1"></div>
  <div class="bounce2"></div>
  <div class="bounce3"></div>
</div>
<script>
var id = <?php echo $_GET['id'];?>;
var lang = '<?php echo $lang; ?>';
$('#map_canvas').css("height", $(window).innerHeight() - 80).addClass("col");
mapboxgl.accessToken = '<?php echo $mapboxToken; ?>';
var map = new mapboxgl.Map({
    container: 'map_canvas',
    style: 'mapbox://styles/mapbox/streets-v9',
    center: [<?php echo $row['lon']; ?>,<?php echo $row['lat']; ?>],
    sprite: "mapbox://sprites/mapbox/bright-v9",
    pitch: 70,
    bearing: <?php echo $row['bearing']; ?>,
    zoom: <?php echo $row['zoom']; ?>
});
  map.on('load', function (e) {
    map.addLayer({
      "id": "route",
      "type": "line",
      "source": {
        "type": "geojson",
        "data": 'tour_route_'+id+'.geojson'
      },
      "layout": {
            "line-join": "round",
            "line-cap": "round"
        },
        "paint": {
            "line-color": "#839fc4",
            "line-width": 4
        }
    });
    map.addLayer({
      "id": "sites",
      "type": "symbol",
      "source": {
        "type": "geojson",
        "data": 'tour_sites_'+id+'.geojson'
      },
      "layout": {
           "icon-image": "marker-15",
           "text-field": "{name}",
           "text-size": 22,
           "text-font": ["Open Sans Semibold", "Arial Unicode MS Bold"],
           "text-offset": [0, -0.1],
           "text-anchor": "bottom"
       },
       "paint": {
                "text-color": "#b96047",
                "text-halo-color": "#efdeaf",
                "text-halo-width": 0.8
      }
    });
    map.on('click', 'sites', function (e) {
        var coordinates = e.features[0].geometry.coordinates.slice();
        var title = (lang == 'tr' ? e.features[0].properties.tr_title : e.features[0].properties.en_title);
        map.flyTo({
          center: coordinates,
          zoom: 17
        });
        var pop = '<a href="#" data-toggle="modal" data-tour_id="'+ id +'" data-id="'+ e.features[0].properties.name +'" data-lang="'+ lang +'" data-target="#DetailModal" data-type="tour" data-name="'+ title +'"><p class="popup">' + title + '</p><p><img src="docu/tours/adana/step'+e.features[0].properties.name+'.jpg" width="220px"> </a>'
        
        while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
            coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
        }
        new mapboxgl.Popup()
            .setLngLat(coordinates)
            .setHTML(pop)
            .addTo(map);
    });
    map.on('mouseenter', 'sites', function () {
        map.getCanvas().style.cursor = 'pointer';
    });
    map.on('mouseleave', 'sites', function () {
        map.getCanvas().style.cursor = '';
    });
    map.on('data', function(e) {
        if (e.dataType === 'source' && e.sourceId === 'sites') {
            document.getElementById("loader").style.visibility = "hidden";
        }
    })
});
</script>
<?php
require '_foot.inc';
<div class="modal fade" id="manual" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body"></div>
   </div>
  </div>
</div>
<div class="container-fluid">
  <div class="spinner row justify-content-center align-items-center">
  <div class="bounce1"></div>
  <div class="bounce2"></div>
  <div class="bounce3"></div>
</div>
<script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=Promise"></script>
<script src="lib/leaflet-bing-layer.min.js"></script>
<script>
var lang = '<?php echo $lang; ?>';
$('#map_canvas').css("height", $(document).height() - 80).addClass("col-md-12");
  var bopti = {
    bingMapsKey: '<?php echo $bingkey; ?>',
    imagerySet: 'CanvasLight',
    culture: '<?php echo $lang; ?>'
  }
  var bsopti = {
    bingMapsKey: '<?php echo $bingkey; ?>',
    imagerySet: 'AerialWithLabelsOnDemand',
    culture: '<?php echo $lang; ?>'
  }
  var basetiles = L.tileLayer.bing(bopti);
  var sattiles = L.tileLayer.bing(bsopti);
  var buildings = L.markerClusterGroup({polygonOptions: {color: '#B8B8B8',weight: 0.5,opacity: 1,fillOpacity: 0.5},spiderfyDistanceMultiplier: 5,showCoverageOnHover: false,disableClusteringAtZoom: 16,spiderfyOnMaxZoom: false});
  var documentary = new L.geoJson();
  var map = L.map('map_canvas', {center: [39.01,35.35],layers: [basetiles]});
  var scale = L.control.scale().addTo(map);
    $.getJSON(geodata, function (geojson) {
    var nom = 0;
    var data = L.geoJson(geojson, {
      pointToLayer: function(feature, latlng) {
          var smallIcon = new L.Icon({
                  iconUrl: feature.properties.icon
          });
          return L.marker(latlng, {icon: smallIcon});
      },
      onEachFeature: function (feature, layer) {
        layer.bindPopup('<a href="#" data-toggle="modal" data-lang="'+lang+'" data-type="site" data-target="#DetailModal" data-id="'+ feature.properties.id+'"><p class="popup">'
          + feature.properties.name + "</p>" + '<img src="' + feature.properties.visual +'" class="img-fluid mx-auto d-block"/>' + "<p class='popup text-center'>" + feature.properties.ethnicity + ", " + feature.properties.type + '</p></a>');
        nom++;
      }
    });
    if (!(data._leaflet_id)) {
      $(".spinner").hide();
      alert('<?php echo $language['_not_found'] ?>');
      window.history.back();
    };
    if (nom == 1) {
      data.eachLayer(function(feature){
        var popup = L.popup()
        .setLatLng(feature._latlng)
        .setContent(feature._popup._content)
        .openOn(map);
        });
    }
    buildings.addLayer(data);
    if (window.location.href.indexOf("inv_id") > -1) {
      var id = '<?php echo $_GET['inv_id'] ?>';
      data.eachLayer(function(feature){
        if(feature.feature.properties.id==id){
          var popup = L.popup()
          .setLatLng(feature._latlng)
          .setContent(feature._popup._content)
          .openOn(map);        }
      });
    }
    map.fitBounds(buildings.getBounds());
    map.options.minZoom = (nom !== 1) ? map.getZoom() : '';
    $(".spinner").hide();
    L.control.custom({
        position: 'topright',
        content : '<span class="badge badge-secondary buno"><?php echo $language['_count'] ?>' + JSON.parse(JSON.stringify(nom)) + '</span>',
    }).addTo(map);
    });
    L.control.custom({
        position: 'topleft',
        content : '<a href="#" data-toggle="modal" data-lang="<?php echo $lang; ?>" data-target="#manual" class="btn btn-large btn-link manual">?</a>',
    }).addTo(map);
    map.addLayer(buildings);
    $.getJSON(docudata, function (geojson) {
    var docdata = L.geoJson(geojson, {
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
    documentary.addLayer(docdata);
    if (window.location.href.indexOf("doc_id") > -1) {
      var id = '<?php echo $_GET['doc_id'] ?>';
      docdata.eachLayer(function(feature){
        if(feature.feature.properties.id==id){
          var popup = L.popup()
          .setLatLng(feature._latlng)
          .setContent(feature._popup._content)
          .openOn(map);
        }
      });
    }
    });
    map.addLayer(documentary);
    var baseMaps = {
        "<?php echo $language['_layer_map']; ?>": basetiles,
        "<?php echo $language['_layer_satellite']; ?>": sattiles
    };
    var overlayMaps = {
        "<?php echo $language['_layer_documentary']; ?>": documentary,
        "<?php echo $language['_layer_cultural_heritage']; ?>": buildings
    };
    L.control.layers(baseMaps, overlayMaps, {
      hideSingleBase:true,
      collapsed:false,
      position: 'topleft'
    }).addTo(map);
  $('#manual').on('show.bs.modal', function (event) {
    $(this).find('.modal-body').load('static.php', { name:'_about_manual', lang:'<?php echo $lang; ?>' }) })
    map.on('click', function(e) {
      $(".leaflet-control-layers").removeClass("leaflet-control-layers-expanded")
      });
</script>

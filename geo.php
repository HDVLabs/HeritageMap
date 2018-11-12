<?php require '_head.inc'; ?>
<script>
        var filtered = '';
        var url_lat = '<?php echo $_GET['lat']?>';
        filtered += 'lat='+url_lat+'&';
        var url_long = '<?php echo $_GET['long']?>';
        filtered += 'long='+url_long+'&';
        var lang = '<?php echo $_GET['lang']?>';
        if (lang != '') {
          filtered += 'lang='+lang+'&';
        }
        var geodata = 'finder.php?'+filtered;
        var docudata = 'docufind.php?'+filtered;
</script>
<?php
require '_map.inc';
?>
<script>

function onLocationFound(e) {
    L.circle(e.latlng, {
    radius: 20,
    color: '#bd6456',
    fillColor: '#34a5d9',
    fillOpacity: 0.5,}).addTo(map);
}
map.on('locationfound', onLocationFound);
map.locate({setView: true, maxZoom: 16});
</script>
<?php
require '_foot.inc';

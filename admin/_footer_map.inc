<?php
include("../mapset.inc");
?>
<script>
var tileLayer = new L.TileLayer('<?php echo $satelliteUrl; ?>');
var map = new L.Map('map', {
  'center': ['<?php echo ($lat > 0 ? $lat : 38.410558); ?>', '<?php echo ($lon > 0 ? $lon : 35.12792); ?>'],
  'zoom': <?php echo ($lat > 0 ? 14 : 5); ?>,
  'scrollWheelZoom': false,
  'layers': [tileLayer]
});
var marker = L.marker(['<?php echo ($lat > 0 ? $lat : 38.410558); ?>', '<?php echo ($lon > 0 ? $lon : 35.12792); ?>'],{
  draggable: true
}).addTo(map);
marker.on('dragend', function (e) {
  document.getElementById('lat').value = marker.getLatLng().lat;
  document.getElementById('lon').value = marker.getLatLng().lng;
});
function updateLatLng(lat,lng,reverse) {
  if(reverse) {
    marker.setLatLng([lat,lng]);
    map.panTo([lat,lng]);
  } else {
  document.getElementById('lat').value = marker.getLatLng().lat;
  document.getElementById('lon').value = marker.getLatLng().lng;
  map.panTo([lat,lng]);
  }
}
$('#lat').focusout(function() {
   updateLatLng(document.getElementById('lat').value,document.getElementById('lon').value,1)
})
$('#lon').focusout(function() {
   updateLatLng(document.getElementById('lat').value,document.getElementById('lon').value,1)
})
</script>

<?php require '_head.inc';
$url = urlencode(serialize($_GET));
?>
<script>
var geodata = 'multijson.php?query=<?php echo $url; ?>';
var docudata = 'multidocu.php?query=<?php echo $url; ?>';
console.log('<?php echo $url; ?>');
</script>
<?php
require '_map.inc';
require '_foot.inc';


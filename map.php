<?php require '_head.inc'; ?>
      </div>
<script>
var geodata = '<?php echo $lang; ?>_cache.json';
var docudata = 'docu_json.php';
</script>
<?php require '_map.inc';
echo "<script>map.removeLayer(documentary);</script>";
require '_foot.inc';

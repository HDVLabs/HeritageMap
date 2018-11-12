<?php require '_head.inc';
?>
<script>
        var filtered = '';
        var docu = '';
        var url_q = '<?php echo (isset($_GET['q'])) ? $_GET['q'] : ''; ?>';
        if (url_q != '') {
          docu += 'q='+url_q+'&';
        }
        var city = '<?php if (isset($_GET['city'])) {
          echo $_GET['city'];} ?>';
        if (city != '') {
          docu += 'city='+city+'&';
        }
        var ethnicity = '<?php if (isset($_GET['ethnicity'])) {
          echo $_GET['ethnicity'];} ?>';
        if (ethnicity != '') {
          filtered += 'en_ethnicity='+ethnicity+'&';
        }
        var type = '<?php if (isset($_GET['type'])) {
          echo $_GET['type'];} ?>';
        if (type != '') {
          filtered += 'en_building_type='+type+'&';
        }
        var lang = '<?php if (isset($_GET['lang'])) {
          echo $_GET['lang'];} ?>';
        if (lang != '') {
          docu += 'lang='+lang+'&';
        }
var geodata = 'jason_bull.php?'+docu+filtered;
var docudata = 'docu_json.php?'+docu;
</script>
<?php
require '_map.inc';
require '_foot.inc';

<?php require '_head.inc'; ?>
      </div>
<script>
var geodata = '<?php echo $lang; ?>_cache.json';
var docudata = 'docu_json.php';
</script>
<?php require '_map.inc';
require '_conn.inc';
try {
  $sql = "SELECT inv_id, name, city, Visual_1 FROM envanter WHERE featured = '1'";
  $docs = "SELECT id, tr_title, en_title, story_type, city, url FROM docubase WHERE featured = '1'";
  echo "<script>\n";
  foreach ($conn->query($sql) as $row) { ?>
    var id_<?php echo $row['inv_id']; ?> = L.control.custom({
        id : 'id_<?php echo $row['inv_id']; ?>',
        position: 'bottomright',
        content : '<div class="card" style="width: 18rem;">'+
          '<div class="card-body">'+
            '<h5 class="card-title"><a href="search.php?city=<?php echo $row['city']; ?>&inv_id=<?php echo $row['inv_id']; ?>"><?php echo $row['name']; ?></a>'+
            '<button type="button" id="<?php echo $row['inv_id']; ?>" class="close" aria-label="Close">'+
              '<span aria-hidden="true">&times;</span>'+
            '</button></h5>'+
            '<p class="card-text text-center"><a href="search.php?q=<?php echo $row['inv_id']; ?>"><img class="img-fluid vitrin" src="site_images/<?php echo $row['Visual_1']; ?>"/></a></p>'+
          '</div>'+
        '</div>'
    })
    .addTo(map);
  <?php }
  foreach ($conn->query($docs) as $doc) {
    if ($doc['story_type'] == 'video') {
      $source = '<div class="embed-responsive embed-responsive-16by9">'.$doc['url'].'</div>';
    } elseif ($doc['story_type'] == 'panorama') {
      $source = '<img class="img-fluid vitrin" src="docu/360/'.$doc['url'].'"/>';
    } else {
      $source = '<img class="img-fluid vitrin" src="docu/vitrin/'.$doc['url'].'"/>';
    }
    ?>
    var id_<?php echo $doc['id']; ?> = L.control.custom({
        id : 'id_<?php echo $doc['id']; ?>',
        position: 'bottomright',
        content : '<div class="card" style="width: 18rem;">'+
          '<div class="card-body">'+
            '<h5 class="card-title <?php echo $doc['story_type']; ?>"><a href="search.php?q=&city=<?php echo $doc['city']; ?>&doc_id=<?php echo $doc['id']; ?>&lang=<?php echo $lang; ?>"><?php echo addslashes($doc[$lang.'_title']) .", (" .$doc['city'] . ")" . '\n'; ?>
            </a>'+
            '<button type="button" id="id_<?php echo $doc['id']; ?>" class="close" aria-label="Close">'+
              '<span aria-hidden="true">&times;</span></h5>'+
            '</button>'+
            '<p class="card-text text-center"><a href="search.php?q=&city=<?php echo $doc['city']; ?>&doc_id=<?php echo $doc['id']; ?>&lang=<?php echo $lang; ?>">'+
              '<?php echo $source; ?>'+
              '</a></p>'+
          '</div>'+
        '</div>'
    })
    .addTo(map);
  <?php }
  echo "</script>";
$conn = null;
}
catch(PDOException $err) {
echo "ERROR: Unable to connect: " . $err->getMessage();
}
?>
<script>
$('.close').click(function(e) {
  var vitrintogo = document.querySelector('#'+this.id);
  vitrintogo.parentNode.removeChild(vitrintogo);
});
</script>
<?php
require '_foot.inc';

  </div>
</div>
<div class="modal fade" id="DetailModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body"></div>
   </div>
  </div>
</div>
<script src="lib/jquery.query-object.js"></script>
<script>
function changeLang() {
  var lang = '<?php echo $lang; ?>';
  var newLang = (lang == 'tr') ? 'en' : 'tr';
  window.location.search = jQuery.query.set("lang", newLang);
}
$('#DetailModal').on('hidden.bs.modal', function(){
    $(".modal-body").html("");
});
$('#DetailModal').on('show.bs.modal', function (event) {
  var catchy = $(event.relatedTarget)
  var id = catchy.data('id')
  var type = catchy.data('type')
  var tid = catchy.data('tour_id')
  var lang = catchy.data('lang')
  var modal = $(this)
  modal.find('.modal-body').load(type+'_info.php', {tid:tid, id:id, lang:lang })
})
</script>
</body>
</html>

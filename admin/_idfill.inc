<script>
$('#inv_id').focusout(function() {
    var numberValue = this.value;
    var url = "query_id.php?id=" + numberValue;
    $.get( url, function( data ) {
      $("#city").val( data.city );
      $("#tr_title").val( data.name );
      $("#county").val( data.county );
      $("#county_old_name").val( data.county_old_name );
      $("#village").val( data.village );
      $("#village_old_name").val( data.village_old_name );
      $("#lat").val( data.lat );
      $("#lon").val( data.lon );
      updateLatLng(data.lat,data.lon,1);
    });
})
</script>

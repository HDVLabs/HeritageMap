<div id="panorama"></div>
<script>
$('#panorama').css("height", $(document).height() - 120);
pannellum.viewer('panorama', {
    "type": "equirectangular",
    "panorama": "./docu/360/<?php echo $row['url']; ?>",
    //"autoLoad": true
});
</script>

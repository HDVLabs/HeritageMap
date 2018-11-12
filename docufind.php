<?php
  $where = "WHERE `lat` LIKE '%{$_GET['lat']}%' AND `lon` LIKE '%{$_GET['long']}%' AND `visible` = '1'";

  if(isset($_GET['lang'])){
  	$language = $_GET['lang'];
  }
  else
    $language = 'tr';

include '_jsonifydocu.inc';
?>
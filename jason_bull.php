<?php

  $where = "WHERE ";
  if(isset($_GET['lang'])){
  	$language = $_GET['lang'];
    unset($_GET['lang']);
  }
  else
    $language = 'tr';
  if(isset($_GET['q']))
  {
    $where .= "(city LIKE '%{$_GET['q']}%'
        OR inv_id LIKE '%{$_GET['q']}%'
        OR name LIKE '%{$_GET['q']}%'
        OR also_known LIKE '%{$_GET['q']}%'
        OR county LIKE '%{$_GET['q']}%'
        OR county_old_name LIKE '%{$_GET['q']}%'
        OR village LIKE '%{$_GET['q']}%'
        OR village_old_name LIKE '%{$_GET['q']}%') AND";
    unset($_GET['q']);
    foreach ($_GET as $key => $value):
      $where .= " $key='$value' AND";
    endforeach;
  }
  else {
      foreach ($_GET as $key => $value)
        $where .= "$key='$value' AND ";
  }
  $where .= " visible = '1'";
  require '_jsonify.inc';
?>

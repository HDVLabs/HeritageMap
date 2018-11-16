<?php
$where = "WHERE";
$get = unserialize(urldecode($_GET['query']));
  if(isset($get['lang'])){
  	$language = $get['lang'];
    unset($get['lang']);
  }
  else
    $language = 'tr';
  if($get['q'] != '')
  {
    $where .= "(city LIKE '%{$get['q']}%'
        OR inv_id LIKE '%{$get['q']}%'
        OR name LIKE '%{$get['q']}%'
        OR also_known LIKE '%{$get['q']}%'
        OR county LIKE '%{$get['q']}%'
        OR county_old_name LIKE '%{$get['q']}%'
        OR village LIKE '%{$get['q']}%'
        OR village_old_name LIKE '%{$get['q']}%') AND";
    unset($get['q']);
  }
  else {
  unset($get['q']);
  }
  foreach ($get as $key => $value):
    $list = "'" . implode("','", $value) . "'";

    $where .= " `$key` IN ($list) AND";
  endforeach;
  $where .= " visible = '1'";
 require '_jsonify.inc';
?>

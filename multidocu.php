<?php
$where = "WHERE";
$get = unserialize(urldecode($_GET['query']));
$city = $get['city'];
  if(isset($get['lang'])){
  	$language = $get['lang'];
    unset($get['lang']);
  }
  else
    $language = 'tr';
  if($get['q'] != '')
  {
    $where .= "(city LIKE '%{$get['q']}%'
    OR tr_title LIKE '%{$get['q']}%'
    OR en_title LIKE '%{$get['q']}%'
    OR county LIKE '%{$get['q']}%'
    OR county_old_name LIKE '%{$get['q']}%'
    OR village LIKE '%{$get['q']}%'
    OR village_old_name LIKE '%{$get['q']}%') AND";
    unset($get['q']);
  }
  if($city != '')
  {
      $list = "'" . implode("','", $city) . "'";
      $where .= " `city` IN ($list) AND";
  }
  $where .= " visible = '1'";
  echo $where;
//  require '_jsonifydocu.inc';
?>

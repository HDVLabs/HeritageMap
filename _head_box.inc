<?php $lang = (isset($_GET['lang'])) ? $_GET['lang'] : 'tr';
require_once("lang.".$lang.".inc");
include("lib/securityCheck.php");
include("mapset.inc");
?>
<!doctype html>
<html lang="<?php echo $lang; ?>">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title><?php echo $language['page_title']; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.js'></script>
      <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.css' rel='stylesheet' />
     <script src="lib/jquery-3.3.1.min.js"></script>
     <script src="lib/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <?php include '_nav.inc'; ?>
    <div class="container-fluid">
      <div class="row">
        <div id="map_canvas"><noscript><div class="p-5"><?php echo $language['_noscript'] ?></div></noscript></div>

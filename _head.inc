<?php $lang = (isset($_GET['lang'])) ? $_GET['lang'] : 'tr' ;
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
      <link rel="stylesheet" type="text/css" href="css/leaflet.css">
      <link rel="stylesheet" type="text/css" href="css/pannellum.css">
     <script src="lib/leaflet.js"></script>
     <script src="lib/pannellum.js"></script>
     <script src="lib/jquery-3.3.1.min.js"></script>
     <script src="lib/leaflet.markercluster.js"></script>
     <script src="lib/leaflet.custom.control.js"></script>
     <script src="lib/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <?php include '_nav.inc'; ?>
    <div class="container-fluid">
      <div class="row">
        <div id="map_canvas"><noscript><div class="p-5"><?php echo $language['_noscript'] ?></div></noscript></div>

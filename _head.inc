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
    <meta name="Description" content="<?php echo $language['page_desc']; ?>">
    <title><?php echo $language['page_title']; ?></title>
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="<?php echo $language['_twitter']; ?>">
    <meta name="twitter:creator" content="Hrant Dink Vakfı">
    <meta name="twitter:title" content="<?php echo $language['page_title']; ?>">
    <meta name="twitter:description" content="<?php echo $language['page_desc']; ?>">
    <meta name="twitter:image" content="https://hrantdink.org/images/KM/haritadan/06112018_kvharita_800.jpg">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <meta property="og:title" content="<?php echo $language['page_title']; ?>" />
    <meta property="og:image" content="https://hrantdink.org/images/KM/haritadan/06112018_kvharita_800.jpg" />
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="css/leaflet.css">
     <script src="lib/leaflet.js"></script>
     <script src="lib/jquery-3.3.1.min.js"></script>
     <script src="lib/leaflet.markercluster.js"></script>
     <script src="lib/leaflet.custom.control.js"></script>
     <script src="lib/bootstrap.bundle.min.js"></script>
     <script>
       var _paq = _paq || [];
       _paq.push(['trackPageView']);
       _paq.push(['enableLinkTracking']);
       (function() {
         var u="//turkiyekulturvarliklari.hrantdink.org/stats/";
         _paq.push(['setTrackerUrl', u+'piwik.php']);
         _paq.push(['setSiteId', '1']);
         var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
         g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(
     g,s);
       })();
     </script>
  </head>
  <body>
    <?php include '_nav.inc'; ?>
    <div class="container-fluid">
      <div class="row">
        <div id="map_canvas"><noscript><div class="p-5"><?php echo $language['_noscript'] ?></div></noscript></div>

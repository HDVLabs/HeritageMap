<!doctype html>
<html lang="tr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Müdüriyet</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/leaflet.css">
    <link rel="stylesheet" type="text/css" href="../css/pannellum.css">
    <script src="../lib/pannellum.js"></script>
    <script src="../lib/jquery-3.3.1.min.js"></script>
    <script src="../lib/leaflet.js"></script>
     <style>
      #map,
      #panorama {height: 300px;}
     </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="./">Veritabanı Müdüriyet</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#admin_menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="admin_menu">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="fieldDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Envanter Yapıları
            </a>
            <div class="dropdown-menu" aria-labelledby="fieldDropDown">
              <a class="dropdown-item" href="insert_building.php">Yeni Yapı Ekle</a>
              <a class="dropdown-item" href="find_building.php">Yapı Bul/Düzenle</a>
            </div>
          </li>
          <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="fieldDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Belgesel Parçaları
             </a>
             <div class="dropdown-menu" aria-labelledby="fieldDropDown">
               <a class="dropdown-item" href="insert_tur.php">Yeni Tur Ekle</a>
               <a class="dropdown-item" href="insert_story.php">Hikâye Ekle</a>
               <a class="dropdown-item" href="insert_video.php">Video Ekle</a>
               <a class="dropdown-item" href="insert_panorama.php">Panorama Ekle</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="list_panoramas.php">Panoramaları Listele</a>
               <a class="dropdown-item" href="list_docu_items.php">Diğerlerini Listele</a>
             </div>
           </li>
          <li class="nav-item">
              <a class="nav-link" href="edit_static.php">Site Metinlerini Düzenle</a>
          </li>
          <li class="nav-item float-right">
               <a class="nav-link" href="../" target="_blank" rel="noopener noreferrer">Haritaya Git</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid">
      <main role="main" class="px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

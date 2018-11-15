<nav class="navbar navbar-expand-md navbar-light bg-light">
  <a class="navbar-brand" href="index.php?lang=<?php echo $lang; ?>">
    <img src="img/logo.png" alt="Hrant Dink Vakfı/Foundation logo">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <button class="nav-item btn btn-outline-light btn-sm" type="submit" onclick="geoFindMe()">
      <?php echo $language["_find_me"]; ?>
    </button>
    <div class="nav-item dropdown">
       <a class="nav-link dropdown-toggle" href="#" id="ChooseLayer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php echo $language["_about_map"]; ?>
       </a>
       <div class="dropdown-menu" aria-labelledby="mapDropDown">
         <a class="dropdown-item" href="map.php?lang=<?php echo $lang; ?>">
            <?php echo $language["_layer_cultural_heritage"]; ?>
         </a>
         <a class="dropdown-item" href="documentary.php?lang=<?php echo $lang; ?>">
            <?php echo $language["_layer_documentary"]; ?></a>
       </div>
     </div>
  <div class="collapse navbar-collapse" id="navbarToggler">
    <ul class="navbar-nav nav-fill ml-auto mt-2 mt-lg-0">
      <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" id="mapDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <?php echo $language["_about"]; ?>
         </a>
         <div class="dropdown-menu" aria-labelledby="mapDropDown">
           <a class="dropdown-item" href="#" data-toggle="modal" data-lang="<?php echo $lang; ?>" data-target="#staticContent" data-name="_about_map"><?php echo $language["_about_map"]; ?></a>
           <a class="dropdown-item" href="#" data-toggle="modal" data-lang="<?php echo $lang; ?>" data-target="#staticContent" data-name="_about_credits"><?php echo $language["_about_credits"]; ?></a>
           <a class="dropdown-item" href="#" data-toggle="modal" data-lang="<?php echo $lang; ?>" data-target="#staticContent" data-name="_research_method"><?php echo $language["_about_method"]; ?></a>
           <a class="dropdown-item" href="#" data-toggle="modal" data-lang="<?php echo $lang; ?>" data-target="#staticContent" data-name="_research_biblio"><?php echo $language["_about_biblio"]; ?></a>
         </div>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#" data-toggle="modal" data-lang="<?php echo $lang; ?>" data-target="#staticContent" data-name="_contribute"><?php echo $language["_contact_form"]; ?></a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#" data-toggle="modal" data-lang="<?php echo $lang; ?>" data-target="#staticContent" data-name="_contact"><?php echo $language["_contact"]; ?></a>
       </li>
       <li class="nav-item px-3 align-self-center">
      <form class="form-inline justify-content-center" id="arama" method="get" action="search.php">
        <input class="form-control form-control-sm" type="search" id="basic_search" name="q" aria-label="Search" placeholder="<?php echo $language["_placeholder"]; ?>" autocomplete="off">
        <div class="btn-group">
          <button class="btn btn-outline-light btn-sm" type="submit">
            <?php echo $language["_search_button"]; ?>
          </button>
        <button id="filtertoggle" type="button" class="btn  btn-sm btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only"><?php echo $language["_search_options"]; ?></span>
        </button>
          <div id="search_filter" class="dropdown-menu" aria-labelledby="filtertoggle">
            <div class="p-3">
              <select name="city" class="custom-select form-control form-control-sm">
                <option value=""><?php echo $language["_city_label"]; ?></option>';
                  <?php include '_city.inc'; ?>
              </select>
              <select name="ethnicity" class="custom-select form-control form-control-sm">
                <option value=""><?php echo $language["_ethnicity_label"]; ?></option>';
              <?php include '_ethnicity.inc'; ?>
              </select>
              <select name="type" class="form-control form-control-sm custom-select">
                <option value=""><?php echo $language["_type_label"]; ?></option>
                <?php include '_type.inc'; ?>
              </select>
              <input type='hidden' name='lang' value='<?php echo "$lang";?>'/>
            </div>
          </div>
        </div>
      </form>
    </li>
  </ul>
  </div>

  <span class="nav-item align-self-center py-2">
    <a href="#" onclick="changeLang()" <?php echo ($lang == 'tr') ? ' class="langlink"' : ''; ?>>TR</a> |
    <a href="#" onclick="changeLang()" <?php echo ($lang == 'en') ? ' class="langlink"' : ''; ?>>ENG</a>
  </span>
  <span class="mx-2">
  <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>" target="_blank" rel="noopener noreferrer"><img src="img/facebook.svg" title="<?php echo $language['_share_facebook']; ?>" alt="facebook logo"/></a>
</span><span>
  <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>" target="_blank" rel="noopener noreferrer"><img src="img/twitter.svg" title="<?php echo $language['_share_twitter']; ?>" alt="twitter logo"/></a>
</span>
</nav>
<div class="modal fade" id="staticContent" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body"></div>
   </div>
  </div>
</div>
<script>
$('#staticContent').on('hidden.bs.modal', function(){
    $(".modal-body").html("");
});
$('#staticContent').on('show.bs.modal', function (event) {
var tar = $(event.relatedTarget)
var name = tar.data('name')
var lang = tar.data('lang')
$(this).find('.modal-body').load('static.php', { name:name, lang:lang }) })
$('#search_filter select').click(function(e) {
        e.stopPropagation();
    });
$("#basic_search").on("click", function() {
  $("#search_filter").toggle();
});
$("#filtertoggle").on("click", function() {
  $("#search_filter").toggle();
});
function geoFindMe() {
  if (!navigator.geolocation){
    var nosupport = "Geolocation is not supported by your browser (or you haven't give permission to access gps) / Tarayıcınız konum bilgisi aktarmayı desteklemiyor (ya da gps kullanma izni vermemiş olabilirsiniz)";
    window.alert(nosupport);
    return;
  }
  var lang = '<?php echo $lang; ?>';
  function success(position) {
    var latitude  = position.coords.latitude;
    var longitude = position.coords.longitude;
    window.location="geo.php?lat=" + latitude.toString().substring(0,4) + "&long=" + longitude.toString().substring(0,4) + "&lang="+ lang +"";
        return true;
  }

  function error() {
    var error = "Konum bilgisi alınamadı / Unable to get geolocation info"
    window.alert(error);
  }
  navigator.geolocation.getCurrentPosition(success, error);
}
</script>

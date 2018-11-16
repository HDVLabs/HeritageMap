<?php
$lang = (isset($_GET['lang'])) ? $_GET['lang'] : 'tr';
  require '_conn.inc';
  include 'lang.'.$lang.'.inc';
?>
<link rel="stylesheet" type="text/css" href="css/selectize.legacy.css">
<script src="lib/selectize.min.js"></script>
<div class="container">
  <h1><?php echo $language['_adv_search_title']; ?></h1>
    <form method="get" action="adv_search.php">
      <div class="form-group">
        <input class="form-control" type="search" id="adv_search" name="q" aria-label="Search" placeholder="<?php echo $language["_placeholder"]; ?>" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="city" class="col-form-label pr-2"><?php echo $language['_adv_city']; ?></label>
        <select id="select-tools" name="city[]"></select>
      </div>
      <div class="form-group">
      <label for="en_ethnicity" class="col-form-label pr-2"><?php echo $language['_adv_ethnicity']; ?></label>
        <div class="form-row px-3">
          <?php
          $query = $conn->query("SELECT DISTINCT tr_ethnicity, en_ethnicity FROM envanter WHERE ".$lang."_ethnicity NOT IN ('', 'Misyoner', '')");
          while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
           echo '<div class="form-check form-check-inline">
           <input class="form-check-input" type="checkbox" id="'.$row['en_ethnicity'].'" name="en_ethnicity[]" value="'.$row['en_ethnicity'].'">
           <label class="form-check-label" for="'.$row['en_ethnicity'].'">'.$row[$lang.'_ethnicity'].'</label>
           </div>';
          }; ?>
        </div>
      </div>
      <div class="form-group">
      <label for="en_building_type" class="col-form-label pr-2"><?php echo $language['_adv_type']; ?></label>
        <div class="form-row px-3">
          <?php
          $query = $conn->query("SELECT DISTINCT tr_building_type, en_building_type FROM envanter WHERE ".$lang."_building_type NOT IN ('', 'Huzurevi', 'Diğer', 'Fakirhane', 'Tapınak', 'Nursing Home', 'Other', 'Shelter', 'Temple', '')");
          while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
           echo '<div class="form-check form-check-inline">
           <input class="form-check-input" type="checkbox" id="'.$row['en_building_type'].'" name="en_building_type[]" value="'.$row['en_building_type'].'">
           <label class="form-check-label" for="'.$row['en_building_type'].'">'.$row[$lang.'_building_type'].'</label>
           </div>';
          }; ?>
        </div>
      </div>

    <button type="submit" class="btn btn-primary text-light"><?php echo $language['_search_button']; ?></button>
    </form>
</div>
<script>
$('#select-tools').selectize({
    maxItems: null,
    valueField: 'city',
    labelField: 'city',
    searchField: 'city',
    options: [
      <?php $city = "SELECT DISTINCT city FROM envanter";
        foreach ($conn->query($city) as $row) {
            echo "{city: '".$row['city']."'},\n";
        } ?>
    ],
    create: false
});
</script>
<?php
require '_foot.inc';
<?php
  require '_header.inc';
  include '../lang.tr.inc';
  require '_conn.inc';
  if (isset($_POST['visible'])) {
    $visible = '1';
  } else {
    $visible = '0';
  }
  if (isset($_POST['featured'])) {
    $featured = '1';
  } else {
    $featured = '0';
  }

  if (isset($_POST['tr_ethnicity'])) {
    if ($_POST['tr_ethnicity'] == 'Ermeni') {
      $en_ethnicity = 'Armenian';
    } elseif ($_POST['tr_ethnicity'] == 'Rum') {
      $en_ethnicity = 'Greek';
    } elseif ($_POST['tr_ethnicity'] == 'Yahudi') {
      $en_ethnicity = 'Jewish';
    } elseif ($_POST['tr_ethnicity'] == 'Süryani') {
      $en_ethnicity = 'Syriac';
    }
  } else {
    $en_ethnicity = null;
  }

  if (isset($_POST['tr_denomination'])) {
    if ($_POST['tr_denomination'] == 'Katolik') {
      $en_denomination = 'Catholic';
    } elseif ($_POST['tr_denomination'] == 'Ortodoks') {
      $en_denomination = 'Orthodox';
    } elseif ($_POST['tr_denomination'] == 'Apostolik') {
      $en_denomination = 'Apostolic';
    } elseif ($_POST['tr_denomination'] == 'Protestan') {
      $en_denomination = 'Protestant';
    } elseif ($_POST['tr_denomination'] == 'Nasturi') {
      $en_denomination = 'Nestorian';
    } elseif ($_POST['tr_denomination'] == 'Keldani') {
      $en_denomination = 'Chaldean';
    }
  } else {
    $en_denomination = null;
  }

  if (isset($_POST['tr_building_type'])) {
    if ($_POST['tr_building_type'] == 'Mezarlık') {
      $en_building_type = 'Cemetery';
    } elseif ($_POST['tr_building_type'] == 'Şapel') {
      $en_building_type = 'Chapel';
    } elseif ($_POST['tr_building_type'] == 'Kilise') {
      $en_building_type = 'Church';
    } elseif ($_POST['tr_building_type'] == 'Hastane') {
      $en_building_type = 'Hospital';
    } elseif ($_POST['tr_building_type'] == 'Manastır') {
      $en_building_type = 'Monastery';
    } elseif ($_POST['tr_building_type'] == 'Yetimhane') {
      $en_building_type = 'Orphanage';
    } elseif ($_POST['tr_building_type'] == 'Okul') {
      $en_building_type = 'School';
    } elseif ($_POST['tr_building_type'] == 'Sinagog') {
      $en_building_type = 'Synagogue';
    }
  } else {
    $en_building_type = null;
  }

  try {
   $sql = "UPDATE `envanter`
   SET `visible` = :visible,
   `featured` = :featured,
   `name` = :name,
   `also_known` = :also_known,
   `tr_ethnicity` = :tr_ethnicity,
   `en_ethnicity` = :en_ethnicity,
   `tr_denomination` = :tr_denomination,
   `en_denomination` = :en_denomination,
   `city` = :city,
   `county` = :county,
   `county_old_name` = :county_old_name,
   `village` = :village,
   `village_old_name` = :village_old_name,
   `tr_building_type` = :tr_building_type,
   `en_building_type` = :en_building_type,
   `building_date` = :building_date,
   `building_date_century` = :building_date_century,
   `abondonce_date` = :abondonce_date,
   `abondonce_date_century` = :abondonce_date_century,
   `tr_historical_note` = :tr_historical_note,
   `en_historical_note` = :en_historical_note,
   `footnote` = :footnote,
   `lat` = :lat,
   `lon` = :lon,
   `rec_lat` = :rec_lat,
   `rec_lon` = :rec_lon,
   `ada` = :ada,
   `pafta` = :pafta,
   `parsel` = :parsel,
   `access` = :access,
   `ownership` = :ownership,
   `ownership_note` = :ownership_note,
   `registration_date` = :registration_date,
   `date_of_inspection` = :date_of_inspection,
   `actual_status` = :actual_status,
   `phsyical_and_social_evaluation` = :phsyical_and_social_evaluation,
   `notes` = :notes,
   `Visual_1` = :Visual_1,
   `Visual_2` = :Visual_2,
   `Visual_3` = :Visual_3,
   `visual_date_1` = :visual_date_1,
   `visual_date_2` = :visual_date_2,
   `visual_date_3` = :visual_date_3,
   `visual_references_1` = :visual_references_1,
   `visual_references_2` = :visual_references_2,
   `visual_references_3` = :visual_references_3,
   `external_links` = :external_links
   WHERE `inv_id` = :inv_id";

   $statement = $conn->prepare($sql);
   $statement->bindValue(":abondonce_date", $_POST['abondonce_date']);
   $statement->bindValue(":abondonce_date_century", $_POST['abondonce_date_century']);
   $statement->bindValue(":access", $_POST['access']);
   $statement->bindValue(":actual_status", $_POST['actual_status']);
   $statement->bindValue(":ada", $_POST['ada']);
   $statement->bindValue(":building_date", $_POST['building_date']);
   $statement->bindValue(":building_date_century", $_POST['building_date_century']);
   $statement->bindValue(":city", $_POST['city']);
   $statement->bindValue(":county", $_POST['county']);
   $statement->bindValue(":county_old_name", $_POST['county_old_name']);
   $statement->bindValue(":date_of_inspection", $_POST['date_of_inspection']);
   $statement->bindValue(":external_links", $_POST['external_links']);
   $statement->bindValue(":footnote", $_POST['footnote']);
   $statement->bindValue(":tr_historical_note", $_POST['tr_historical_note']);
   $statement->bindValue(":en_historical_note", $_POST['en_historical_note']);
   $statement->bindValue(":inv_id", $_POST['inv_id']);
   $statement->bindValue(":also_known", $_POST['also_known']);
   $statement->bindValue(":lat", $_POST['lat']);
   $statement->bindValue(":lon", $_POST['lon']);
   $statement->bindValue(":name", $_POST['name']);
   $statement->bindValue(":notes", $_POST['notes']);
   $statement->bindValue(":ownership", $_POST['ownership']);
   $statement->bindValue(":ownership_note", $_POST['ownership_note']);
   $statement->bindValue(":pafta", $_POST['pafta']);
   $statement->bindValue(":parsel", $_POST['parsel']);
   $statement->bindValue(":phsyical_and_social_evaluation", $_POST['phsyical_and_social_evaluation']);
   $statement->bindValue(":rec_lat", $_POST['rec_lat']);
   $statement->bindValue(":rec_lon", $_POST['rec_lon']);
   $statement->bindValue(":registration_date", $_POST['registration_date']);
   $statement->bindValue(":tr_building_type", $_POST['tr_building_type']);
   $statement->bindValue(":tr_denomination", $_POST['tr_denomination']);
   $statement->bindValue(":tr_ethnicity", $_POST['tr_ethnicity']);
   $statement->bindValue(":village", $_POST['village']);
   $statement->bindValue(":village_old_name", $_POST['village_old_name']);
   $statement->bindValue(":visible", $visible);
   $statement->bindValue(":featured", $featured);   
   $statement->bindValue(":Visual_1", $_POST['Visual_1']);
   $statement->bindValue(":Visual_2", $_POST['Visual_2']);
   $statement->bindValue(":Visual_3", $_POST['Visual_3']);
   $statement->bindValue(":visual_date_1", $_POST['visual_date_1']);
   $statement->bindValue(":visual_date_2", $_POST['visual_date_2']);
   $statement->bindValue(":visual_date_3", $_POST['visual_date_3']);
   $statement->bindValue(":visual_references_1", $_POST['visual_references_1']);
   $statement->bindValue(":visual_references_2", $_POST['visual_references_2']);
   $statement->bindValue(":visual_references_3", $_POST['visual_references_3']);
   $statement->bindValue(":en_ethnicity", $en_ethnicity);
   $statement->bindValue(":en_denomination", $en_denomination);
   $statement->bindValue(":en_building_type", $en_building_type);
   $count = $statement->execute();

    $conn = null;        // Disconnect
  }
  catch(PDOException $e) {
    echo $e->getMessage();
  }
?>
<h1>Yapı Güncellendi</h1>
</div><div>
  Kontrol etmek için <a href="update_building.php?inv_id=<?php echo $_POST['inv_id']; ?>">tıklayın</a>

<?php require '_footer.inc'; ?>
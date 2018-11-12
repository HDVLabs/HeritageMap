<?php
  require '_header.inc';
  include '../lang.tr.inc';
  require '_conn.inc';
  $lang = 'tr';
  if (isset($_GET['id'])) {
      $id = $_GET['id'];
  } else {
    echo "Geçerli bir ID girilmedi. Lütfen <a href='list_docu.php'>buradan seçin</a>";
    die;
  }

  $bldng = $conn->prepare("SELECT * FROM docubase WHERE id = '$id'");
  $bldng->execute();
  $row = $bldng->fetch();
?>
    <div class="col-md-12">
      <form method="post" action="save_the_docu.php">
        <input type='hidden' name='url' value='<?php echo $row['url']; ?>'/>
        <input type='hidden' name='id' value='<?php echo $id; ?>'/>
        <input type='hidden' name='story_type' value='<?php echo $row['story_type']; ?>'/>
      <h1>Tur güncelle
        <small class="float-sm-right">
        <a href="generate_tour.php?id=<?php echo $id; ?>" type="submit" class="btn btn-outline-info">Harita üret</a>
        <?php
          if ($row['featured'] == '1') {
            echo '<input id="feat" type="checkbox" name="featured" class="mx-1" checked>&nbsp;';
          } else {
            echo '<input id="feat" type="checkbox" name="featured">&nbsp;';
          }
          if ($row['visible'] == '1') {
            echo '<input id="vis" type="checkbox" name="visible" checked>';
          } else {
            echo '<input id="vis" type="checkbox" name="visible">';
          }
        ?>
        <button type="submit" class="btn btn-primary">Kaydet</button>
      </small>
      </h1>
        <div class="form-row border-top  py-2 my-2">
          <div class="col-md-2">
            <label for="city" class="col-form-label pr-2">Bulunduğu Şehir</label>
            <select class="form-control" name="city">
              <?php
              $query = $conn->query("SELECT DISTINCT `city` FROM docubase WHERE `city` != ''");
              while ($ethnic = $query->fetch()) {
                if ($row['city'] == $ethnic['city']) {
                  echo '<option SELECTED value="'.$ethnic['city'].'">'.$ethnic['city'].'</option>';
                  } else {
                  echo '<option value="'.$ethnic['city'].'">'.$ethnic['city'].'</option>';
                  }
                };
               ?>
            </select>
          </div>
          <div class="col-md-3">
            <label for="name" class="col-form-label pr-2">Başlık</label>
            <input type="text" class="form-control" name="tr_title" value="<?php echo $row['tr_title']; ?>">
          </div>
          <div class="col-md-3">
            <label for="name" class="col-form-label pr-2">Title (English)</label>
            <input type="text" class="form-control" name="en_title" value="<?php echo $row['en_title']; ?>">
          </div>
          <div class="col-md-2">
            <label for="lat" class="col-form-label pr-2">Enlem (lat)</label>
            <?php $lat = $row['lat'];
              echo "<input id='lat' type='text' class='form-control' name='lat' value=".$row['lat'].">"; ?>
          </div>
          <div class="col-md-2">
            <label for="lon" class="col-form-label pr-2">Boylam (lon)</label>
            <?php $lon = $row['lon'];
              echo "<input id='lon' type='text' class='form-control' name='lon' value=".$row['lon'].">"; ?>
          </div>
        </div>
        <div class="form-row py-2 my-2">
          <div class="col-md-2">
            <label for="county" class="col-form-label pr-2">Bulunduğu İlçe</label>
            <input type="text" class="form-control" name="county" value="<?php echo $row['county']; ?>">
          </div>
          <div class="col-md-2">
            <label for="county_old_name" class="col-form-label pr-2">İlçenin Eski Adı (Varsa)</label>
            <input type="text" class="form-control" name="county_old_name" value="<?php echo $row['county_old_name']; ?>">
          </div>
          <div class="col-md-2">
            <label for="village" class="col-form-label pr-2">Bulunduğu Köy</label>
            <input type="text" class="form-control" name="village" value="<?php echo $row['village']; ?>">
          </div>
          <div class="col-md-2">
            <label for="village_old_name" class="col-form-label pr-2">Köyün Eski Adı (varsa)</label>
            <input type="text" class="form-control" name="village_old_name" value="<?php echo $row['village_old_name']; ?>">
          </div>
          <div class="col-md-1">
            <label for="bearing" class="col-form-label pr-2">bearing</label>
            <input type="text" class="form-control" id="bearing" name="bearing" value="-80">
          </div>
          <div class="col-md-1">
            <label for="zoom" class="col-form-label pr-2">zoom</label>
            <input type="text" class="form-control" id="zoom" name="zoom" value="15">
          </div>
          <div class="col-md-2">
            <label for="url" class="col-form-label pr-2">Dosya adı (docu/vitrin)</label>
            <input type="text" class="form-control" name="url" value="<?php echo $row['url']; ?>" data-toggle="tooltip" data-html="true" title="<img src='../docu/vitrin/<?php echo $row['url']; ?>' class='img-fluid'>">
          </div>
        </div>
        <div class="form-row py-2 my-2">
          <?php
            $sql = "SELECT * FROM toursteps WHERE tour_id = '$id' ORDER BY step ASC";
          ?>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Durak</th>
                <th scope="col">Görünür</th>
                <th scope="col">Başlık</th>
                <th scope="col">Title (eng)</th>
                <th scope="col"><a class="btn btn-info" href="insert_step.php?id=<?php echo $id; ?>">Durak Ekle</a></th>
              </tr>
            </thead>
            <tbody>
          <?php
          try {
                foreach ($conn->query($sql) as $row) { ?>
                      <tr>
                        <th scope="row">
                          <a href="update_step.php?id=<?php echo $row['id'];?>">
                          <?php echo $row['step']; ?></a>
                        </th>
                        <td><?php echo $row['visible']; ?></td>
                        <td><a href="update_step.php?id=<?php echo $row['id'];?>"><?php echo $row['tr_title']; ?></a></td>
                        <td><?php echo $row['en_title']; ?></td>
                        <td><a href="<?php echo 'del_step.php?id='.$row['id'].'&tour_id='.$row['tour_id'];?>" onclick="return confirm('Silersen geri dönüşü yok, emin misin?');"><button type="button" class="btn btn-danger">Durağı Sil</button></a></td>
                      </tr>
          <?php } ?>
                    </tbody>
                  </table>

          <?php
                $conn = null;
              }
          catch(PDOException $err) {
            echo "ERROR: Unable to connect: " . $err->SESSIONMessage();
            }
            ?>
        </div>

      </form>
      </div>
      <?php require '_footer_functions.inc';
       include '_footer.inc';

<?php
  require '_header.inc';
  require '_static.inc';
  include '../lang.tr.inc';
  require '_conn.inc';
  ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php
      if(isset($_GET['page'])){
        $page = $_GET['page'];
        $query = $conn->query("SELECT * FROM static_content WHERE `field_name` = '$page'");
        if(isset($_GET['page'])){
          while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $english = $row['en_content'];
            $turkish = $row['tr_content'];
          }
        }
        echo "<h1>".$language[$page]."</h1>";
      } else {
        echo "<h1>Düzenlenecek sayfayı menüden seçin</h1>";
      }
      ?>
      <form method="post" action="update_static.php">
        <div class="form-group">
          <ul id="tabbed" class="nav nav-tabs">
              <li class="nav-item"><a href="" data-target="#turkish" data-toggle="tab" class="nav-link small active">Türkçe</a></li>
              <li class="nav-item"><a href="" data-target="#english" data-toggle="tab" class="nav-link small">English</a></li>
          </ul>
          <div id="tabbedcontent" class="tab-content">
              <div id="turkish" class="tab-pane fade active show">
                <textarea id="new_tr_text" name="new_tr_text" class="editor form-control w-100 h-100">
                  <?php if(isset($turkish)) { echo $turkish; } ?>
                </textarea>
              </div>
              <div id="english" class="tab-pane fade">
                <textarea id="new_en_text" name="new_en_text" class="editor form-control w-100 h-100">
                  <?php if(isset($english)){ echo $english; } ?>
                </textarea>
              </div>
          </div>
          <input type='hidden' name='page' value='<?php echo "$page";?>'/>
          <input type="submit" name="submit" value="Update" id="submit"/>
        </div>
      </form>
      </div>
    </div>
  </div>
  <?php require '_footer_functions.inc'; ?>
<?php require '_footer.inc'; ?>

<?php
  require '_header.inc';
  $lang = 'tr';
  session_start();
?>
    <h1>Güncellenecek Yapıyı Seç</h1>
    </div><div>
    <div class="row">
    <div class="col-md-12">
      <form method="post" action="" class="form-group py-2">
          <div class="form-row">
            <div class="col">
            <input name="inv_id" class="form-control filterit tt" placeholder="envanter#" data-toggle="tooltip" title="bunu kullanıyorsan diğerlerini boş bırakmayı unutma!" />
            </div>
            <div class="col">
            <input name="name" class="form-control filterit" placeholder="isimden bul" />
            </div>
            <div class="col">
            <select name="city" class="form-control filterit">
              <option value="">şehirle sınırla</option>';
                <?php include '../_city.inc'; ?>
            </select>
            </div>
            <div class="col">
            <select name="en_ethnicity" class="form-control filterit">
              <option value="">etnik toplulukla sınırla</option>';
            <?php include '../_ethnicity.inc'; ?>
            </select>
            </div>
            <div class="col">
            <select name="en_building_type" class="form-control filterit">
              <option value="">yapı tipiyle sınırla</option>
              <?php include '../_type.inc'; ?>
            </select>
            </div>
          </div>
          <div class="form-row py-2 mx-auto">
          <input id="submit" name="submit" type="submit" class="btn btn-success" value="bul"/></div>
        </form>
        </div>
      </div>
      <div id="listhere">
      <?php
          if (isset($_POST['submit'])) {
            unset($_POST['submit']);
            include 'list_buildings.php';
          } ?>
      </div>
    </div>
  <script src="../lib/bootstrap.bundle.min.js"></script>
  <script>
  $('.tt').tooltip({
     placement: "right",
     trigger: "focus"
   });
  </script>
</body>
</html>
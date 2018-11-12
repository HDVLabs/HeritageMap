<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>

          <div class="card" style="width: 18rem;">
            <div class="card-header">
              Yapı Cinsleri Dağılımı
            </div>
            <canvas id="myChart" class="card-img-top mt-3" width="400" height="400"></canvas>
            <div class="card-body">
              <a href="#" class="btn btn-primary">Listeyi Aç</a>
            </div>
          </div>
            <div>
          <?php
          require '../connect.php';
          $conn = new PDO("mysql:host=$host;dbname=$dbn;charset=utf8", $dbu, $dbp);
          unset($dbn,$dbu,$dbp);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $conn->exec("SET NAMES 'utf8';");
          $query = "SELECT `tr_building_type`, COUNT(*) FROM envanter GROUP BY `tr_building_type`";

          ?>
          </div>
<script>
  new Chart (
    document.getElementById("myChart"),{
      "type":"doughnut",
      "data": {
        "labels":["Red","Blue","Yellow","Navy"],
        "datasets":
          [
            {
              "label":"My First Dataset",
              "data":[300,50,100,120],
              "backgroundColor":["rgb(255, 99, 132)","rgb(54, 162, 235)","rgb(255, 205, 86)","rgb(82, 85, 26)"]
            }
          ]
        },
        options: {
          legend: {
            position: 'bottom'
          }
        }
      });
</script>

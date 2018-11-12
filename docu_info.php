<?php
  require '_conn.inc';
    try {
    $id = $_POST['id'];
    $lang = $_POST['lang'];
    require_once("lang.".$lang.".inc");
    $sql = "SELECT * FROM docubase WHERE id = '$id'";
    $row = $conn->query($sql)->fetch(); ?>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1><?php echo $row[$lang.'_title']; ?>
              <span class="small-float-right">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['REQUEST_URI']).'/search.php?q=&city='.$row['city'].'&doc_id='.$row['id'].'&lang='.$lang); ?>" target="_blank" rel="noopener noreferrer"><img src="img/facebook.svg" title="<?php echo $language['_share_docu_facebook']; ?>" alt="facebook logo"/></a>
                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode('http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['REQUEST_URI']).'/search.php?q=&city='.$row['city'].'&doc_id='.$row['id'].'&lang='.$lang); ?>" target="_blank" rel="noopener noreferrer"><img src="img/twitter.svg" title="<?php echo $language['_share_docu_twitter']; ?>" alt="twitter logo"/></a>
            </span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </h1>
            <?php include '_'.$row['story_type'].'.inc';

    echo "<!--debug docu ".$row['id']."-->";
    $conn = null;
    }
  catch(PDOException $err) {
    echo "ERROR: Unable to connect: " . $err->getMessage();
    }
?></div>
</div>
</div>

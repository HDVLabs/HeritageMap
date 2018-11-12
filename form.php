<?php
$lang = (isset($_GET['lang'])) ? $_GET['lang'] : 'tr';
  require '_conn.inc';
  include 'lang.'.$lang.'.inc';
?>
<div class="container">
    <form method="post" action="mailer.php?lang=<?php echo $lang; ?>">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <div class="form-group">
        <label for="from" class="col-form-label pr-2"><?php echo $language['mail_from']; ?></label>
        <input type="text" class="form-control" name="from" value="">
        <label for="mail" class="col-form-label pr-2"><?php echo $language['mail_address']; ?></label>
        <input type="email" class="form-control" name="mail" value="" required>
      </div>
      <div class="form-group">
        <textarea name="body" class="form-control" rows="5" placeholder="<?php echo $language['mail_help']; ?>" required></textarea>
      </div>
    <button type="submit" class="btn btn-primary text-light"><?php echo $language['mail_submit']; ?></button>
    </form>
</div>

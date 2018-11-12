<?php
require '_head.inc';
include 'lang.'.$_GET['lang'].'.inc';
require 'connect.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mailer/Exception.php';
require 'mailer/PHPMailer.php';
require 'mailer/SMTP.php';
?>
<div class="col-md-6 mx-auto mt-4">
<?php
if (isset($_POST['mail']) && !empty($_POST['mail'])) {
  $ufrom = $_POST['from'];
  $umail = $_POST['mail'];
  $ubody = $_POST['body'];

  $mail = new PHPMailer;
  $mail->isSMTP();
  $mail->SMTPDebug = 0;
  $mail->Host = $mailserv;
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = $mailuser;
  $mail->Password = $mailpass;

  $mail->setFrom($umail, $from);
  $mail->addAddress($mailuser, 'Feedback');
  $mail->Subject = 'feedback';
  $mail->msgHTML($ubody);
  $mail->AltBody = $ubody;

  if (!$mail->send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
      echo $language['mail_sent'];
  }
  function save_mail($mail)
  {
      $path = $vendor;
      $imapStream = imap_open($path, $mail->Username, $mail->Password);
      $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
      imap_close($imapStream);
      return $result;
  }
}
else {
  exit();
}
?>
</div>
<?php require '_foot.inc';
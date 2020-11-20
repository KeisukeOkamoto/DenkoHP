  <?php
  try
{
  $to = "keislaim@gmail.com";
  $subject = $_POST['name'];
  $message = $_POST['message'];
  $from = $_POST['email'];
  $headers = "From:$from";
  mb_language("Japanese");
  mb_internal_encoding("UTF-8");
  if(mb_send_mail($to, $subject, $message, $headers)){
    header('Location:contact_mail_send.html');
  }
  else{
    header('Location:contact_mail_failed.html');
  }
}
catch(Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

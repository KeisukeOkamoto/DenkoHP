
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>SEIKEI Denko</title>
  <meta name="description" content="2020年度　成蹊大学電子工学研究部のホームページ">

  <!-- CSS -->
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="images/favicon.jpg">
</head>

<body>
  <?php

  try
{
  $message = $_POST['message'];
  $to = "keislaim@gmail.com";
  $subject = $_POST['name'];
  $message = $_POST['message'];
  $headers = "From:keislaim@outlook.jp";
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
</body>

</html>

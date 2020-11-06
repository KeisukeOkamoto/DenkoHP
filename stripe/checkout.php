<?php
require_once( dirname(__FILE__).'/lib/stripe-php-7.61.0/init.php');
// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey("sk_test_51HeULKG2ft5wb9WTKHyweFfx8lPmLSFSj0mV4BxBRZd0WJ5JAqrKCorV23LMcMedaTR3yADtubR64kEnaN6HgObv00pqDKk53X");
// Token is created using Stripe.js or Checkout!
// Get the payment token submitted by the form:
//$token = $_POST['stripeToken'];
//$email = $_POST['stripeEmail'];
//$amount = $_POST["amount"];
// フォームから情報を取得:
try {
  $charge = \Stripe\Charge::create([
    'customer' => $customer->id,
    'amount'   => 500,
    'currency' => 'jpy',
    'description' => "電工ゲーム集",
  ]);
}catch (\Stripe\Error\Card $e) {
// 決済できなかったときの処理
die(‘決済が完了しませんでした’);
}
// 自動返信メール
mb_language("Japanese");
mb_internal_encoding("UTF-8");
$title = "ご購入ありがとうございます";
$content = $token;
$from_name = "成蹊大学電子工学研究部";
$from_addr = "keislaim@gmail.com";
$from_name_enc = mb_encode_mimeheader($from_name, "ISO-2022-JP");
$from = $from_name_enc . "<" . $from_addr . ">";
$header = "From: " . $from . "\n";
$header = $header . "Reply-To: " . $from;
//to user send mail
if(mb_send_mail($email,$title, $content, $header, "-f" .$from_addr)){
// echo “メールを送信しました”;
}
else{
// echo “メールの送信に失敗しました”;
};
// 管理者宛メール
$title_me = "電工購入確認メール";
$from_me = "keislaim@gmail.com";
$content_me = "購入されました";
if(mb_send_mail($from_me,$title_me, $content_me, $header, "-f" .$from_addr)){
echo "メールを送信しました";
} else {
echo "メールの送信に失敗しました";
};
// サンキューページへリダイレクト
header('Location: https://');
exit;
?>

<?php
// ライブラリを読み込む
require_once ( './lib/stripe-php-7.61.0/init.php');

// Secret Keyをセット
$secret_key = 'sk_test_51HeULKG2ft5wb9WTKHyweFfx8lPmLSFSj0mV4BxBRZd0WJ5JAqrKCorV23LMcMedaTR3yADtubR64kEnaN6HgObv00pqDKk53X';
\Stripe\Stripe::setApiKey($secret_key);

// POSTされたデータが存在するなら
if (isset($_POST['stripeToken']) && isset($_POST['stripeEmail'])) {

// POSTされたデータを受け取る
$token = $_POST['stripeToken'];
$email = $_POST['stripeEmail'];

// 決済処理
try {
$charge = \Stripe\Charge::create(array(
'source' => $token,
'amount' => 500,
'currency' => 'jpy',
));
} catch (\Stripe\Error\Card $e) {
// 決済できなかったときの処理
die('決済が完了しませんでした');
}
// サンクスページへリダイレクト
header('Location: ../thanks.html');
exit;
}
?>

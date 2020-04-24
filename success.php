<?php

// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

$access_token = 'APP_USR-2767046342004813-042418-0949c0cfe52c3dffb8b0ec2e3b59a68c-469485398';
$payment_id = $_POST["payment_id"];

$cURLConnection = curl_init();
curl_setopt($cURLConnection, CURLOPT_URL, "https://api.mercadopago.com/v1/payments/$payment_id?access_token=$access_token");
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($cURLConnection);
curl_close($cURLConnection);

$jsonResponse = json_decode($response);

$order_id = $jsonResponse->order->id;
$payment_method_id = $jsonResponse->payment_method_id;
$transaction_amount = $jsonResponse->transaction_amount;

?>

<html lang="en">
<head>
</head>
<body>
  <h1>¡Enhorabuena!</h1>
  <p>El pago se ha realizado con éxito.</p>
  <p>El ID de pago de MercadoPago es: <?= $payment_id ?></p>
  <p>El número de órden del pedido es: <?= $order_id ?></p>
  <p>El payment_method_id es: <?= $payment_method_id ?></p>
  <p>El monto pagado es: <?= $transaction_amount ?></p>
  <p><a href="https://msbombieri-mp-ecommerce-php.herokuapp.com/">Ir al inicio</a></p>
</body>
</html>
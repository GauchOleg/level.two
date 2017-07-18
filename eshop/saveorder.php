<?php
	require "inc/lib.inc.php";
	require "inc/db.inc.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = clearStr($_POST['name']);
	$email = clearStr($_POST['email']);
	$phone = clearInt($_POST['phone']);
	$address = clearStr($_POST['address']);
}
if ($_COOKIE['basket']) {
	$cookies = unserialize(base64_decode($_COOKIE['basket']));
}
	$orderId = $cookies['orderid'];
	$date = time();
	$order = $name . '|' . $email . '|' . $phone . '|' . $address . '|' . $orderId . '|' . $date . "\n";

	$file = file_put_contents('admin/'.ORDERS_LOG,$order,FILE_APPEND);
	if (!saveOrder($date)){
		echo 'Erorr';
	}
?>
<html>
<head>
	<title>Сохранение данных заказа</title>
</head>
<body>
	<p>Ваш заказ принят.</p>
	<p><a href="catalog.php">Вернуться в каталог товаров</a></p>
</body>
</html>
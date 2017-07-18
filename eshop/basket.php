<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/db.inc.php";
?>
<html>
<head>
	<title>Корзина пользователя</title>
</head>
<body>
	<h1>Ваша корзина</h1>
<?php
if (empty($basket)){
	echo 'Ваша карзина пуста! Вернитесь в каталог';
}else{
	echo "<a href='catalog.php'>Вернуться в каталог</a>" . '<br>';
}
$goods = myBasket();
?>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
	<tr>
		<th>N п/п</th>
		<th>Название <?= $value['title'] ?></th>
		<th>Автор <?= $value['author'] ?></th>
		<th>Год издания <?= $value['pubyear'] ?></th>
		<th>Цена, руб. <?= $value['price'] ?></th>
		<th>Количество <?= $value['quantity'] ?></th>
		<th>Удалить</th>
	</tr>
<?php
$i = 1; $sum = 0;
foreach ($goods as $item) {

	?>
	<tr>
		<td><?= $i ?></td>
		<td><?= $item['title'] ?></td>
		<td><?= $item['author'] ?></td>
		<td><?= $item['pubyear'] ?></td>
		<td><?= $item['price'] ?></td>
		<td><?= $item['quantity'] ?></td>
		<td><a href="delete_from_basket.php?id=<?= $item['id'] ?>">Удалить</a></td>
	</tr>
	<?php
	$i++;
	$sum += $item['price'] * $item['quantity'];
}
?>
</table>

<p>Всего товаров в корзине на сумму: <?= $sum?>руб.</p>

<div align="center">
	<input type="button" value="Оформить заказ!"
                      onClick="location.href='orderform.php'" />
</div>
</body>
</html>
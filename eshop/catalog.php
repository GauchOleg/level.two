<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/db.inc.php";
?>
<html>
<head>
	<title>Каталог товаров</title>
</head>
<body>
<p>Товаров в <a href="basket.php">корзине</a>: <?= $count?></p>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
	<?php
	$goods = selectAllItems();
	if (!is_array($goods)){
		echo 'Произошла ошибка при выводе товаров';
		exit;
	}
	if (!$goods){
		echo 'На сегодня товаров нету';
		exit;
	}
	foreach ($goods as $item){

	?>
<tr>
	<th><?= $item['title']?></th>
	<th><?= $item['author']?></th>
	<th><?= $item['pubyear']?></th>
	<th><?= $item['price']?></th>
	<th><a href="add2basket.php?id=<?= $item['id']?>">В корзину</a></th>
</tr>
	<?php } ?>
</table>
</body>
</html>
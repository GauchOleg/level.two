<?php
	// ����������� ���������
	require "inc/lib.inc.php";
	require "inc/db.inc.php";
?>
<html>
<head>
	<title>������� ������������</title>
</head>
<body>
	<h1>���� �������</h1>
<?php
if (empty($basket)){
	echo '���� ������� �����! ��������� � �������';
}else{
	echo "<a href='catalog.php'>��������� � �������</a>" . '<br>';
}
$goods = myBasket();
?>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
	<tr>
		<th>N �/�</th>
		<th>�������� <?= $value['title'] ?></th>
		<th>����� <?= $value['author'] ?></th>
		<th>��� ������� <?= $value['pubyear'] ?></th>
		<th>����, ���. <?= $value['price'] ?></th>
		<th>���������� <?= $value['quantity'] ?></th>
		<th>�������</th>
	</tr>
<?php
$i = 1; $sum = 0;
if (!empty($goods)) {
	foreach ($goods as $item) {

		?>
		<tr>
			<td><?= $i ?></td>
			<td><?= $item['title'] ?></td>
			<td><?= $item['author'] ?></td>
			<td><?= $item['pubyear'] ?></td>
			<td><?= $item['price'] ?></td>
			<td><?= $item['quantity'] ?></td>
			<td><a href="delete_from_basket.php?id=<?= $item['id'] ?>">�������</a></td>
		</tr>
		<?php
		$i++;
		$sum += $item['price'] * $item['quantity'];
	}
}
?>
</table>

<p>����� ������� � ������� �� �����: <?= $sum?>���.</p>

<div align="center">
	<input type="button" value="�������� �����!"
                      onClick="location.href='orderform.php'" />
</div>
</body>
</html>
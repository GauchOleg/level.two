<?php
	require "secure/session.inc.php";
	require "../inc/lib.inc.php";
	require "../inc/db.inc.php";
$orders = getOrders();
?>
<html>
<head>
	<title>����������� ������</title>
</head>
<body>
<h1>����������� ������:</h1>
<?php
	foreach ($orders as $order){
?>
<hr>
<h2>����� �����: <?= $order['id']?></h2>
<p><b>��������</b>: <?= $order['name']?></p>
<p><b>Email</b>: <?= $order['email']?></p>
<p><b>�������</b>: <?= $order['phone']?></p>
<p><b>����� ��������</b>: <?= $order['address']?></p>
<p><b>���� ���������� ������</b>: <?= date('d-m-Y H:i:s', $order['dt'])?></p>

<h3>��������� ������:</h3>
<table border="1" cellpadding="5" cellspacing="0" width="90%">
<tr>
	<th>N �/�</th>
	<th>��������</th>
	<th>�����</th>
	<th>��� �������</th>
	<th>����, ���.</th>
	<th>����������</th>
</tr>
	<?php
	$i = 1; $sum = 0;
	foreach ($order['goods'] as $item) {
		?>
		<tr>
			<td><?= $i ?></td>
			<td><?= $item['title'] ?></td>
			<td><?= $item['author'] ?></td>
			<td><?= $item['pubyear'] ?></td>
			<td><?= $item['price'] ?></td>
			<td><?= $item['quantity'] ?></td>
		</tr>
		<?php
		$i++;
		$sum += $item['price'] * $item['quantity'];
	}
	?>

</table>
<p>����� ������� � ������ �� �����: <?= $sum?> ���.</p>
<?php }?>
</body>
</html>
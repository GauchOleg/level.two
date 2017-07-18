<?php
	// ����������� ���������
	require "inc/lib.inc.php";
	require "inc/db.inc.php";
?>
<html>
<head>
	<title>������� �������</title>
</head>
<body>
<p>������� � <a href="basket.php">�������</a>: <?= $count?></p>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
	<?php
	$goods = selectAllItems();
	if (!is_array($goods)){
		echo '��������� ������ ��� ������ �������';
		exit;
	}
	if (!$goods){
		echo '�� ������� ������� ����';
		exit;
	}
	foreach ($goods as $item){

	?>
<tr>
	<th><?= $item['title']?></th>
	<th><?= $item['author']?></th>
	<th><?= $item['pubyear']?></th>
	<th><?= $item['price']?></th>
	<th><a href="add2basket.php?id=<?= $item['id']?>">� �������</a></th>
</tr>
	<?php } ?>
</table>
</body>
</html>
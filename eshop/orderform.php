<?php
require_once 'inc/lib.inc.php';
require_once 'inc/db.inc.php';
?>
<html>
<head>
	<title>����� ���������� ������</title>
</head>
<body>
	<h1>���������� ������</h1>
	<form action="saveorder.php" method="post">
		<p>��������: <input type="text" name="name" size="50" />
		<p>Email ���������: <input type="text" name="email" 
					size="50" />
		<p>������� ��� �����: <input type="text" name="phone" 
						size="50" />
		<p>����� ��������: <input type="text" name="address" 
						size="100" />
		<p><input type="submit" value="��������" />
	</form>
</body>
</html>
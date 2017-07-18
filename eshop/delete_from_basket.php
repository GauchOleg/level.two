<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/db.inc.php";
	if ($_SERVER['REQUEST_METHOD'] == 'GET'){
		$id = $_GET['id'];
	}
	deleteItemFromBasket($id);
	header('Location: basket.php');
	
?>
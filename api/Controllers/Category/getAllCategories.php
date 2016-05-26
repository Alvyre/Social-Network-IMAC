<?php 
	require_once("Models/Category.php");
	$categories = readAllCategories();
	echo json_encode($categories);
?>
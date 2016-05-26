<?php 
	require_once(__DIR__."/../../Models/Category.php");
	$categories = readAllCategories();
	header('Content-Type: application/json');
	echo json_encode($categories);
?>
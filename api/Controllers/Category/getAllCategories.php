<?php 
	require_once(__DIR__."/../../Models/Category.php");
	$categories = readAllCategories();
	echo json_encode($categories);
?>
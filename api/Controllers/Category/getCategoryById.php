<?php 
	require_once(__DIR__."/../../Models/Category.php");
	$category = readIdCategories($_GET['id']);
	json_encode($category);
	echo $category;
?>
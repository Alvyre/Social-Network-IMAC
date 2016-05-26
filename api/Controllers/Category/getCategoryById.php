<?php 
	echo "test";
	$category = readIdCategories($_GET['id']);
	json_encode($category);
	echo $category;
?>
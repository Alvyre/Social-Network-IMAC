<?php 
	$categories = readAllCategories();
	json_encode($categories);
	echo $categories;
?>
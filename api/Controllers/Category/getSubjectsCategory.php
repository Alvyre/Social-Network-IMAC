<?php 
	$category = readTitleCategories();
	$sujets = readAllSubjectsCategory($category[0]["IdCat"]); 
	json_encode($sujets);
	echo $sujets;
?>
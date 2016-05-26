<?php 
	$category = readTitleCategories($_POST["title"]);
	$sujets = readAllSubjectsCategory($category[0]["IdCat"]); 
	json_encode($sujets);
	echo $sujets;
?>
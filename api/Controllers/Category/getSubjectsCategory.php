<?php 
	require_once(__DIR__."/../../Models/Category.php");
	require_once(__DIR__."/../../Models/Subject.php");
	$category = readIdCategories($_POST["idCat"]);
	$sujets = readAllSubjectsCategory($category[0]["idCat"]); 
	$retour = [ 
	"idCat" => $category[0]["idCat"], 
	"titleCat" => $category[0]["titleCat"],
	"sub" => $sujets
	];
	echo "[".json_encode($retour)."]";
?>
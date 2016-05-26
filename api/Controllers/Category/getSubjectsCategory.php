<?php 
	require_once(__DIR__."/../../Models/Category.php");
	require_once(__DIR__."/../../Models/Subject.php");
	$category = readIdCategories($_POST["id"]);
	$sujets = readAllSubjectsCategory($category[0]["IdCat"]); 
	$retour = [ 
	"idCat" => $category[0]["IdCat"], 
	"titleCat" => $category[0]["TitleCat"],
	"sub" => $sujets
	];
	echo "[".json_encode($retour)."]";
?>
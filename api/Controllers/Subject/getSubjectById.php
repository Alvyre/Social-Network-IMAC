<?php 
	require_once(__DIR__."/../../Models/Subject.php");
	require_once(__DIR__."/../../Models/User.php");
	require_once(__DIR__."/../../Models/Category.php");
	require_once(__DIR__."/../../Models/Comment.php");
	$sujet = readIdSubjects(1); 
	$comments = readSubjectsComments(1);
	$category = readIdCategories($sujet[0]["idCat"]);
	$user = readIdUser($sujet[0]["idUser"]);

	$retour = [
		$sujet, 
		"cat" => $category,
		"user" => $user,
		"comment" => $comments
	];
	header('Content-Type: application/json');
	echo json_encode($retour);

?>
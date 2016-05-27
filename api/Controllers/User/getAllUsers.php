<?php 
	require_once(__DIR__."/../../Models/User.php");
	require_once(__DIR__."/../../Models/Subject.php");
	require_once(__DIR__."/../../Models/Comment.php");
	$users = readAllUser();
	$retour = [];
	foreach ($users as $key => $user) {
		$subjects = readIdUserSubjects($user["idUser"]);
		$comments = readIdUserComments($user["idUser"]);
		$retour[$key] = $user;
		$retour[$key]["subject"] = $subjects;
		$retour[$key]["comment"] = $comments;
	}
	header('Content-Type: application/json');
	echo json_encode($retour);
?>
<?php 
	require_once(__DIR__."/../../Models/Subject.php");
	require_once(__DIR__."/../../Models/Comment.php");
	require_once(__DIR__."/../../Models/User.php");

	$subjects = readSearchSubjects($_);
	header('Content-Type: application/json');
	if(!$subjects) echo json_encode($subjects);
	else echo "";

	$comments = readSearchComments();
	header('Content-Type: application/json');
	if(!$comments) echo json_encode($comments);
	else echo "";

	$users = readSearchUsers();
	header('Content-Type: application/json');
	if(!$users) echo json_encode($users);
	else echo "";
?>
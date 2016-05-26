<?php 
	require_once(__DIR__."/../../Models/Comment.php");
	$comments = readAllComments();
	header('Content-Type: application/json');
	echo json_encode($comments);
?>
<?php 
	require_once(__DIR__."/../../Models/Comment.php");
	$comments = readAllComments();
	echo json_encode($comments);
?>
<?php 
	require_once(__DIR__."/../../Models/Vote.php");
	$vote = readIdVotes();
	header('Content-Type: application/json');
	echo json_encode($vote);
?>
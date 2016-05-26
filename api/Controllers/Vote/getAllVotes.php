<?php 
	require_once(__DIR__."/../../Models/Vote.php");
	$votes = readAllVotes();
	header('Content-Type: application/json');
	echo json_encode($votes);
?>
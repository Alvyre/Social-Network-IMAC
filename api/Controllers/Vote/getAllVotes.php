<?php 
	require_once(__DIR__."/../../Models/Vote.php");
	$votes = readAllVotes();
	echo json_encode($votes);
?>
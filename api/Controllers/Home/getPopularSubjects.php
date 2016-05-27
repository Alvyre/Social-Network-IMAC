<?php
	require_once(__DIR__."/../../Models/Subject.php");

	$subject = readMostCommented();
	header('Content-Type: application/json');
	echo json_encode($subject);

?>

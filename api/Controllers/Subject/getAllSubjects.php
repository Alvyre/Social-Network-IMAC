<?php 
	require_once(__DIR__."/../../Models/Subject.php");
	$subjects = readAllSubjects();
	header('Content-Type: application/json');
	echo json_encode($subjects);
?>
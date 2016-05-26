<?php 
	require_once(__DIR__."/../../Models/Subject.php");
	$subjects = readAllSubjects();
	echo json_encode($subjects);
?>
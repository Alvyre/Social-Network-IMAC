<?php 
	$sujet = readIdSubjects($_POST["id"]); 
	json_encode($sujets);
	echo $sujets;
?>
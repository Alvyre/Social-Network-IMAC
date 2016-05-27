<?php
	$researchData = $_POST["choice"];
	$researchTag=$_POST["researchText"];
	for($i=0; $i<3; $i++){
	 	if($researchData[$i] == NULL)
	 		$researchData[$i] = "0";
	}

	/*header('Location: ../../../public/search/'.$researchTag.'&'.$researchData[0].'&'.$researchData[1].'&'.$researchData[2], 'Content-Type: application/json');*/
?>
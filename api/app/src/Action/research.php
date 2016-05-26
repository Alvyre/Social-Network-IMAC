<?php


	$researchData = $_POST["choice"];
	$researchOptions="";
	$researchTag=$_POST["researchText"];
	 for($i=0;$i<count($researchData);$i++){

	 	if($researchOptions != "")
	 		$researchOptions= $researchOptions."&".$researchData[$i];
		 else
		 	$researchOptions= $researchData[$i];

	 }

	echo $researchOptions." ".$researchTag;
	//header('Location: ../../../public/user-create/'.$PseudoUser.'&'.$statusUser.'&'.$photoUser.'&'.$emailUser.'&'.$sexUser.'&'.$bioUser.'&'.$PassUser);
?>
<?php 
	// $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	// $path = parse_url($url, PHP_URL_PATH);
	// $segments = explode('/', rtrim($path, '/'));
	// for($i = 0; $i < sizeof($segments); $i ++) {
	// 	echo $segments[$i]."</br>";
	// }

	include("../Models/Category.php");
	include("../Models/Comment.php");
	include("../Models/Subject.php");
	include("../Models/User.php");
	include("../Models/Vote.php");

		$url = "http://http://localhost/Social-Network-IMAC/Category/Category-get/Enseignement";
		$path = parse_url($url, PHP_URL_PATH);
		$segments = explode('/', rtrim($path, '/'));
		 for($i = 0; $i < sizeof($segments); $i ++) {
		 	echo $i;
		 	echo " ".$segments[$i]."</br>";

		 }

		switch ($segments[4]) {
			case "Category":
					switch ($segments[5]) {
						case "Category-getAll":
								$retour = readAllCategories();
								json_encode($retour);
							break;
						
						case "Category-get":
								if(is_numeric($segments[6])) {
									$retour = readIdCategories($segments[6]);
								}else {
									$retour = readTitleCategories($segments[6]);
								}
								json_encode($retour);

							break;
						// NE FONCTIONNE PAS POUR L'INSTANT

						default:
								switch ($segments[6]) {
									case "Subject-getAll" :
											$category = readTitleCategories($segments[5]);
											$retour = readAllSubjectsCategory($category[0]["IdCat"]);
											json_encode($retour);
										break;
									case "Subject-get" : 
											$retour = readIdSubjects($segments[7]);
											json_encode($retour);
										break;
									case "Subject-create" :
											//createSubject();
										break;
									case "Subject-delete" :
											deleteSubject($segments[7]);
										break;
								}
							break;
					}
				break;

			default:
				
				break;
		}

		//
		//echo $retour;

?>
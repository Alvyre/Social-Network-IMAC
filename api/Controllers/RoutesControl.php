<?php 
	// $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	// $path = parse_url($url, PHP_URL_PATH);
	// $segments = explode('/', rtrim($path, '/'));
	// for($i = 0; $i < sizeof($segments); $i ++) {
	// 	echo $segments[$i]."</br>";
	// }
	function readUrl() {
		$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$path = parse_url($url, PHP_URL_PATH);
		$segments = explode('/', rtrim($path, '/'));

		switch ($segments[2]) {
			case "Category":
					switch ($segments[3]) {
						case "Category-getAll":
								$retour = readAllCategories();
							break;
						
						case "Category-get":
								if(is_int($segment[4])) $retour = readIdCategory($segment[4]);
								else $retour = readTitleCategory($segment[4]);
							break;

						default:
							# code...
							break;
					}
				break;
			
			default:
				# code...
				break;
		}
	}
?>
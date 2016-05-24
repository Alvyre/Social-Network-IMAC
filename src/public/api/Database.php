
<?php

	// OUVERTURE DE FICHIER
// On ouvre le fichier

	// DEDANS IL Y A :
		// localhost
		// user
		// password 
		// Nom

$monfichier = fopen('connexion.txt', 'r');

// On fait ici nos opérations sur le fichier...
$localhost = fgets($monfichier);
$user = fgets($monfichier);
$password = fgets($monfichier);
$name = fgets($monfichier);

$db;

    function __construct()
    {
        $this->db = new mysqli($this->localhost, $this->user, $this->password, $this->name);
    }

// On a fini de l'utiliser, on ferme le fichier
fclose($monfichier);

?>
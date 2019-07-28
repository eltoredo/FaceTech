<?php
	
function modele_deconnexion()
{
	$connexion = new PDO('mysql:host=localhost; dbname=facetech', 'root', '');

	$req = $connexion->prepare("
		UPDATE UTILISATEURS
		SET statut = 'OFF'
		WHERE email = ?"
	);
	$req->execute(array($_SESSION['Email']));

	$req->closeCursor();
}

modele_deconnexion();

?>
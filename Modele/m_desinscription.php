<?php

function modele_desinscription()
{
	include("../Autres/conf.php");

	$req = $connexion->prepare("
		DELETE FROM UTILISATEURS
		WHERE email = ?"
	);
	$req->execute(array($_SESSION['Email']));

	$req->closeCursor();
}

modele_desinscription();

?>
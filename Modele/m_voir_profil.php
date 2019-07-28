<?php

function modele_lire_profil($Email, $ID)
{
	include("../Autres/conf.php");

	$req = $bdd -> query(
		"SELECT nom, prenom, email, rang, classe, descr
		FROM UTILISATEURS
		WHERE id = $ID"
	);
	return $req -> fetch();
};

?>

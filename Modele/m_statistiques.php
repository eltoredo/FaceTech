<?php

function modele_nombre_inscrits($bdd)
{
	$inscrits = $bdd->query("
		SELECT COUNT(*) AS inscrits
		FROM UTILISATEURS"
	);
	return $inscrits->fetch()["inscrits"];
}

function modele_nombre_connectes($bdd)
{
	$connectes = $bdd->query("
		SELECT COUNT(*) AS connectes
		FROM UTILISATEURS
		WHERE statut = 'ON'"
	);
	return $connectes->fetch()["connectes"];
}

?>
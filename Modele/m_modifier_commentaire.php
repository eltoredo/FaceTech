<?php

function modele_modifier_commentaire($ID, $IDcom, $Newcom)
{
	include("../Autres/conf.php");

	$req2 = $bdd -> query(
		"SELECT id, uid
		FROM COMMENTAIRES
		WHERE id = '$IDcom'
		");
	$resultat2 = $req2 -> fetch();

	if (empty($Newcom)) return 0;

	$req = $bdd -> prepare(
		"UPDATE COMMENTAIRES
		SET descr = '$Newcom'
		WHERE id = '$IDcom'
		");

	$req -> execute();

	return 1;
}

?>
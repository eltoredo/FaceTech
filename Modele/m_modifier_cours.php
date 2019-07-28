<?php

function modele_modifier_cours($ID , $Titre, $Theme, $Niveau, $Description)
{
	include("../Autres/conf.php");

	$req2 = $bdd -> query("
		SELECT uid, theme, classe, descr
		FROM COURS
		WHERE theme = '$Titre'
	");
	$resultat2 = $req2 -> fetch();

	if (empty($Titre)) return 1;
	if ($ID !== $resultat2['uid']) return 2;

	if (empty($Niveau)) $Niveau = $resultat2['classe'];
	if (empty($Theme)) $Theme = $resultat2['theme'];
	if (empty($Description)) $Description = $resultat2['descr'];

	$req = $bdd -> prepare(
		"UPDATE COURS
		SET theme = '$Theme', classe = '$Niveau', descr = '$Description'
		WHERE theme = '$Titre'"
	);

	$req -> execute();

	return 0;
 }

?>
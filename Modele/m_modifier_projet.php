<?php

function modele_modifier_projet($ID, $Membres, $Titre, $Niveau, $Type, 
	$Statut, $Description)
{
	if (empty($Titre)) return 1;

	include("../Autres/conf.php");

	$req2 = $connexion -> query("
		SELECT nom, chef, membre, statut, type, niveau, descr
		FROM PROJETS
		WHERE nom = '$Titre'"
	);
	$resultat2 = $req2 -> fetch();

	if ($ID !== $resultat2['chef']) return 2;

	if (empty($Membres)) $Membres = $resultat2['membre'];
	if (empty($Type)) $Type = $resultat2['type'];
	if (empty($Statut)) $Statut = $resultat2['statut'];
	if (empty($Niveau)) $Niveau = $resultat2['niveau'];
	if (empty($Description)) $Description = $resultat2['descr'];

	$req = $connexion -> prepare(
		"UPDATE PROJETS
		SET membre = '$Membres', type = '$Type', statut = '$Statut', niveau = '$Niveau', descr = '$Description'
		WHERE nom = ?"
	);

	$req -> execute(array($Titre));

	return 0;
 }

?>
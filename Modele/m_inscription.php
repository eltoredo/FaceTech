<?php

function modele_inscription($Nom, $Prenom, $Email, $Udate, $Rang, $Classe,
	$MDP, $MDP2)
{
	if (empty($Nom) || empty($Prenom) || empty($Email) || empty($Udate) || 
	 empty($MDP)) return 1;

	if ($MDP !== $MDP2) return 4;
	if (strlen($MDP) < 6 || strlen($MDP) > 50) return 5;
		
	$MDP = hash('sha256', $MDP);

	if (!preg_match("#^[a-z0-9-_]+@(intechinfo\.fr|esiea\.fr)$#i", $Email)) return 3;

	include("../Autres/conf.php");

	$req2 = $bdd->prepare("
		SELECT email
		FROM UTILISATEURS
		WHERE email = ?"
	);
	$req2->execute(array($Email));
	$resultat2 = $req2->fetch();

	if ($Email == $resultat2['email']) return 2;

	$req = $bdd->prepare(
		"INSERT INTO UTILISATEURS(nom, prenom, email, statut, udate, rang, " .
			"classe, Mdp)" .
		"VALUES('$Nom', '$Prenom', '$Email', 'OFF', '$Udate', '$Rang', " .
			"'$Classe', '$MDP')"
	);

	$req->execute(
		array('nom' => $Nom, 'prenom' => $Prenom,
		'email' => $Email, 'udate' => $Udate, 'rang' => $Rang,
		'classe' => $Classe, 'Mdp' => $MDP)
	);

	$req->closeCursor();

	session_destroy();
	return 0;
}

?>
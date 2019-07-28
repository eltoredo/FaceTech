<?php

function modele_connexion($Email2, $MDPC)
{
	if (empty($Email2) || empty($MDPC)) return 6;

	include("../Autres/conf.php");

	$MDPC = hash('sha256', $MDPC);

	$req = $bdd->prepare("
		SELECT email, Mdp, id, prenom, nom, rang, avatar
		FROM UTILISATEURS
		WHERE email = ? AND Mdp = ?"
	);
	$req->execute(array($Email2, $MDPC));
	$resultat = $req->fetch();

	if (!$resultat) return 7;
	else
	{
		$req2 = $bdd->prepare("
			UPDATE UTILISATEURS
			SET statut = 'ON'
			WHERE email = ?"
		);
		$req2->execute(array($Email2));

		session_start();
		$_SESSION['ID']     = $resultat['id'];
		$_SESSION['Email']  = $resultat['email'];
		$_SESSION['Prenom'] = $resultat['prenom'];
		$_SESSION['Nom']    = $resultat['nom'];
		$_SESSION['Rang']   = $resultat['rang'];
		$_SESSION['Avatar'] = $resultat['avatar'];
	}
	$req->closeCursor();
}

?>
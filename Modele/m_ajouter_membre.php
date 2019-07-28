<?php

function modele_ajouter_membre($pid)
{
	include('../Autres/conf.php');

	$req = $bdd->prepare("
		SELECT id
		FROM UTILISATEURS
		WHERE email = ?"
	);
	$req->execute(array($_POST['Membre']));
	$resultat = $req->fetch();

	if (trim($_POST['Membre']) == '') return 0;
	
	$req2 = $bdd->prepare("
		SELECT email
		FROM UTILISATEURS
		WHERE email = ?"
	);
	$req2->execute(array($_POST['Membre']));
	$resultat2 = $req2->fetch();

	if (empty($resultat2['email'])) return 1;

	$req3 = $bdd->prepare("
		SELECT uid, pid
		FROM GROUPES
		WHERE pid = $pid"
		);
	$req3->execute();
	$resultat3 = $req3->fetch();

	if (in_array($resultat['id'], $resultat3)) return 2;

	else
	{
		$req3 = $bdd->prepare('INSERT INTO GROUPES(uid, pid) VALUES(?, ?)');
		$req3->execute(array($resultat['id'], $pid));
	}
	return 3;
}

?>
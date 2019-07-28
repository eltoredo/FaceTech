<?php

function modele_commenter_projet($ID, $pid)
{

	if(trim($_POST['commentaire']) === '') return 0;
	if(strlen($_POST['commentaire']) > 500) return 1;
	else
	{
		include("../Autres/conf.php");

		$req2 = $bdd->prepare("
			INSERT INTO COMMENTAIRES(uid, descr, comdate, pid)
			VALUES(?, ?, ?, ?)"
		);
		$req2->execute(array($ID, $_POST['commentaire'], date("Y-m-d")." ".(date("H")).date(":i:s"), $pid));
	}
	return 2;
}

function modele_commenter_cours($ID, $cid)
{

	if(trim($_POST['commentaire2']) === '') return 0;
	if(strlen($_POST['commentaire2']) > 500) return 1;
	else
	{
		include("../Autres/conf.php");

		$req2 = $bdd->prepare("
			INSERT INTO COMMENTAIRES(uid, descr, comdate, cid)
			VALUES(?, ?, ?, ?)"
		);
		$req2->execute(array($ID, $_POST['commentaire2'], date("Y-m-d")." ".(date("H")).date(":i:s"), $cid));
	}
	return 2;
}

function m_commenter_supcom($bdd, $ID)
{
	$req = $bdd -> query("
		DELETE COMMENTAIRES
		FROM COMMENTAIRES
		WHERE id = $ID
	");
	$req -> closeCursor();
};

?>
<?php

/* ============== UTILISATEURS ================== */

function m_back_office_u($bdd)
{
	$req = $bdd -> query("
		SELECT id, nom, prenom, statut, rang, udate, classe, avatar, email
		FROM UTILISATEURS
		GROUP BY id"
	);
	
	return $req->fetchAll(PDO::FETCH_ASSOC);
}

function m_back_office_supu($bdd, $ID)
{
	$req = $bdd->query("
		DELETE UTILISATEURS
		FROM UTILISATEURS
		WHERE id = $ID"
	);

	$req->closeCursor();
}

/* ============== PROJETS ====================== */

function m_back_office_p($bdd)
{
	$req = $bdd->query("
		SELECT id, nom, chef, type, pdate, membre, statut, niveau, descr, fichier, logo
		FROM PROJETS
		GROUP BY id
	");
	
	return $req->fetchAll(PDO::FETCH_ASSOC);
}

function m_back_office_supp($bdd, $ID)
{
	$req = $bdd->query("
		DELETE PROJETS
		FROM PROJETS
		WHERE ID = $ID
	");

	$req->closeCursor();
}

/* ============== COURS ====================== */

function m_back_office_c($bdd)
{
	$req = $bdd->query("
		SELECT id, uid, theme, cdate, classe, descr, remq, fichier
		FROM COURS
		GROUP BY id
	");
	
	return $req->fetchAll(PDO::FETCH_ASSOC);
}

function m_back_office_supc($bdd, $ID)
{
	$req = $bdd->query("
		DELETE COURS
		FROM COURS
		WHERE id = $ID
	");

	$req->closeCursor();
}

?>

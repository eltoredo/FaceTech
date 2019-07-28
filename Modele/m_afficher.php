<?php

function modele_afficher_projets($bdd, $ID)
{
	$projets = $bdd->query(
		"SELECT p.id AS id, u.nom as unom, u.prenom as uprenom, 
			nblike, p.nom AS projets, pdate, niveau, p.descr, type, p.statut AS statut, fichier, logo
		FROM PROJETS p
		JOIN UTILISATEURS u
		ON chef = u.id
		WHERE u.id = $ID
		ORDER BY pdate"
	);
	return $projets->fetchAll();
}

function modele_afficher_cours($bdd, $ID)
{
	$projets = $bdd->query(
		"SELECT c.id AS cid, u.id, cdate, theme, c.fichier,
			c.descr AS descr, c.classe
		FROM UTILISATEURS u
		JOIN COURS c
		ON u.id = c.uid
		WHERE u.id = $ID
		ORDER BY cdate"
	);
	return $projets->fetchAll();
}

function modele_afficher_membres($bdd, $ID, $pid)
{
	$membres = $bdd->query(
		"SELECT g.id AS gid, u.id AS uid, prenom, nom
		FROM UTILISATEURS u
		JOIN GROUPES g
		ON g.uid = u.id
		WHERE g.pid = $pid"
	);
	return $membres->fetchAll();
}

function m_sup_membre($ID)
{

	$connexion = new PDO('mysql:host=localhost; dbname=facetech', 'root', '');	

	$req = $connexion -> query("
		DELETE GROUPES
		FROM GROUPES
		WHERE ID = $ID;
	");
	$req -> closeCursor();
}

?>
<?php

function modele_fil_projets($bdd)
{
	$projets = $bdd->query(
		"SELECT p.id, u.id AS uid, p.nom AS pnom, pdate, nblike, niveau, p.descr, type, prenom, u.nom AS nom, p.statut, fichier, logo
		FROM PROJETS p
		JOIN UTILISATEURS u
		ON chef = u.id
		ORDER BY pdate"
	);
	return $projets->fetchAll();
}

function modele_fil_cours($bdd)
{
	$cours = $bdd->query(
		"SELECT c.id AS cid, u.id AS uid, u.nom AS nom, u.prenom AS prenom, cdate, theme, fichier,
		   c.descr AS descr
		FROM UTILISATEURS u
		JOIN COURS c
		ON u.id = c.uid
		ORDER BY cdate"
	);
	return $cours->fetchAll();
}

function modele_fil_chat($bdd)
{
	$chat = $bdd->query(
		"SELECT m.id, mdate, prenom, nom, m.descr AS descr
		FROM UTILISATEURS u
		JOIN MESSAGES m
		ON u.id = m.uid
		ORDER BY mdate DESC
		LIMIT 0, 25"
	);
	return $chat->fetchAll();
}

function modele_afficher_commentaires_projets($bdd, $ID, $pid)
{
	$commentaires = $bdd->query(
		"SELECT c.uid AS coid, c.id AS id, u.id AS uid, u.prenom AS prenom, u.nom AS nom, c.descr, comdate
		FROM COMMENTAIRES c
		JOIN UTILISATEURS u
		ON uid = u.id
		WHERE pid = $pid
		ORDER BY comdate"
	);
	return $commentaires->fetchAll();
}

function modele_afficher_commentaires_cours($bdd, $ID, $cid)
{
	$commentaires = $bdd->query(
		"SELECT c.uid AS coid, c.id AS id, u.prenom AS prenom, u.nom AS nom, c.descr, comdate
		FROM COMMENTAIRES c
		JOIN UTILISATEURS u
		ON uid = u.id
		WHERE cid = $cid
		ORDER BY comdate"
	);
	return $commentaires->fetchAll();
}

?>
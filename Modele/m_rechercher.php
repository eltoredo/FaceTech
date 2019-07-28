<?php

function modele_rechercher_projet($bdd, $rech)
{
	$projets = $bdd->query(
		"SELECT p.id AS id, p.chef AS uid, p.nom AS pnom, p.type AS type, p.logo AS logo, p.descr AS descr,u.id AS uid, u.prenom AS prenom, u.nom AS nom, p.pdate, p.niveau, p.statut, p.fichier
		FROM PROJETS p
		LEFT JOIN UTILISATEURS u
		ON p.chef = u.id
		WHERE p.nom LIKE '%$rech%' 
			OR p.type LIKE '%$rech%'
			OR p.descr LIKE '%$rech%'
			OR p.niveau LIKE '%$rech%'"
	);
	return $projets->fetchAll(PDO::FETCH_ASSOC);
}

function modele_rechercher_cours($bdd, $rech)
{
	$cours = $bdd->query(
		"SELECT c.cdate , c.id AS cid, c.uid, c.theme, c.descr, c.fichier, u.nom, u.prenom
		FROM COURS c
		LEFT JOIN UTILISATEURS u ON c.uid = u.id
		WHERE c.theme LIKE '%$rech%' 
			OR c.descr LIKE '%$rech%'"
	);
	return $cours->fetchAll(PDO::FETCH_ASSOC);
}

function modele_rechercher_UTILISATEURS($bdd, $rech)
{
	$cours = $bdd->query(
		"SELECT nom, prenom ,descr ,email, classe, rang
		FROM UTILISATEURS
		WHERE nom LIKE '%$rech%' 
			OR prenom LIKE '%$rech%'
			OR descr LIKE '%$rech%'
			OR email LIKE '%$rech%'"
	);
	return $cours->fetchAll(PDO::FETCH_ASSOC);
}
?>
<?php

function m_sup_projet($ID)
{

	$connexion = new PDO('mysql:host=localhost; dbname=facetech', 'root', '');	

	$req = $connexion -> query("
		DELETE PROJETS
		FROM PROJETS
		WHERE ID = $ID;
		DELETE GROUPES
		FROM GROUPES
		WHERE pid = $ID
	");
	$req -> closeCursor();
}

function m_sup_cours($ID)
{

	$connexion = new PDO('mysql:host=localhost; dbname=facetech', 'root', '');	

	$req = $connexion -> query("
		DELETE COURS
		FROM COURS
		WHERE ID = $ID;
	");
	$req -> closeCursor();
}

?>

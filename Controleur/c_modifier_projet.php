<?php

session_start();

if (isset($_POST['Bouton4']))
{
	$ID          = $_SESSION['ID'];
	$Membres     = $_POST['Membres'];
	$Titre       = addslashes($_POST['Titre']);
	$Niveau      = $_POST['Niveau'];
	$Type        = $_POST['Type'];
	$Statut      = $_POST['Statut'];
	$Description = addslashes($_POST['Description']);

	require_once('../Modele/m_modifier_projet.php');
	$erreur = modele_modifier_projet($ID, $Membres, $Titre, $Niveau, $Type, 
		$Statut, $Description);

	header("location: ../Vue/profil.php?erreur_modifier_projet=$erreur&cp=prp");
}

?>
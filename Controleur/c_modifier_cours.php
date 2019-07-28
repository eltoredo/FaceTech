<?php

session_start();

if (isset($_POST['Bouton5']))
{
	$ID          = $_SESSION['ID'];
	$Titre       = addslashes($_POST['Titre']);
	$Theme       = addslashes($_POST['Theme']);
	$Niveau      = $_POST['Niveau'];
	$Description = addslashes($_POST['Description']);

	require_once("../Modele/m_modifier_cours.php");
	$erreur = modele_modifier_cours($ID, $Titre, $Theme, $Niveau, $Description);
	header("location: ../Vue/profil.php?erreur_modifier_cours=$erreur&cp=prc");
}

?>
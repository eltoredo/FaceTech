<?php

session_start();

$ID = $_SESSION['ID'];

$Titre	      = isset($_POST['Titre']) ? htmlspecialchars($_POST['Titre']) : NULL;
$Logo         = $_FILES['Logo']['size'] !== 0 ? $_FILES['Logo'] : NULL;
$Semestre	  = isset($_POST['Semestre']) ? $_POST['Semestre'] : NULL;
$Type	      = isset($_POST['Type']) ? $_POST['Type'] : NULL;
$Nombre	      = isset($_POST['Nombre']) ? $_POST['Nombre'] : NULL;
$Statut	      = isset($_POST['Statut']) ? $_POST['Statut'] : NULL;
$Description  = isset($_POST['Description']) ? htmlspecialchars($_POST['Description']) : NULL;
$Sources      = isset($_POST['Sources']) ? htmlspecialchars($_POST['Sources']) : NULL;

$Theme	      = isset($_POST['Theme']) ? htmlspecialchars($_POST['Theme']) : NULL;
$Niveau2	  = isset($_POST['Niveau2']) ? $_POST['Niveau2'] : NULL;
$Description2 = isset($_POST['Description2']) ? htmlspecialchars($_POST['Description2']) : NULL;
$Fichier      = isset($_POST['Fichier']) ? htmlspecialchars($_POST['Fichier']) : NULL;

if(isset($_POST['Bouton']))
{
	$Bouton = 0;
	require_once("../Modele/m_poster_cp.php");
	$erreur = modele_poster($Titre, $Logo, $Type, $Nombre, $Statut, $Semestre, $Description, $Sources, $Theme, $Niveau2, $Description2, $Fichier, $ID, $Bouton);
	header("location: ../Vue/profil.php?erreur_poster_projet=$erreur&cp=prp");
}

if(isset($_POST['Bouton2']))
{
	$Bouton = 1;
	require_once("../Modele/m_poster_cp.php");
	$erreur = modele_poster($Titre, $Logo, $Type, $Nombre, $Statut, $Semestre, $Description, $Sources, $Theme, $Niveau2, $Description2, $Fichier, $ID, $Bouton);
	header("location: ../Vue/profil.php?erreur_poster_cours=$erreur&cp=prc");
}

?>
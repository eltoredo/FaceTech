<?php

session_start();

$ID      = $_SESSION['ID'];
$Nom     = htmlspecialchars($_POST['Nom']);
$Prenom  = htmlspecialchars($_POST['Prenom']);
$Classe  = $_POST['Classe'];
$Descr   = htmlspecialchars($_POST['Descr']);
$Mdp     = htmlspecialchars($_POST['Mdp']);
$NewMdp  = htmlspecialchars($_POST['NewMdp']);
$NewMdp2 = htmlspecialchars($_POST['NewMdp2']);

$Avatar  = $_FILES['Avatar']['size'] !== 0 ? $_FILES['Avatar'] : NULL;

$_SESSION['Prenom'] = $Prenom;
	
require_once('../Modele/m_modifier_profil.php');
$erreur = modele_modifier_profil($Nom, $Prenom, $Classe, $Descr, $Mdp, $NewMdp, 
		$NewMdp2, $Avatar, $ID);

header("location: ../Vue/profil.php?erreur_modifier_profil=$erreur&cp=pr");

?>

<?php

session_start();

$Email	= strtolower($_POST['Email']);
$Udate  = $_POST['An'].'/'.$_POST['Mois'].'/'.$_POST['Jour'];
$Nom	= $_POST['Nom'];
$Prenom	= $_POST['Prenom'];
$Rang	= $_POST['Rang'];
$Classe	= $_POST['Classe'];
$MDP	= $_POST['MDP'];
$MDP2	= $_POST['MDP2'];

$_SESSION['Email']  = $Email;
$_SESSION['Udate']  = $Udate;
$_SESSION['Nom']    = $Nom;
$_SESSION['Prenom']	= $Prenom;

require_once("../Modele/m_inscription.php");
$erreur = modele_inscription($Nom, $Prenom, $Email, $Udate, $Rang,
	$Classe, $MDP, $MDP2);

header("location: ../Vue/index.php?erreur=$erreur");

?>

<!-- echo $Email.$Udate.$Nom.$Prenom.$Rang.$Classe.$MDP.$MDP2.$Date; -->
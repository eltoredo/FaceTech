<?php

session_start();

$ID = $_SESSION['ID'];
$pid = $_GET['pid'];
$cid = $_GET['cid'];

require_once("../Modele/m_commenter.php");

if ($_GET['pid'])
{
	$erreur = modele_commenter_projet($ID, $pid);
	header("location: ../Vue/fil.php?erreur_commenter_projet=$erreur&cp=p");
}
else if($_GET['cid'])
{
	$erreur = modele_commenter_cours($ID, $cid);
	header("location: ../Vue/fil.php?erreur_commenter_cours=$erreur&cp=c");
}

?>
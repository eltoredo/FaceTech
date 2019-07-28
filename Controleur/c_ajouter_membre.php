<?php

session_start();

$pid = $_GET['pid'];

require_once("../Modele/m_ajouter_membre.php");

$erreur = modele_ajouter_membre($pid);
header("location: ../Vue/profil.php?erreur_ajouter_membre=$erreur&cp=prp");

?>
<?php

session_start();

$CP = $_GET['cp'];

$ID     = $_SESSION['ID'];
$IDcom  = $_POST['id'];
$Newcom = addslashes($_POST['commentaire']);

require_once('../Modele/m_modifier_commentaire.php');
$erreur = modele_modifier_commentaire($ID, $IDcom, $Newcom);

if ($CP == 'p') header("location: ../Vue/fil.php?erreur_modifier_commentaire=$erreur&cp=p");
else header("location: ../Vue/fil.php?erreur_modifier_commentaire=$erreur&cp=c");

?>

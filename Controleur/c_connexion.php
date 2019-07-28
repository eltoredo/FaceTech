<?php

$Email2 = $_POST['Email2'];
$MDPC = $_POST['MDPC'];

require_once("../Modele/m_connexion.php");
$erreur = modele_connexion($Email2, $MDPC);

if ($erreur == 6 || $erreur == 7) header("location: ../Vue/index.php?erreur=$erreur");
else header("location: ../Vue/fil.php");

?>
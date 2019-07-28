<?php

session_start();

$pid = $_POST['pid'];
$ID  = $_SESSION['ID'];

include('../Modele/m_ajouter_like.php');
$nblike = modele_ajouter_jaime($pid, $ID);
echo $nblike;

?>
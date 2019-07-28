<?php

session_start();
require_once("../Modele/m_chat.php");

$erreur = modele_poster_message();
header("location: ../Vue/fil.php?erreur_chat=$erreur");

?>
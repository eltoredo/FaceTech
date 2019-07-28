<?php

session_start();
require_once("../Modele/m_desinscription.php");
session_destroy();

header("location: ../Vue/index.php");

?>
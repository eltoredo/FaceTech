<?php

require_once("../Modele/m_commenter.php");

/* ============== COMM ====================== */

if(isset($_GET['supcom']))
{
	m_commenter_supcom($bdd, $_GET['supcom']);
}

?>
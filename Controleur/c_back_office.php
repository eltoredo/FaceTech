<?php

require_once("../Modele/m_back_office.php");
	
/* ============== UTILISATEURS ====================== */

if(isset($_GET['supu']))
{
	m_back_office_supu($bdd, $_GET['supu']);
}

$requ = m_back_office_u($bdd);

/* ============== PROJETS ====================== */

if(isset($_GET['supp']))
{
	m_back_office_supp($bdd, $_GET['supp']);
}

$reqp = m_back_office_p($bdd);

/* ============== COURS ====================== */


if(isset($_GET['supc']))
{
	m_back_office_supc($bdd, $_GET['supc']);
}

$reqc = m_back_office_c($bdd);

?>

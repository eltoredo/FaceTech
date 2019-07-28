<?php

include("../Autres/conf.php");
include("../Modele/m_fil.php");

$chat = modele_fil_chat($bdd);
sort($chat);

foreach ($chat as $donnees)
{
	list($an, $mois, $jour, $heure, $min, $sec) =
		sscanf($donnees['mdate'], '%4s-%2s-%2s %2s:%2s:%2s');

 	echo "<hr> <div class='padding'>" . htmlspecialchars("$donnees[prenom] $donnees[nom]") . " : " . stripslashes(htmlspecialchars("$donnees[descr]")) . "<div style='margin-top: -1.5%' align='right'>" . htmlspecialchars(" $heure:$min:$sec") . "</div></div>";
}

?>
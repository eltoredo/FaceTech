<link rel="stylesheet" href="../CSS/fil.css">
<!-- Custom styles for this template -->
<link href="../Bootstrap/theme/assets/css/style.css" rel="stylesheet">
<link href="../Bootstrap/theme/assets/css/font-awesome.min.css" rel="stylesheet">

<?php

session_start();

require("../Scripts/fonctions.js");
include("../Modele/m_fil.php");
include("../Modele/m_afficher.php");
require("../Autres/erreurs.php");

$ID = $_SESSION['ID'];
include("../Autres/conf.php");

require_once("../Controleur/c_supprimer_commentaire.php");




$cours = modele_fil_cours($bdd);

foreach ($cours as $donnees)
{
	list($an, $mois, $jour, $heure, $min, $sec) =
		sscanf($donnees['cdate'], '%4s-%2s-%2s %2s:%2s:%2s');

	$cid          = $donnees['cid'];
	$commentaires = modele_afficher_commentaires_cours($bdd, $ID, $cid);

	echo '<br>';
	echo "<div id='bloc1'><b> $donnees[theme]</b><br><br>";
	echo nl2br(htmlspecialchars("$donnees[descr]")) . "</div><br><br>";
	echo "Auteur : <a href='../Vue/profil.php?ID=$donnees[uid]'> " . htmlspecialchars(trim($donnees['nom'])) .
			' ' . htmlspecialchars(trim($donnees['prenom'])) . "</a><br>";
	echo "Posté le : $jour/$mois/$an à $heure:$min:$sec<br>";
	if (!empty($donnees['fichier'])) echo "<a href='". nl2br(htmlspecialchars("$donnees[fichier]")) ."'> Lien du cours </a> <br>";

	foreach ($commentaires as $donnees)
	{
		echo "<div id='bloc3'><br> Commentaire : " . nl2br(htmlspecialchars("$donnees[descr]")) . " - Par " . htmlspecialchars("$donnees[prenom] $donnees[nom]") . " le $donnees[comdate]".' ';

		if ($ID === $donnees['coid'])
		{
			echo "<a href='../Vue/fil.php?supcom=$donnees[id]&cp=c' onclick='return confirm(\"Êtes-vous sûr ?\");'>Supprimer</a>".' ';
			echo "<form method='POST' action='../Vue/modifier_commentaire.php?cp=c'>";
			echo "<input type='hidden' name='id' value='$donnees[id]'>";
			echo "<input type='submit' name='modifier' value='Modifier'>";
			echo "</form>";
		}
	}

	echo "<form method='POST' action='../Controleur/c_commenter.php?cid=$cid'>";
	echo "<br><br> <textarea name='commentaire2'></textarea><br>";
	echo "<input type='submit' name='Valider' value='Valider' onclick='projets();'></div> <br>";
	echo "</form><br><br>";
}

?>
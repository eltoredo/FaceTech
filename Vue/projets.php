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




$projets = modele_fil_projets($bdd);

foreach ($projets as $donnees)
{
	list($an, $mois, $jour, $heure, $min, $sec) =
		sscanf($donnees['pdate'], '%4s-%2s-%2s %2s:%2s:%2s');

	$pid          = $donnees['id'];
	$commentaires = modele_afficher_commentaires_projets($bdd, $ID, $pid);

	echo"<script type='text/javascript' src = '../Scripts/jquery.js'></script>";
	echo"<script type='text/javascript' src = '../Scripts/like.js'></script>";

	echo "<img class='img' id='j".$pid."' src='$donnees[logo]'> <br><br>";
	echo "<div id='bloc1'><br><b>" . htmlspecialchars("$donnees[pnom]") . " - $donnees[type] - <a href='#j".$pid."' class=".$pid."> J'aime </a>(<span id='id".$pid."'>".$donnees['nblike']."</span>)" . "</b><br><br>";
	echo nl2br(htmlspecialchars("$donnees[descr]")) . "</div><br>";
	echo "Auteur : <a href='../Vue/profil.php?ID=$donnees[uid]'>" . htmlspecialchars("$donnees[prenom]") . " " . htmlspecialchars("$donnees[nom]") . "</a><br>";
	echo "Semestre : $donnees[niveau] <br>";
	echo "Posté le : $jour/$mois/$an à $heure:$min:$sec <br>";
	echo "<span>Statut : ";
	if ($donnees['statut'] == 'encours') echo 'En cours'; else echo 'Terminé' . '</span>';
	if (!empty($donnees['fichier'])) echo "<br><a href='". htmlspecialchars(nl2br("$donnees[fichier]")) ."'> Lien des sources </a><br><br>";

	foreach ($commentaires as $donnees)
	{
		echo "<div id='bloc3'><a href='../Vue/profil.php?ID=$donnees[uid]'>" . htmlspecialchars("$donnees[prenom]") . " " . htmlspecialchars("$donnees[nom]") . "</a>  " . nl2br(htmlspecialchars("$donnees[descr]")) . " - le $donnees[comdate]". ' ';

		if ($ID === $donnees['coid'])
		{
			echo "<a href='../Vue/fil.php?supcom=$donnees[id]&cp=p' onclick='return confirm(\"Êtes-vous sûr ?\");'>Supprimer</a>".' ';
			echo "<form method='POST' action='../Vue/modifier_commentaire.php?cp=p'>";
			echo "<input type='hidden' name='id' value='$donnees[id]'>";
			echo "<input type='submit' name='modifier' value='Modifier'>";
			echo "</form>";
		}
	}

	echo "<form method='POST' action='../Controleur/c_commenter.php?pid=$pid'>";
	echo "<br><br> <textarea name='commentaire' placeholder='Commentez ici !'></textarea>";
	echo "<input type='submit' name='Valider' value='Valider'> <br><br><br></div>";
	echo "</form>";
}

?>
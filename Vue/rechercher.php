<link rel="stylesheet" href="../CSS/fil.css">
<link href="../Bootstrap/theme/assets/css/style.css" rel="stylesheet">

<?php

include("maquette.php");
require("../Scripts/fonctions.js");
include("../Modele/m_afficher.php");
include("../Modele/m_fil.php");
include("../Modele/m_rechercher.php");
include("../Autres/conf.php");

require_once("../Controleur/c_supprimer_commentaire.php");

$ID = $_SESSION['ID'];
$rech = $_POST['rech'];

echo "<h1>PROJETS</h1>";

	$projets = modele_rechercher_projet($bdd, $rech);

if (!empty($projets))
{
	foreach ($projets as $donnees)
	{
		list($an, $mois, $jour, $heure, $min, $sec) =
			sscanf($donnees['pdate'], '%4s-%2s-%2s %2s:%2s:%2s');

		$pid          = $donnees['id'];
		$commentaires = modele_afficher_commentaires_projets($bdd, $ID, $pid);

		echo "<img class='img' src='$donnees[logo]'> <br><br>";
		echo "<div id='bloc1'><br><b>" . htmlspecialchars("$donnees[pnom]") . " - $donnees[type]" . "</b><br><br>";
		echo nl2br(htmlspecialchars("$donnees[descr]")) . "</div><br>";
		echo "Auteur : <a href='../Vue/profil.php?ID=$donnees[uid]'>" . htmlspecialchars("$donnees[prenom]") . " " . htmlspecialchars("$donnees[nom]") . "</a><br>";
		echo "Semestre : $donnees[niveau] <br>";
		echo "Posté le : $jour/$mois/$an à $heure:$min:$sec <br>";
		echo "<span>Statut : ";
		if ($donnees['statut'] == 'encours') echo 'En cours'; else echo 'Terminé' . '</span>';
		if (!empty($donnees['fichier'])) echo "<br><a href='". nl2br(htmlspecialchars("$donnees[fichier]")) ."'> Lien des sources </a><br><br>";

		foreach ($commentaires as $donnees)
		{
			echo "<div id='bloc3'><a href='../Vue/profil.php?ID=$donnees[uid]'>" . htmlspecialchars("$donnees[prenom]") . " " . htmlspecialchars("$donnees[nom]") . "</a>  " . nl2br(htmlspecialchars("$donnees[descr]")) . " - le $donnees[comdate]". ' ';

			if ($ID === $donnees['coid'])
			{
				echo "<a href='../Vue/fil.php?supcom=$donnees[id]' onclick='return confirm(\"Êtes-vous sûr ?\");'>Supprimer</a>".' ';
				echo "<form method='POST' action='../Vue/modifier_commentaire.php?'>";
				echo "<input type='hidden' name='id' value='$donnees[id]'>";
				echo "<input type='submit' name='modifier' value='Modifier'>";
				echo "</form></div>";
			}
		}

		echo "<form method='POST' action='../Controleur/c_commenter.php?pid=$pid'>";
		echo "<br><br> <textarea name='commentaire' placeholder='Commentez ici !'></textarea> <br>";
		echo "<input type='submit' name='Valider' value='Valider'> <br><br><br>";
		echo "</form>";
	}
}
else echo'PAS DE PROJETS TROUVÉS POUR VOTRE RECHERCHE : "'.$_POST['rech'].'" !<br><br>';

echo "<h1>COURS</h1>";

$cours = modele_rechercher_cours($bdd, $rech);

if (!empty($cours))
{
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
				echo "<a href='../Vue/fil.php?supcom=$donnees[id]' onclick='return confirm(\"Êtes-vous sûr ?\");'>Supprimer</a>".' ';
				echo "<form method='POST' action='../Vue/modifier_commentaire.php?'>";
				echo "<input type='hidden' name='id' value='$donnees[id]'>";
				echo "<input type='submit' name='modifier' value='Modifier'>";
				echo "</form></div>";
			}
		}

		echo "<form method='POST' action='../Controleur/c_commenter.php?cid=$cid'>";
		echo "<br><br> <textarea name='commentaire2' placeholder='Commentez ici !'></textarea><br>";
		echo "<input type='submit' name='Valider' value='Valider' onclick='projets();'> <br>";
		echo "</form><br><br>";
	}
}
else echo'PAS DE COURS TROUVÉS POUR VOTRE RECHERCHE : "'.$_POST['rech'].'" !<br><br>';

echo "<h1>UTILISATEURS</h1><br>";

$profils = modele_rechercher_utilisateurs($bdd, $rech);

if (!empty($profils))
{
	foreach ($profils as $donnees)
	{
	?>

		Nom : <?php echo htmlspecialchars($donnees['nom']);?>
		<br>
		Prénom : <?php echo htmlspecialchars($donnees['prenom']);?>
		<br>
		Email : <?php echo $donnees['email'];?>
		<br>
		Rang : <?php echo $donnees['rang'];?>
		<br>
		Classe : Semestre <?php echo $donnees['classe'];?>
		<br>
		<?php if (!empty($donnees['descr'])) echo 'Description : '.htmlspecialchars(nl2br($donnees['descr']));?>
			<br><br><?php
	}
}else {

	echo'PAS D\'UTILISATEURS TROUVEÉS POUR VOTRE RECHERCHE : "'.$_POST['rech'].'" !';
}

?>


<link rel="stylesheet" href="../CSS/fil.css">
<link href="../Bootstrap/theme/assets/css/style.css" rel="stylesheet">

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

<?php

include("maquette.php");
require("../Scripts/fonctions.js");
include("../Modele/m_fil.php");
include("../Modele/m_afficher.php");
include("../Modele/m_statistiques.php");
require("../Autres/erreurs.php");

include("../Autres/conf.php");
$Inscrits = modele_nombre_inscrits($bdd);
$Connectes = modele_nombre_connectes($bdd);

require_once("../Controleur/c_supprimer_commentaire.php");

echo "<center>Bienvenue sur le fil d'actualité de votre école préférée !
		<br>Cliquez sur l'image des projets ou celle des cours, vous pouvez revenir à l'accueil à tout moment en cliquant sur le logo.
		<br>Bonne navigation !
		<br><br><br><hr><br></center>";

?> 

<b><span class='erreurs'> <?php if (isset($_GET['erreur_chat'])) echo erreur_chat($_GET['erreur_chat']); ?> </span></b>
<b><span class='erreurs'> <?php if (isset($_GET['erreur_commenter_projet'])) echo erreur_commenter_projet($_GET['erreur_commenter_projet']).''; ?> </span></b>
<b><span class='erreurs'> <?php if (isset($_GET['erreur_commenter_cours'])) echo erreur_commenter_cours($_GET['erreur_commenter_cours']).''; ?> </span></b>
<b><span class='erreurs'> <?php if (isset($_GET['erreur_modifier_commentaire'])) echo erreur_modifier_commentaire($_GET['erreur_modifier_commentaire']).''; ?> </span></b>

<CENTER>
<div id='chat'>

	<?php

	$chat = modele_fil_chat($bdd);
	sort($chat);

	foreach ($chat as $donnees)
	{
		list($an, $mois, $jour, $heure, $min, $sec) =
			sscanf($donnees['mdate'], '%4s-%2s-%2s %2s:%2s:%2s');

 		echo "<hr> <div class='padding'>" . htmlspecialchars("$donnees[prenom] $donnees[nom]") . " : " . htmlspecialchars("$donnees[descr]") . "<div style='margin-top: -1.5%' align='right'>" . htmlspecialchars(" $heure:$min:$sec") . "</div></div>";
	}

	echo '<script>scroll();</script>';

	?>

</div>



<form action="../Controleur/c_chat.php" method="post">
	<input id="envoyer" type="text" name="message"><br>
	<input id="bouton" type="submit" value="">
</form>

</CENTER>

<br><br><br><br>

<div id="cp">

<h1 style='margin-left: 34.8%'>PROJETS</h1><h1 style='margin-left: 20.6%'>COURS</h1>
<CENTER><img src="../Images/Projets.jpeg" onclick="projets();"><img style='margin-left: 15%' src="../Images/Cours.png" onclick="cours();"></CENTER>

<br><br><br>

<CENTER><h2>STATISTIQUES</h2></CENTER>

<p>Nous possédons actuellement <?php echo $Inscrits; ?> membre<?php if ($Inscrits == '1') echo ''; else echo 's'; ?> inscrit<?php if ($Inscrits == '1') echo ''; else echo 's';?>.<br>
<?php echo modele_nombre_connectes($bdd); ?> membre <?php if ($Connectes == '1') echo ''; else echo 's'; if ($Connectes == '1') echo 'est'; else echo 'sont'; ?> connecté<?php if ($Connectes == '1') echo ''; else echo 's'; ?> en ce moment.</p>

</div>

<?php include("footer.php"); ?>

</body>

</html>
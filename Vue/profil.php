<link rel="stylesheet" href="../CSS/profil.css">
<!-- Custom styles for this template -->
<link href="../Bootstrap/theme/assets/css/style.css" rel="stylesheet">
<link href="../Bootstrap/theme/assets/css/font-awesome.min.css" rel="stylesheet">

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

<?php 

include("maquette.php"); 
require("../Scripts/fonctions.js");
include("../Modele/m_afficher.php");
include("../Autres/conf.php");
require("../Modele/m_supprimer.php");
require("../Autres/erreurs.php");

$Email	 = $_SESSION['Email'];
$ID      = $_SESSION['ID'];
$Rang    = $_SESSION['Rang'];

$var = FALSE;
if (isset($_GET['ID']))
{
	$ID = $_GET['ID'];
	$var = TRUE;
}
	
require_once("../Modele/m_voir_profil.php");
$req = modele_lire_profil($Email, $ID);

if (isset($_GET['supp'])) m_sup_projet($_GET['supp']);
else if (isset($_GET['supc'])) m_sup_cours($_GET['supc']);
else if (isset($_GET['supm'])) m_sup_membre($_GET['supm']);

?>

<b><span class='erreurs'> <?php if (isset($_GET['erreur_ajouter_membre'])) echo erreur_ajouter_membre($_GET['erreur_ajouter_membre']).''; ?> </span></b>
<b><span class='erreurs'> <?php if (isset($_GET['erreur_poster_projet'])) echo erreur_poster_projet($_GET['erreur_poster_projet']).''; ?> </span></b>
<b><span class='erreurs'> <?php if (isset($_GET['erreur_poster_cours'])) echo erreur_poster_cours($_GET['erreur_poster_cours']).''; ?> </span></b>
<b><span class='erreurs'> <?php if (isset($_GET['erreur_modifier_projet'])) echo erreur_modifier_projet($_GET['erreur_modifier_projet']).''; ?> </span></b>
<b><span class='erreurs'> <?php if (isset($_GET['erreur_modifier_cours'])) echo erreur_modifier_cours($_GET['erreur_modifier_cours']).''; ?> </span></b>
<b><span class='erreurs'> <?php if (isset($_GET['erreur_modifier_profil'])) echo erreur_modifier_profil($_GET['erreur_modifier_profil']); ?> </span></b>

<div id="all">

<div id="cp">

<?php

if ($var == FALSE)	
{

if ($Rang == 'Admin')
{

?>

<h1 style="margin-left: 31.1%">PROFIL</h1><h1 style="margin-left: 9.8%">PROJETS</h1><h1 style="margin-left: 10.1%">COURS</h1>
<CENTER><img src="../Images/Profil.jpeg" onclick="profil();"><img style="margin-left: 5%" src="../Images/Projets.jpeg" onclick="profilprojets();"><img style="margin-left: 5%" src="../Images/Cours.png" onclick="profilcours();"></CENTER>

<?php

}

if ($Rang == 'Eleve')
{

?>

<h1 style="margin-left: 40%">PROFIL</h1><h1 style="margin-left: 8.1%">PROJETS</h1>
<CENTER><img src="../Images/Profil.jpeg" onclick="profil();"><img style="margin-left: 3%" src="../Images/Projets.jpeg" onclick="profilprojets();"></CENTER>

<?php

}

if ($Rang == 'Prof')
{

?>

<h1 style="margin-left: 40%">PROFIL</h1><h1 style="margin-left: 9%">COURS</h1>
<CENTER><img src="../Images/Profil.jpeg" onclick="profil();"><img style="margin-left: 3%" src="../Images/Cours.png" onclick="profilcours();"></CENTER>

<?php

}
}

if ($var == TRUE)	
{

?>

</div>

Nom : <?php echo htmlspecialchars($req['nom']);?>
<br>
Prénom : <?php echo htmlspecialchars($req['prenom']);?>
<br>
Email : <?php echo $req['email'];?>
<br>
Rang : <?php echo $req['rang'];?>
<br>
Classe : Semestre <?php echo $req['classe'];?>
<br>
<?php if (!empty($req['descr'])) echo 'Description : '.nl2br(htmlspecialchars($req['descr'])); ?>

<br><br><br><hr><br>

<?php

}

if ($req['rang'] !== 'Prof')
{

	if($var == TRUE)	
	{

?>

<h2>PROJETS PERSONNELS</h2>

<?php

$projets = modele_afficher_projets($bdd, $ID);

foreach ($projets as $donnees)
{
	list($an, $mois, $jour, $heure, $min, $sec) =
		sscanf($donnees['pdate'], '%4s-%2s-%2s %2s:%2s:%2s');

	$pid = $donnees['id'];
	$membres = modele_afficher_membres($bdd, $ID, $pid);

	echo "<br> Nom du projet : " . htmlspecialchars($donnees['projets']) . "<br>";
	echo "Semestre : $donnees[niveau] <br>";
	echo "Posté le : $jour/$mois/$an à $heure:$min:$sec <br>";
	echo "Description : " . nl2br(htmlspecialchars($donnees['descr'])) . "<br>";
	if (!empty($donnees['fichier'])) echo "<a href='". htmlspecialchars(nl2br("$donnees[fichier]")) ."'> Lien des sources </a> <br>";
	echo "ID : $pid <br>";

	foreach ($membres as $donnees)
	{
		echo "<br>Membre : $donnees[prenom] $donnees[nom] ";
		if($var == FALSE) echo '<a href="../Vue/profil.php?supm='.$donnees['gid'].'" onclick="return confirm(\'Êtes-vous sûr ?\');">Supprimer le membre</a>';
	}

	if($var == FALSE)	
	{
		echo "<br> <form method='POST' action='../Controleur/c_ajouter_membre.php?pid=$pid'>";
		echo "Membre à ajouter (sous forme de mail NomDeFamille@intechinfo.fr) : <input type='text' name='Membre'>";
		echo "<input type='submit' name='Valider' value='Valider'>";
		echo "</form>";
	}		
?>

<br>

<?php

}

if($var == FALSE)	
{

?>

<a href="../Vue/profil.php?supp=<?php echo $pid; ?>" onclick="return confirm('Êtes-vous sûr ?');">Supprimer le projet</a>

<?php

}
}
}

if ($Rang == 'Prof' || $Rang == 'Admin')
{

?>

<?php if($var == FALSE)	
{ ?> <hr><br> <?php } ?><br>

<?php

if ($req['rang'] !== 'Eleve')
{

	if($var == TRUE)	
	{

?>

<h2>COURS PERSONNELS</h2>

<?php

$cours = modele_afficher_cours($bdd, $ID);
foreach ($cours as $donnees)
{
	list($an, $mois, $jour, $heure, $min, $sec) =
		sscanf($donnees['cdate'], '%4s-%2s-%2s %2s:%2s:%2s');

	echo "<br> Titre : " . htmlspecialchars($donnees['theme']) . "<br>";
	echo "Posté le : $jour/$mois/$an à $heure:$min:$sec <br>";
	echo "Description : " . nl2br(htmlspecialchars($donnees['descr'])) . "<br>";
	if (!empty($donnees['fichier'])) echo "<a href='". htmlspecialchars(nl2br("$donnees[fichier]")) ."'> Lien du cours </a> <br>";

	$buff = $donnees['cid'];

	if($var == FALSE)	
	{

?>

<br>
<a href="../Vue/profil.php?supc=<?php echo $buff; ?>" onclick="return confirm('Êtes-vous sûr ?');">Supprimer le cours</a>
<br>
<br>

<?php

}
}
} // Fin du if var==false
} // Fin du foreach
} // Fin du if rang prof admin

include("../Vue/footer.php");

?>

</div>

</body>

</html>
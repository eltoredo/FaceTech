<link rel="stylesheet" href="../CSS/fil.css">
<!-- Custom styles for this template -->
<link href="../Bootstrap/theme/assets/css/style.css" rel="stylesheet">
<link href="../Bootstrap/theme/assets/css/font-awesome.min.css" rel="stylesheet">

<?php

session_start();

$Email	 = $_SESSION['Email'];
$ID      = $_SESSION['ID'];

require("../Scripts/fonctions.js");
include("../Modele/m_afficher.php");
include("../Autres/conf.php");
require("../Modele/m_supprimer.php");
require("../Autres/erreurs.php");

?>

<CENTER><h1>Partie projets</h1></CENTER>

<br><br>

<h2>Poster un projet</h2> 

<br><br>

<form method="POST" enctype="multipart/form-data" action="../Controleur/c_poster_cp.php">

	Titre du projet : <input type="text" name="Titre">
	<br>
	Logo du projet : <input type="file" name="Logo">
	<br>
	Semestre du projet : 

	<select name="Semestre">
		<option value="1">Semestre 1</option>
		<option value="2">Semestre 2</option>
		<option value="3">Semestre 3</option>
		<option value="4">Semestre 4</option>
		<option value="5">Semestre 5</option>
		<option value="6">Semestre 6</option>
		<option value="7">Semestre 7</option>
		<option value="8">Semestre 8</option>
		<option value="9">Semestre 9</option>
		<option value="10">Semestre 10</option>
	</select>

	<br>
	Type du projet (PI ou PFH) - PI : <input type="radio" name="Type" value="PI" checked> PFH : <input type="radio" name="Type" value="PFH">
	<br>
	Nombre de membres : <input type="text" name="Nombre">
	<br>
	En cours ou fini ? En cours : <input type="radio" name="Statut" value="encours" checked> Fini : <input type="radio" name="Statut" value="fini">
	<br>
	Description du projet : <textarea name="Description" placeholder="N'hésitez pas à ajouter un lien pour tester le site / jeu !"></textarea>
	<br>
	Lien de téléchargement des sources du projet (optionnel) : <input type="text" name="Sources" value="http://"> - Ne pas retirer le 'http://' (ou https)

	<br><br>

	<input type="submit" name="Bouton" value="Valider">

</form>

<br><br><br><hr><br>

<b><span class='erreurs'> <?php if (isset($_GET['erreur_modifier_projet'])) echo erreur_modifier_projet($_GET['erreur_modifier_projet']).''; ?> </span></b>

<br><br>

<h2>Modifier un projet</h2>

<br><br>

<form method="POST" action="../Controleur/c_modifier_projet.php">

	Titre du projet : <input type="text" name="Titre">
	<br>
	Nouveau semestre du projet : 

	<select name="Niveau">
		<option value="1">Semestre 1</option>
		<option value="2">Semestre 2</option>
		<option value="3">Semestre 3</option>
		<option value="4">Semestre 4</option>
		<option value="5">Semestre 5</option>
		<option value="6">Semestre 6</option>
		<option value="7">Semestre 7</option>
		<option value="8">Semestre 8</option>
		<option value="9">Semestre 9</option>
		<option value="10">Semestre 10</option>
	</select>

	<br>
	Nombre de membres : <input type="text" name="membres">
	<br>
	Nouveau type du projet (PI ou PFH) - PI : <input type="radio" name="Type" value="PI" checked> PFH : <input type="radio" name="Type" value="PFH">
	<br>
	En cours ou fini ? En cours : <input type="radio" name="Statut" value="encours" checked> Fini : <input type="radio" name="Statut" value="fini">
	<br>
	Nouvelle description du projet : <textarea name="Description"></textarea>

	<br><br>

	<input type="submit" name="Bouton4" value="Valider" />

</form>

<br><br><br><br><hr><br>

<b><span class='erreurs'> <?php if (isset($_GET['erreur_ajouter_membre'])) echo erreur_ajouter_membre($_GET['erreur_ajouter_membre']).''; ?> </span></b>

<br><br>

<h2>Projets personnels</h2>

<br>

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
	if (!empty($donnees['nblike'])) echo "J'aime : $donnees[nblike] <br>";
	echo "ID : $pid <br>";

	foreach ($membres as $donnees)
	{
		echo "<br>Membre : $donnees[prenom] $donnees[nom] ";
		echo '<a href="../Vue/profil.php?supm='.$donnees['gid'].'" onclick="return confirm(\'Êtes-vous sûr ?\');">Supprimer le membre</a>';
	}

	echo '<br>';

	echo "<br> <form method='POST' action='../Controleur/c_ajouter_membre.php?pid=$pid'>";
	echo "Membre à ajouter (sous forme de mail NomDeFamille@intechinfo.fr) : <input type='text' name='Membre'>";
	echo "<input type='submit' name='Valider' value='Valider'>";
	echo "</form>";	
?>

<br>

<a href="../Vue/profil.php?supp=<?php echo $pid; ?>" onclick="return confirm('Êtes-vous sûr ?');">Supprimer le projet</a><br><br>

<?php

}
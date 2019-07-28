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

<CENTER><h1>Partie cours</h1></CENTER>

<h2>Poster un cours</h2>

<br><br>

<form method="POST" action="../Controleur/c_poster_cp.php">

	Thème du cours : <input type="text" name="Theme">
	<br>
	Semestre du cours : 

	<select name="Niveau2">
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
	Description du cours : <textarea name="Description2"></textarea>
	<br>
	Lien de téléchargement du cours (optionnel) : <input type="text" name="Fichier" value="http://"> - Ne pas retirer le 'http://' (ou https)

	<br><br>

	<input type="submit" name="Bouton2" value="Valider">

</form>

<br><br><br><hr><br>

<br><br>

<h2>Modifier un cours</h2>

<br><br>

<form method="POST" action="../Controleur/c_modifier_cours.php">

	Titre du cours : <input type="text" name="Titre">
	<br>
	Nouveau thème du cours : <input type="text" name="Theme">
	<br>
	Nouveau semestre du cours : 

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
	Nouvelle description du cours : <textarea name="Description"></textarea>

	<br><br>

	<input type="submit" name="Bouton5" value="Valider" />

</form>

<br><br><br><hr><br><br>

<h2>Cours personnels</h2>

<br>

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

?>

<br>
<a href="../Vue/profil.php?supc=<?php echo $buff; ?>" onclick="return confirm('Êtes-vous sûr ?');">Supprimer le cours</a>
<br>
<br>

<?php

}

include("../Vue/footer.php");

?>
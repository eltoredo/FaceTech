<link rel="stylesheet" href="../CSS/fil.css">
<!-- Custom styles for this template -->
<link href="../Bootstrap/theme/assets/css/style.css" rel="stylesheet">
<link href="../Bootstrap/theme/assets/css/font-awesome.min.css" rel="stylesheet">

<?php

session_start();

$Email	 = $_SESSION['Email'];
$ID      = $_SESSION['ID'];

require("../Scripts/fonctions.js");
require("../Autres/erreurs.php");
require_once("../Modele/m_voir_profil.php");
$req = modele_lire_profil($Email, $ID);

?>

<CENTER><h1>Vos informations personnelles</h1></CENTER>

Votre nom : <?php echo htmlspecialchars($req['nom']);?>
<br>
Votre prénom : <?php echo htmlspecialchars($req['prenom']);?>
<br>
Votre Email : <?php echo $req['email'];?>
<br>
Votre rang : <?php echo $req['rang'];?>
<br>
Votre classe : Semestre <?php echo $req['classe'];?>
<br>
<?php if (!empty($req['descr'])) echo 'Description : '.htmlspecialchars(nl2br($req['descr'])); ?>

<br><br>
<CENTER><h1>Modification de vos informations</h1></CENTER>
<br><br>

<form method="POST" enctype="multipart/form-data" action="../Controleur/c_modifier_profil.php">

	Votre avatar : <input type="file" name="Avatar">
	<br>
	Votre nom : <input type="text" name="Nom">
	<br>
	Votre prénom : <input type="text" name="Prenom">
	<br>
	Votre classe : 

	<select name="Classe">
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
	Description : <textarea name="Descr" placeholder="Parlez de vous !"></textarea>
	<br>
	Votre mot de passe : <input type="password" name="Mdp">
	<br>
	Votre nouveau mot de passe : <input type="password" name="NewMdp">
	<br>
	Confirmation de votre nouveau mot de passe : <input type="password" name="NewMdp2">

	<br><br>
	
	<input type="submit" name="Valider" value="Valider">

</form>
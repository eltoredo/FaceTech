<?php

session_start();

require("../Autres/erreurs.php");
require("../Scripts/fonctions.js");

?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8" />
	<title>Accès au site</title>
	<link rel="stylesheet" href="../CSS/index.css">
</head>

<body>

	<header>

		<div id="aligner"> <img src="../Images/Logo.png"> <p>Bienvenue sur la page d'inscription de Face'Tech</p>

			<form method="POST" action="../Controleur/c_connexion.php">

				<h2>Votre adresse Email : </h2> <input type="text" name="Email2" onblur="verifMail(this);">
				
				<h2>Votre mot de passe : </h2><input type="password" name="MDPC" onblur="verifMDP(this);">

				<div class="button"> <input style="border-radius: 0" type="submit" name="Bouton" value="Connexion"> </div>

			</form> 

		</div>

	</header>

	<br><br><br>

	<b><span id="erreurs"> <?php if (isset($_GET['erreur'])) echo erreur_index($_GET['erreur']).''; ?> </span></b>

	<br><br>

	<div id="espace">

		<div id="aligner2">

			<form method="POST" action="../Controleur/c_inscription.php">

				<h2>Votre nom</h2> <h2 style="margin-left: 15.2%">Votre prénom</h2>
				<br>
				<input type="text" name="Nom" placeholder="Dupont" value="<?php if (isset($_SESSION['Nom'])) echo $_SESSION['Nom']; ?>" onblur="verifPV(this);"> <input style="margin-left: 5.4%" type="text" name="Prenom" placeholder="Jean" value="<?php if (isset($_SESSION['Prenom'])) echo $_SESSION['Prenom']; ?>" onblur="verifPV(this);">
				
		</div>

			<div class="aligner3">

				<h2>Votre adresse Mail IN'TECH</h2> <input type="text" name="Email" placeholder="exemple@intechinfo.fr ou exemple@esiea.fr" value="<?php if (isset($_SESSION['Email'])) echo $_SESSION['Email']; ?>" onblur="verifMail(this);">

			</div>

			<div class="aligner4">
				
				<h2>Votre date de naissance </h2>
				Jour : <select name="Jour" >
				<?php for ($i=1; $i < 32 ; $i++) echo '<option>'.$i.'</option>'; ?>
				</select>
				Mois : <select name="Mois" >
				<?php for ($i=1; $i < 13 ; $i++) echo '<option>'.$i.'</option>'; ?>
				</select>
				Année : <select name="An" >
				<?php for ($i= date('Y')-100; $i < date('Y')-16 ; $i++) echo '<option>'.$i.'</option>'; ?>
				</select>

			</div>

			<div class="aligner3">
				
				<h2>Êtes-vous élève ou professeur ?</h2> <label for="Eleve"> <b>Élève</b> </label> : <input style="width: 2%; height: 10" type="radio" name="Rang" id="Eleve" value="Eleve" checked></label> <label for="Prof"> <b>Professeur</b> </label> : <input style="width: 2%; height: 10" type="radio" name="Rang" id="Prof" value="Prof">
				
				<h2>Votre semestre</h2>

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

			</div>

			<div class="aligner4">

				<h2>Votre mot de passe</h2> <input type="password" name="MDP" placeholder="✱✱✱✱✱✱✱✱✱✱" onblur="verifMDP(this);">

				<h2>Confirmation de mot de passe</h2> <input type="password" name="MDP2" placeholder="✱✱✱✱✱✱✱✱✱✱" onblur="verifMDP(this);">

			</div>

			<div class="aligner3">

				<br><br>

				Je confirme avoir lu et accepté les <a href="CGU.php">Conditions générales d'utilisation (CGU)</a>
				<br>
				en appuyant sur ce bouton.

				<br><br>

			</div>

				<div class="button"> <input type="submit" name="Bouton" value="Inscription"> </div>

			</form>

	</div>

	<div id="nouveautes">
		<CENTER><h1>NOUVEAUTÉ DU MOMENT</h1></CENTER>
		<img src="../Images/Nouveautes/Nouv1.jpg"><br>
		<p>Un grand bravo à Billy, Hugo, Abdelmadjid, Jolann et Kévin qui ont organisé, dans le cadre de leur PFH, un stream caritatif au profit de Make-A-Wish France avec ni plus ni moins que la fameuse Stream Team ! Soirée incroyable le 27 juin qui a permis de récolter... 32 581€ !!</p><br>
		<img src="../Images/Nouveautes/Nouv2.jpg"><br>
		<p>Les élèves avaient promis de se teindre les cheveux en blond s'ils atteignaient les 10 000€ de dons.<br>
		Enjeu dépassé (32580€ de dons) mais il s'avère que le rose était bien plus fun à porter ;)</p>

		<CENTER><a href="https://www.facebook.com/intechinfo/posts/10154897120448195">VOIR L'ARTICLE COMPLET</a></CENTER>
	</div>

	<?php include("../Vue/footer.php"); ?>

</body>

</html>
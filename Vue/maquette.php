<link rel="stylesheet" href="../CSS/maquette.css">

<?php

session_start();

?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="style.css">
</head>

<header>

	<a href="fil.php"><img src="../Images/Logo.png" width=18%></a>

	<form style="display: inline" action="../Vue/rechercher.php" method="post">
		<input type="text" name="rech" style="width: 30%; margin-left: 5%" placeholder="Rechercher">
	</form>
	
	<span id="espace"><a href="../Vue/profil.php"><img src="<?php echo $_SESSION['Avatar']; ?>" width=7%></a>
	<?php echo $_SESSION['Prenom'] . ' '; echo $_SESSION['Nom']; ?></span>
	- <a href="../Controleur/c_deconnexion.php" onclick='return confirm("Êtes-vous sûr de vouloir vous déconnecter ?");'>Déconnection</a>
	- <a href="../Controleur/c_desinscription" onclick='return confirm("Êtes-vous sûr de vouloir vous désincrire ? Cette option est définitive.");'>Désinscription</a>
	<?php if(isset($_SESSION['Rang'])) 
		  if($_SESSION['Rang'] == 'Admin') echo '- <a href="../Vue/page_admin.php">Administration</a>';
	?>
</header>

<body onload = '<?php if (isset($_GET['cp'])) if ($_GET['cp'] == 'p') echo 'projets();' ?>; <?php if (isset($_GET['cp'])) if ($_GET['cp'] == 'c') echo 'cours();' ?>; <?php if (isset($_GET['cp'])) if ($_GET['cp'] == 'pr') echo 'profil();' ?>; <?php if (isset($_GET['cp'])) if ($_GET['cp'] == 'prp') echo 'profilprojets();' ?>; <?php if (isset($_GET['cp'])) if ($_GET['cp'] == 'prc') echo 'profilcours();' ?>;'>

	<br><br>
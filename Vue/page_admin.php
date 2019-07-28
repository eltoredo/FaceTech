<link rel="stylesheet" href="../CSS/profil.css">
<!-- Custom styles for this template -->
<link href="../Bootstrap/theme/assets/css/style.css" rel="stylesheet">
<link href="../Bootstrap/theme/assets/css/font-awesome.min.css" rel="stylesheet">

<?php

include("maquette.php");
include("../Autres/conf.php");
include("../Controleur/c_back_office.php");
	

echo '<CENTER><h2>UTILISATEURS</h2></CENTER> <br><br>';

foreach ($requ as $key => $value)
{
	foreach ($value as $key2 => $value2)
	{
		echo ' - '.$key2.' : '.$value2;
	}

	$buffu = $value['id'];

?>

<a href="../Vue/page_admin.php?supu=<?php echo $buffu; ?>" onclick="return confirm('Êtes-vous sûr ?');">Supprimer</a>

<br><br>

<?php

} 

/* ============== PROJETS  ===================== */

echo '<br><br> <CENTER><h2>PROJETS</h2></CENTER> <br><br>';
foreach ($reqp as $key => $value)
{
	foreach ($value as $key2 => $value2)
	{
		echo ' - '.$key2.' : '.$value2;
	}

	$buffp = $value['id'];

?>

<a href="../Vue/page_admin.php?supp=<?php echo $buffp; ?>" onclick="return confirm('Êtes-vous sûr ?');">Supprimer</a>

<br><br>

<?php

}

/* ============== COURS ======================== */

echo '<br><br> <CENTER><h2>COURS</h2></CENTER> <br><br>';
foreach ($reqc as $key => $value)
{
	foreach ($value as $key2 => $value2)
	{
		echo ' - '.$key2.' : '.$value2;
	}

	$buffc = $value['id'];

?>

<a href="../Vue/page_admin.php?supc=<?php echo $buffc; ?>" onclick="return confirm('Êtes-vous sûr ?');">Supprimer</a>

<br><br>

<?php

}

include("../Vue/footer.php");

?>



</body>

</html>
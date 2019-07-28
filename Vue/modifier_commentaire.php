<?php 

include("maquette.php");
$CP = $_GET['cp'];

?> 

	Nouveau commentaire :

	<form method="POST" action="../Controleur/c_modifier_commentaire.php?cp=<?php echo $CP; ?>">
		<?php echo "<input type='hidden' name='id' value='$_POST[id]'>"?>
		<textarea name='commentaire'></textarea>
		<br>
		<input type="submit" name="valider" value="valider">
	</form>

</body>

</html>
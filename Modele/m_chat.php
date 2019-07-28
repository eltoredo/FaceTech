<?php

function modele_poster_message()
{
	if(trim($_POST['message']) === '') return 0;
	if(strlen($_POST['message']) > 100) return 1;

	else
	{
		include("../Autres/conf.php");

		$req = $bdd->prepare("
			INSERT INTO MESSAGES (uid, descr, mdate)
			VALUES(?, ?, ?)"
		);
		$req->execute(array($_SESSION['ID'], addslashes($_POST['message']), date("Y-m-d")." ".(date("H")).date(":i:s")));
	}
	return 23;
}

?>
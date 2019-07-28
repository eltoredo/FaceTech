<?php

function modele_modifier_profil($Nom, $Prenom, $Classe, $Descr, $Mdp, $NewMdp, $NewMdp2, $Avatar, $ID)
{
	include("../Autres/conf.php");

	$req2 = $bdd -> query("
		SELECT id, mdp, descr, nom, prenom, avatar
		FROM UTILISATEURS
		WHERE id = $ID"
	);
	$resultat2 = $req2 -> fetch();

	if (empty($Mdp)) return 2;

	if ($Avatar !== NULL)
	{		
		$NomFichier = $_FILES['Avatar']['name'];	
		$Dossier = '../Images/Avatars/'.$ID.'/';

		if (!file_exists($Dossier))
		{
			mkdir($Dossier, 0777);
		}

		$TailleMax = 5242880;
		$TailleFichier = filesize($_FILES['Avatar']['tmp_name']);
		$ExtensionsAut = array('.png', '.gif', '.jpg', '.jpeg', '.JPG','.PNG');
		$ExtensionFichier = strrchr($_FILES['Avatar']['name'], '.');

		$NomFichier = strtr($NomFichier, 
			'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
			'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		$NomFichier = preg_replace('/([^.a-z0-9]+)/i', '-', $NomFichier);
					
		if(move_uploaded_file($_FILES['Avatar']['tmp_name'], $Dossier.$NomFichier))
		{
			$_SESSION['Avatar'] = $Dossier.$NomFichier;
			$req3 = $bdd -> prepare("UPDATE UTILISATEURS SET avatar = '$Dossier$NomFichier' WHERE id = ?");
			$req3->execute(array($ID));
		}
		else return 1;
	}

	$Mdp = hash('sha256', $Mdp);

	if ($Mdp !== $resultat2['mdp']) return 3;

	if (empty($NewMdp)) $NewMdp = $resultat2['mdp'];
	if (empty($NewMdp2)) $NewMdp2 = $resultat2['mdp'];

	if ($NewMdp !== $NewMdp2) return 4;

	if (empty($Prenom))
	{
		$Prenom = $resultat2['prenom'];
		$_SESSION['Prenom'] = $resultat2['prenom'];
	}
	if (empty($Nom)) $Nom       = $resultat2['nom'];
	if (empty($Descr)) $Descr   = $resultat2['descr'];

	$req = $bdd->prepare(
		"UPDATE UTILISATEURS
		SET Nom = '$Nom', Prenom = '$Prenom', Classe = '$Classe', Descr = '$Descr', Mdp = '$NewMdp'
		WHERE id = ?"
	);

	$req->execute(array($ID));

	return 0;
 }

?>
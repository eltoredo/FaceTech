<?php

function modele_poster($Titre, $Logo, $Type, $Nombre, $Statut, $Semestre, $Description, $Sources, $Theme, $Niveau2, $Description2, $Fichier, $ID, $Bouton)
{
		include("../Autres/conf.php");
		
		if ($Bouton == 0)
		{
			if (empty($Titre) || empty($Type) || empty($Nombre) || empty($Statut) ||
				empty($Semestre) || empty($Description)) return 1;
			if (strlen($Titre) > 40) return 2;
			if ($Nombre < 1 || $Nombre > 15) return 3;
			if (strlen($Description) > 2400) return 4;
			else
			{
				$fil = $bdd -> prepare ("
					INSERT INTO PROJETS(nom, chef, type, pdate, membre, statut, niveau, descr, fichier)
					VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)"
				);

			   	$fil -> execute(array($Titre, $_SESSION['ID'], $Type, date("Y-m-d")." ".(date("H")).date(":i:s"), $Nombre, $Statut, $Semestre, $Description, $Sources));

				$resultat = $fil -> fetch();
				$fil -> closeCursor();
			}

			$logo = $bdd -> prepare(
					"SELECT id
					FROM PROJETS
					WHERE nom = ?"
				);
			$logo->execute(array($Titre));
			$resultat = $logo->fetch();

			if ($Logo !== NULL)
			{		
				$NomFichier = $_FILES['Logo']['name'];	
				$Dossier = '../Images/LogosP/'.$ID.'/';

				if (!file_exists($Dossier))
				{
					mkdir($Dossier, 0777);
				}

				$TailleMax = 5242880;
				$TailleFichier = filesize($_FILES['Logo']['tmp_name']);
				$ExtensionsAut = array('.png', '.gif', '.jpg', '.jpeg', '.JPG','.PNG');
				$ExtensionFichier = strrchr($_FILES['Logo']['name'], '.');
				
				if (!in_array($ExtensionFichier, $ExtensionsAut)) return 1;
				
				if ($TailleFichier > $TailleMax) return 2;

				$NomFichier = strtr($NomFichier, 
					'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
					'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
				$NomFichier = preg_replace('/([^.a-z0-9]+)/i', '-', $NomFichier);
					
				if(move_uploaded_file($_FILES['Logo']['tmp_name'], $Dossier.$NomFichier))
				{
					$req3 = $bdd -> prepare("UPDATE PROJETS SET logo = '$Dossier$NomFichier' WHERE id = ?");
					$req3->execute(array($resultat[id]));
				}
			}

			return 0;
		}
		else if ($Bouton == 1)
		{
			if (empty($Theme) || empty($Niveau2) || empty($Description2)) return 1;
			if ($Niveau2 < 1 || $Niveau2 > 10) return 2;
			if (strlen($Description2) > 2400) return 3;
			else
			{
				$fil = $bdd -> prepare ("
					INSERT INTO COURS(uid, theme, cdate, classe, descr, fichier)
					VALUES(?, ?, ?, ?, ?, ?)"
				);

			   	$fil -> execute(array($_SESSION['ID'], $Theme, date("Y-m-d")." ".(date("H")).date(":i:s"), $Niveau2, $Description2, $Fichier));

				$resultat = $fil -> fetch();
				$fil -> closeCursor();
			}
			return 0;
		}
}

?>
<?php

	function modele_ajouter_jaime($pid, $ID)
	{

		include('../Autres/conf.php');

		$nblike = $bdd->query(
			"SELECT nblike
			FROM PROJETS 
			WHERE id = $pid"
		);
		$donnees =  $nblike->fetchAll();

		foreach ($donnees as $donnees) {
			$nblike = $donnees['nblike'] + 1;

			$verif = $bdd->query(
									"SELECT id
									FROM JAIME
									WHERE pid = $pid
									AND   uid = $ID"
								);
			$verif = $verif->fetchAll();
	

			if(!$verif)
			{	
				$req1 = $bdd->prepare("
						UPDATE PROJETS
						SET nblike = $nblike
						WHERE id = $pid"
						);
				$req1->execute();
				$req1->closeCursor();
					
				$req2 = $bdd->prepare(
										"INSERT INTO JAIME(uid, pid)
										 VALUES('$ID', '$pid')"
									);
				$req2->execute();
				
			} else {
				$nblike = $donnees['nblike'];
			}
			return $nblike;

			

		}
		
	}


?>
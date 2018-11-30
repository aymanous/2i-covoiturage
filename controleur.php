<?php
session_start();

	include_once "libs/maLibUtils.php";
	include_once "libs/maLibSQL.pdo.php";
	include_once "libs/maLibSecurisation.php"; 
	include_once "libs/modele.php"; 

	$addArgs = "";

	if ($action = valider("action"))
	{
		ob_start ();
		echo "Action = '$action' <br />";
		// ATTENTION : le codage des caractères peut poser PB si on utilise des actions comportant des accents... 
		// A EVITER si on ne maitrise pas ce type de problématiques

		/* TODO: A REVOIR !!
		// Dans tous les cas, il faut etre logue... 
		// Sauf si on veut se connecter (action == Connexion)

		if ($action != "Connexion") 
			securiser("login");
		*/

		// Un paramètre action a été soumis, on fait le boulot...
		switch($action)
		{
			
			
			// Connexion //////////////////////////////////////////////////
			case 'Connexion' :
				// On verifie la presence des champs login et passe
				if ($login = valider("login"))
				if ($passe = valider("passe"))
				{
					// On verifie l'utilisateur, 
					// et on crée des variables de session si tout est OK
					// Cf. maLibSecurisation
					if (verifUser($login,$passe)) {
						// tout s'est bien passé, doit-on se souvenir de la personne ? 
						if (valider("remember")) {
							setcookie("login",$login , time()+60*60*24*30);
							setcookie("passe",$password, time()+60*60*24*30);
							setcookie("remember",true, time()+60*60*24*30);
						} else {
							setcookie("login","", time()-3600);
							setcookie("passe","", time()-3600);
							setcookie("remember",false, time()-3600);
						}
						echo valider("idUser","SESSION");
					}	
					$addArgs = "&msgGood=Connexion réussie ! Re bienvenue parmi nous ;)";
				}

				// On redirigera vers la page index automatiquement
			break;

			case 'Logout' :
				session_destroy();
				$addArgs = "&msgGood=Déconnexion réussie ! A bientôt ;)";
			break;

			case 'createTrajet' :
			
				if($date = valider("date"))
				if($heureDep = valider("heureDep"))
				if($place = valider("place"))
				if($radios = valider("radios"))
				if($commentaire = valider("commentaire"))
				if($_SESSION["idUser"])
				{
					$id = $_SESSION["idUser"];

					$datetime = $date . " " . $heureDep;

					$villeDepart = "Lens";
					$villeArrive = "Lille";
					
					
					if($radios == "lillelens"){
						$villeDepart = "Lille";
						$villeArrive = "Lens";
					}

					$result = insertGeneriqueBdd("trajet","`idConducteur`, `placeTotal`, `date`, `commentaire`, `villeDepart`, `villeArrive`","'$id', '$place', '$datetime', '$commentaire', '$villeDepart', '$villeArrive'");

					$addArgs = "&msgGood=Création de trajet réussie";
			}
			break;

			case 'setPresent' :

				if($idTrajet = valider("idTrajet"))
				if($_SESSION["idUser"])
				{
					$idUser = $_SESSION["idUser"];

					insertGeneriqueBdd("utilisateurtrajet","idUtilisateur,idTrajet","'$idUser','$idTrajet'");
				}

			break;

			case 'setNotPresent' :

				if($idTrajet = valider("idTrajet"))
				if($_SESSION["idUser"])
				{
					$idUser = $_SESSION["idUser"];

					deleteGeneriqueBdd("utilisateurtrajet","WHERE idUtilisateur=$idUser AND idTrajet=$idTrajet");
				}

			break;




		}

	}

	// On redirige toujours vers la page index, mais on ne connait pas le répertoire de base
	// On l'extrait donc du chemin du script courant : $_SERVER["PHP_SELF"]
	// Par exemple, si $_SERVER["PHP_SELF"] vaut /chat/data.php, dirname($_SERVER["PHP_SELF"]) contient /chat

	$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";
	// On redirige vers la page index avec les bons arguments

	header("Location:" . $urlBase . "?".$addArgs);

	// On écrit seulement après cette entête
	ob_end_flush();
	
?>











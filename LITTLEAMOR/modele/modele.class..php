<!DOCTYPE html>
<!-- ++++++++++++++++++ À COMPLÉTER ++++++++++++++++++++++-->
<html lang="fr">

<head>
    <title>Démo5D_01</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="styleTable.css" />
</head>

<body>
    <!-- ============================= Access BD =========================== -->
    <!-- La classe PDO (PHP data object) 
      permet de gérer la connexion à la base de données  -->
    <h1>Accès direct à la BD (avec PDO::query)</h1>
    <?php
	    // try catch pour attraper les erreurs de connexion ...
		try {
			// Connexion et configuration pour les caracrtères UTF-8
			$connexion = new PDO('mysql:host=localhost;dbname=commerce', "root", "root");
			//Définir UTF-8 comme jeu de caractères
			$connexion->exec("SET character_set_results = 'utf8'");	
		
			// Étape 1 : Exécuter la requête SELECT avec query (... tous les produit)
		     $resultats = $connexion->query("select * from produit ");

			// Étape 2 : Vérifier si le résultat est vide
			// La méthode rowCount() renvoie le nombre de lignes affectées
			// par la dernière instruction SQL
			if($resultats->rowCount()==0){
				//echo "Pas trouvé";
				echo "Pas trouvé";
			}else{

				// Étape 3 : Utiliser les résultats
			
              	echo "<h1>Affichage Description,Prix et Photo du produit</h1>";
				foreach($resultats as $enr){
						//echo "Description: ".", prix:"."\$<br />";
						//echo "Photo : " .'<img src="' .$enr['url_photo'] .'">';
						echo "Description : ".$enr['description'];
						echo ",      Prix: ".$enr['prix'] . "\$";
						echo ", Photo : " .'<img src="images/' .$enr['url_photo'] .'">'."<br/><br/><br/>" ;
				}

			}

				
				

		 } catch (PDOException $e) {
			echo "Erreur : ".$e->getMessage()."<br />";
		}
		$connexion=null;
	?>
</body>

</html>
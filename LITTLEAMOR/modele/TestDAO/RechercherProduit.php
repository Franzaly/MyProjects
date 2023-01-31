<!--
Description : fichier avec formulaitres pour utiliser la classe produitDAO (Exercice 2)

-->
<!DOCTYPE html>
<html lang="fr"> 

<head>
	<title>Ajouter un produit</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<style>
		h1 {
			background-color: black;
			color: white;
		}

		h2 {
			background-color: #CCCCCC;
		}

		.affichage {
			background-color: #AAFFAA;
		}
	</style>
</head>

<body>


	<!---------------------- Formulaire 1, recherche par code ------------>


	<h1>Formulaire de recherche</h1>
	<form action="testRechercherProduitDAO.php" method="post">
		<label for="recherche">Code  :</label>
		<input id="recherche" type="search" name="recherche" />


		<input type="hidden" name="NumeroFormulaire" value="1" />

		<input type="submit" value="Soumettre" />
	</form>



</body>

</html>
<!--
Description : fichier de tests pour la classe produitDAO

-->
<!DOCTYPE html>
<html lang="fr">

<head>

	<meta charset="utf-8" />
	<style>
		h1 {
			background-color: black;
			color: white;
		}

		h2 {
			background-color: #CCCCCC;
		}

		.complete {
			background-color: #88FF88;
		}
	</style>
</head>

<body>
	<!---- Inclusions DAO ---->
	<h1> pour la classe ProduitDAO</h1>
	<?php
	// si la constante n'existe pas, on la crée

	// Importe l'interface DAO et la classe Produit
	include_once("../../modele/produit.class.php");
	include_once('../../modele/DAO/produitDAO.class.php'); 
	?>

	<!-- Test de la méthode chercher -->
	<h2>Méthode chercher</h2>
	<?php
	$recherche = $_GET['recherche'];
	echo "<h3>On chercher l'item avec le code $recherche (il existe ...):</h3>";
	//	$unProduit=null; // remplacer le null, par l'appel de la bonne méthode 

	$unProduit = ProduitDAO::chercher($recherche);
	echo "<ul><li> Produit $recherche => " . ($unProduit ? $unProduit : "n'exsite pas") . "</li></ul>";
	echo "<img src='./../../images/".$unProduit->getUrlPhoto()."'>"

	?>

</body>

</html>
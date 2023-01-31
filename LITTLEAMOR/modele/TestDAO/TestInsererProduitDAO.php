<!--
Description : fichier de tests pour la classe produitDAO

-->
<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Démo 5D2 #1</title>
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
	<h1>Test pour la classe ProduitDAO</h1>
	<?php
	// si la constante n'existe pas, on la crée

	// Importe l'interface DAO et la classe Produit
	include_once("./../modele/produit.class.php");
	include_once('./../..ProduitDAO.class.php');
	?>

	<!-- Test de la méthode chercher -->
	<h2>Méthode chercher</h2>
	<?php
	echo "<h3>On chercher l'item avec le code 101 (il existe ...):</h3>";
	//	$unProduit=null; // remplacer le null, par l'appel de la bonne méthode 
	$recherche = $_GET['recherche'];
	$unProduit = ProduitDAO::chercher($recherche);
	echo "<ul><li> Produit 101 => " . ($unProduit ? $unProduit : "n'exsite pas") . "</li></ul>";

	echo "<h3>On chercher l'item avec le code 999 (il n'existe pas ...):</h3>";
	//	$unProduit=null; 
	$recherche = 999;
	$unProduit = ProduitDAO::chercher($recherche);
	echo "<ul><li> Produit 999 => " . ($unProduit ? $unProduit : "n'exsite pas") . "</li></ul>";
	?>





	<!-- Test de la méthode insérer -->
	<h2>Méthode inserer</h2>
	<?php
	echo "<h3>On insère 2 fois le produit #555</h3>";
	$code = $_GET['code'];
	$description = $_GET['description'];
	$prix = $_GET['prix'];
	$quantite = $_GET['quantite'];
	$url_photo = $_GET['url_photo'];
	$unProduit = new Produit($code, $description,  $url_photo, $prix, $quantite);

	//	$test=null; // remplacer le null, par l'appel de la bonne méthode 

	$test = ProduitDAO::inserer($unProduit); // va réussir la 1ere fois
	echo "<ul><li>Insertion #1" . ($test ? " a réussie" : " a échouée") . "</li></ul>";

	$test = ProduitDAO::inserer($unProduit); // va réussir la 2eme fois
	echo "<ul><li>Insertion #2" . ($test ? " a réussie" : " a échouée") . "</li></ul>";

	?>



	<!-- Test de la méthode chercherTous -->
	<h2>Méthode chercherTous</h2>
	<?php
	echo "<h3>On chercher tous les produits:</h3>";
	//	$tabProduits=null; // remplacer le null, par l'appel de la bonne méthode 
	$tabProduits = ProduitDAO::chercherTous();
	echo "<ul>";
	foreach ($tabProduits as $unProduit) {
		echo "<li>$unProduit</li>";
	}

	echo "</ul>";
	?>

	<!-- Test de la méthode modifier -->


	<!-- Test de la méthode chercherAvecFiltre -->



</body>

</html>
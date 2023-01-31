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
	include_once("../../modele/produit.class.php");
	include_once('../../modele/DAO/produitDAO.class.php');
	?>

	<!-- Test de la méthode chercher -->
	<h2>Méthode chercher</h2>
	<?php
	echo "<h3>On chercher l'item avec le code 101 (il existe ...):</h3>";
	//	$unProduit=null; // remplacer le null, par l'appel de la bonne méthode 
	$unProduit = ProduitDAO::chercher(101);
	echo "<ul><li> Produit 101 => " . ($unProduit ? $unProduit : "n'exsite pas") . "</li></ul>";

	echo "<h3>On chercher l'item avec le code 999 (il n'existe pas ...):</h3>";
	//	$unProduit=null; 
	$unProduit = ProduitDAO::chercher(999);
	echo "<ul><li> Produit 999 => " . ($unProduit ? $unProduit : "n'exsite pas") . "</li></ul>";
	?>

	<!-- Test de la méthode chercherTous -->
	<h2>Méthode chercherTous</h2>
	<?php
	echo "<h3>On chercher tous les produits:</h3>";
	//	$tabProduits=null; // remplacer le null, par l'appel de la bonne méthode 
	$tabProduits = ProduitDAO::chercherTous();
	echo "<ul>";
	foreach ($tabProduits as $unProduit) {
		echo "<li>";
		echo $unProduit;
		// echo "<img src='./../../images/".$unProduit->getUrlPhoto()."'>";
		echo "</li>";

	}

	echo "</ul>";
	?>

	<!-- Test de la méthode chercherAvecFiltre -->
	<h2>Méthode chercherAvecFiltre</h2>
	<?php
	echo "<h3>On chercher tous les produits ayant tournevis plat dans la description:</h3>";
	// remplacer le null, par l'appel de la bonne méthode 
	$tabProduits = ProduitDAO::chercherAvecFiltre("WHERE description LIKE '%Tournevis plat%'");
	echo "<ul>";
	foreach ($tabProduits as $unProduit) {
		echo "<li>$unProduit</li>";
	}

	echo "</ul>";
	?>

	<!-- Test de la méthode insérer -->
	<h2>Méthode inserer</h2>
	<?php
	echo "<h3>On insère 2 fois le produit #555</h3>";
	$unProduit = new Produit(556, 'Banc de scie économique', 'aucune', 456.78, 2);

	//	$test=null; // remplacer le null, par l'appel de la bonne méthode 

	$test = ProduitDAO::inserer($unProduit); // va réussir la 1ere fois
	echo "<ul><li>Insertion #1" . ($test ? " a réussie" : " a échouée") . "</li></ul>";

	$test = ProduitDAO::inserer($unProduit); // va réussir la 2eme fois
	echo "<ul><li>Insertion #2" . ($test ? " a réussie" : " a échouée") . "</li></ul>";

	?>

	<!-- Test de la méthode modifier -->
	<h2>Méthode modifier</h2>
	<?php
	echo "<h3>On modifie le produit #555</h3>";
	$unProduit = ProduitDAO::chercher(555);
	$unProduit->setPrix(999.99);
	$unProduit->setDescription('Banc de scie deluxe23');
	$unProduit->ajouterAuStock(22);
	// Appeler la bonne méthode pour faire la modification
	ProduitDAO::modifier($unProduit);
	// Vérification
	//	$unProduit=null; // remplacer le null, par l'appel de la bonne méthode pour récuperer le produit 555 
	$unProduit = ProduitDAO::chercher(555);
	echo "<ul><li>Produit #555 " . ($unProduit ? $unProduit : "n'exsite pas") . "</li></ul>";
	?>

	<!-- Test de la méthode chercherAvecFiltre -->
	<h2>Méthode supprimer</h2>
	<?php
	echo "<h3>On suprime le produit #555</h3>";
	// Appeler la bonne méthode pour faire la suppression
	// on cherche d'abord le produit
	$unProduit = ProduitDAO::chercher(556);
	// Puis le supprimer
	ProduitDAO::supprimer($unProduit);
	// Vérification
	//	$unProduit=null; // remplacer le null, par l'appel de la bonne méthode pour récuperer le produit 555 
	$unProduit = ProduitDAO::chercher(556);
	echo "<ul><li>Produit #555 " . ($unProduit ? $unProduit : "n'exsite plus") . "</li></ul>";
	?>


</body>

</html>
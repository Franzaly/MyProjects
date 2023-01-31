
<?php

/******************************************************************
 	Labo 4 #2-3 : Fonctions d'affichage pour le menu et pour 
	              un produit
	Nom         :                                    
 *******************************************************************/

function afficherErreurs($tabMessages)
{
	if (count($tabMessages) > 0) {
		echo "<div class='erreur'>";
		echo "<ul>";
		foreach ($tabMessages as $message) {
			echo "<li>$message</li>";
		}
		echo "</ul>";
		echo "</div>";
	}
}
// #2 : Utilisez le tableau reçu en paramètre pour afficher les options 
//      du menu dans des éléments li d'une liste ul. 
//      Ajoutez la classe css 'option_active' pour l'élément li correspondant 
//      à l'indice reçu en paramètre.  
//      Voir l'énoncé pdf pour voir ce à quoi doit ressemble le format final.     
function afficherMenu($tableau, $indiceOptionActive)
{
	echo "<ul>";
	$i = 0;
	foreach ($tableau as $itemMenu => $lien) {
		$classe = "";
		if ($indiceOptionActive == $i) {
			$classe = " class='option_active'";
		}
		echo "<li $classe><a href='$lien'>$itemMenu</a></li>";
		$i++;
	}
	echo "</ul>";
}


// #3 : Utilisez les méthodes de la classe Automobile 
//       pour afficher le modèle, la couleur et le prix final dans un liste umask    
function afficherUnProduit($unProduit)
{
	echo "<ul>";
	echo "<li>Description :" . $unProduit->getDescription() . "</li>";
	echo "<li>Prix :" . $unProduit->getPrix() . " $</li>";
	echo "</ul>";
}

// #4 : Utilisez les méthodes de la classe Accessoire 
//       pour afficher le code, la quanite, et le nom 
//       de chaque accessoire du tableau reçu dans une table html_entity_decode    
function afficherTableProduits($unTableau)
{

	$utilisateur_id = 0;

    if(isset($_SESSION['utilisateur_id'])){

        $utilisateur_id = $_SESSION['utilisateur_id'];
    }

	// ... Début de la table
	echo "<table class=tableproduit>";
	// ... Entête de la table 
	echo "<thead>";
	echo "<tr>";
	echo "<th>#</th> ";
	echo "<th>Description</th>";
	echo "<th>Prix unitaire</br>suggéré</th>";
	echo "<th>Photo</th>";
	echo "</tr>";
	echo "</thead>";
	// ... Body de table 
	// ******************** à compléter : doit afficher les éléments de $unTableau 

	$i = 0;
	echo "<tbody class=tablesprroduit>";
	foreach ($unTableau as $unProduit) {
		$i++;
		echo "<tr>";
		echo "<td>" . $i . "</td>";
		echo "<td>" . $unProduit->getDescription() . "</td>";
		echo "<td>" . $unProduit->getPrix() . "</td>";
		echo  "<td class='imageContainer'>" . "<img class='imageProduit' alt='" . $unProduit->getDescription() . "' src='images/" . $unProduit->getUrlPhoto() . "' />" . "</td>";
		echo "<td>";

		if(!isset($_GET['action']) || $_GET['action'] != 'voirCart'){
		?>
            <div class='produit_actions'>
                <form method='post' action='?action=addToCart'>
                    <input type="hidden" name="utilisateur_id" value="<?=$utilisateur_id?>">
                    <input type="hidden" name="produit_code" value="<?=$unProduit->getCode()?>">
                    <button class='produit_btn btn btn-info'>Add to cart</button>
                </form>
            </div>

			<?php 
			}else{
			?>
			<div class='produit_actions'>
                <form method='post' action='?action=removeCart'>
                    <input type="hidden" name="utilisateur_id" value="<?=$utilisateur_id?>">
					<input type="hidden" 	 name="cart_id" value="<?=$unProduit->getCart()->getId()?>">
                    <input type="hidden" name="produit_code" value="<?=$unProduit->getCode()?>">
                    <button class='produit_btn btn btn-danger'>remove</button>
                </form>
            </div>

		<?php
		}

	
		echo "</td>";
		echo "</tr>";
	}
	echo "</body>";
	// *******************
	// ... Fin de la table
	echo "</table>";
}


//fonction pour afficher les produitt par categorie
function afficherListProduits($unTableau)
{
	// ... Début de la table

    $utilisateur_id = 0;

    if(isset($_SESSION['utilisateur_id'])){

        $utilisateur_id = $_SESSION['utilisateur_id'];
    }

?>

    <div class='produits acceuil'>
    <?php
        foreach ($unTableau as $unProduit) {
    ?>
        <div class='produit'>

            <div class='produit_image'>
                <a  href=''>
                    <img src='images/<?=$unProduit->getUrlPhoto()?>' alt='imgprobase'/>
                </a>
            </div>

            <div class='produit_info'>
                <p class='produit_prix'> <?=$unProduit->getPrix()?></p>
                <p class='produit_description'><?=$unProduit->getDescription()?></p>
            </div>

			<?php 
			if(!isset($_GET['action']) || $_GET['action'] != 'voirCart'){
			?>
            <div class='produit_actions'>
                <form method='post' action='?action=addToCart'>
                    <input type="hidden" name="utilisateur_id" value="<?=$utilisateur_id?>">
                    <input type="hidden" name="produit_code" value="<?=$unProduit->getCode()?>">
                    <button class='produit_btn btn btn-info'>Add to cart</button>
                </form>
            </div>

			<?php 
			}else{
			?>
			<div class='produit_actions'>
                <form method='post' action='?action=removeCart'>
                    <input type="hidden" name="utilisateur_id" value="<?=$utilisateur_id?>">
                    <input type="hidden" name="cart_id" value="<?=$unProduit->getCart()->getId()?>">
                    <input type="hidden" name="produit_code" value="<?=$unProduit->getCode()?>">
                    <button class='produit_btn btn btn-danger'>remove to cart</button>
                </form>
            </div>
			<?php 
			}
			?>

			
			
        </div>
        <?php
    }
    ?>
    </div>

    <?php
}


?>
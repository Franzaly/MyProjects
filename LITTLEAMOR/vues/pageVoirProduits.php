<!-- On redirige vers l'inde du site si on essaie d'avoir une accès direct -->
<?php if (!isset($controleur)) header("Location: ..\index.php"); ?>




    <div class="conteneur_principal">
    <div class="zoneMenu">
            <h2> OPTION ADMIN </h2>
            <!---------------- MENU --------------------->
            <ul>
                
                <li>
                    <a href='?action=voirProduits'>Voir les produits</a>
                </li>
                <li>
                    <a href='?action=ajouterProduit'>Ajouter un produit</a>
                </li>
                <li>
                    <a href='?action=chercherProduit'>Chercher un produit</a>
                </li>
                <li class='option_active'>
                    <a href='?action=admin'>admin</a>
                </li>
                <?php
                $typeActeur = $controleur->getActeur(); // ------------- À remplacer par l'attribut du controleur
                if ($typeActeur == "visiteur") {
                    echo "<li class='option_active'><a href='?action=seConnecter'>Se connecter</a></li>";
                } else { 
                    echo "<li><a href='?action=seDeconnecter'>Se deconnecter</a></li>";
                }
                ?>
            </ul> 
            <!--------------- FIN DU MENU --------------->
        </div>
        <div class="zone_centre">

            <h2>Les produits</h2>

            <?php
            // ==================== Utilisation des fonctions d'affichage ===================== 
            include "vues/inclusions/functions.inc.php";
            afficherListProduits($controleur->getTabProduits());

            ?>



        </div>
       
    </div>



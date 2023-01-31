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
                    <a href='?action=chercherProduit'>Cher un produit</a>
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
            <?php

            include_once "vues/inclusions/functions.inc.php";
            echo "<div class='erreur'>";
            afficherErreurs($controleur->getMessagesErreur());
            echo "</div>";
            ?>
            <div class="contenu_centre_petit">
                <h2>Deconnexion</h2>
                <div>
                    <!-- .... Connexion ..... -->
                    <form method="post" action="?action=seDeconnecter">
                        <div class="rangee-formulaire">
                            <input type="hidden" name="deconnexion" value="oui" />
                            <input class="bouton-formulaire" type="submit" value="Se déconnecter" /><br />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>

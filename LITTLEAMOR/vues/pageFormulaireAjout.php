

    <div class="panel panel-default">

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
        <div class="panel-heading">
            <h1 align="center">Ajouter un produit</h1>
            <nav></nav>
        </div>
        <div class="panel-body">
            <form id="signupForm" method="post" class="form-horizontal" action="?action=ajouterProduit">

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="code">Code:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="code" name="code" placeholder="code" required />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="description">Description :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="description" name="description"
                            placeholder="description" required />
                    </div>
                </div>
             

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="photo">Photo : </label>
                    <div class="col-sm-5">
                        <input type="file" name="photo" class="form-control" id="photo" title="La photo est obligatoire"
                            required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="code">Prix:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="prix" name="prix" placeholder="prix" required />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="quantite">Quantite :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="quantite" name="quantite" placeholder="quantite"
                            required />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="code">Categorie:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="categorie" name="categorie" placeholder="categorie" required />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-4">
                        <input type="submit" class="btn btn-primary btn-lg" value="Enregistrer" id="submit" />
                        <!-- Pour desactiver le bouton utilisez disabled="disabled" comme ceci:
										<input type="submit"  class="btn btn-primary btn-lg" 
										value="Inscription"  id="submit" disabled="disabled" />  -->
                    </div>
                </div>
            </form>
        </div>
    </div>
 
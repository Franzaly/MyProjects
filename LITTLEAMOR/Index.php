<?php
    // *****************************************************************************************
	// Description : Contrôleur frontal du site
	// Date        : 27 novembre 2021
	// Auteur      : Dini Ahamada
    // *****************************************************************************************
	//Le contrôleur frontal reçoit la requête avec un paramètre lui indiquant l’action à accomplir. 	
	//Inclusion de la manufacture de controleur (qui importe déjà tous les contrôleur)
	include_once "controleurs/controleurLitttleamor.class.php";
	
	//Obtenir le bon controleur
	//Si la requête contenant le paramètre action n'est pas renseigne
	if(!ISSET($_GET['action'])){
			// on reste à la page d'accueil
         $action="";

	}else{
		// Sinon on recupere l’action indiqué à accomplir
		$action = $_GET['action'];

	}
   
	

//Creer une instance du contrôleur adapté 
$controleur = Litttleamor::creerControleur($action);
//qui contient maintenant des données qui peuvent être utilisées par la vue.
	
	
	// Executer l'action et obtenir le nom de la vue
   $nomVue = $controleur->executerAction();
	
	// inclure la bonne vue
	// include_once("vues/". $nomVue . ".php")

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/bb502ba001.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="CSS/style.css">


       <!--cee java script Trigger Button Click on Enter-->
       <script>
        var input = document.getElementById("myInput");
        input.addEventListener("keypress", function(event) {
          if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("myBtn").click();
          }
        });


        function addToCart(utilisateur_id, produit_code) {

        
          alert(utilisateur_id + " - " + produit_code);

          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              console.log(responseText);
            }
          };
          xmlhttp.open("GET", "gethint.php?q=" + str, true);
          xmlhttp.send();
        }


        </script>

        <!--cart icon-->

</head>
<body>

    <div class="principale"> 
        <header>

          <div class="entete"> 
                
              <div class="logocontainer">
               <a href="http://localhost/coursphps4/coursphpS4/personalLearning/LITTLEAMOR" ><img class="logoimg" src="images/logo.png" alt="mylogo"  />
              </div> </a>

              <?php

                $filtre="where utilisateur_id = ". $_SESSION['utilisateur_id'];
                $produits=CartDAO::chercherAvecFiltre($filtre);	
               ?>

                <!--cart icon-->
                <div class="cartcontainer">
                 <a href="?action=voirCart"><button class="btn"><i class="fa-solid fa-cart-shopping"></i>  <?= count($produits) ?></button> </a>
                </div>
               
            <div class="entetessond">
                <div class="search"> 
                    <!--formulairre de recheerche de produit-->
                    <!--ici on dit au forrmulairre de prendre les informatiions avec la metthode get
                    ca va appaitree dans le search bar si on veut pas on met la methode post
                  une fois on a linformation on le met dans un folder appeler rreecherchee et on lenvoie
                a laction testRechercherProduitDAO.php-->
                  <form action="?action=chercherProduit" method="post">
                    <input id="recherche" type="search" name="recherche"  placeholder="Search.."/>
                    <input type="hidden" name="typeRecherche"  value="parDescription"/>
                    <input type="hidden" name="NumeroFormulaire" value="1" />
                  </form>

               
                </div>

                <?php
                  if (!isset($_SESSION['utilisateurConnecte'])) {
                ?>
                  <div class="logintop"> 
                      <button class="dropbtnlog">Login </button>
                      <div class="logintop-content">
                        <a href="?action=loginUser">User</a>
                        <a href="?action=loginAdmin">Admin</a>
                      </div>
                 </div>

                <?php  
                  }else{  
                ?>

                <div class="logintop"> 
                      <button class="dropbtnlog"><i class="fa-solid fa-user"></i> - <?=$_SESSION['utilisateurConnecte']?></button>
                      <div class="logintop-content">

                        <?php 
                          if($_SESSION['utilisateurConnecte'] == 'admin1'){
                            echo "<a href='?action=admin'>Admin</a>";
                          }
                        ?>
                        <a href="?action=pageMyAccount">account</a>
                        <!-- <a href="?action=seDeconnecter">Deconnecter</a> -->
                        <form method="post" action="?action=seDeconnecter">
                          <div class="rangee-formulaire">
                              <input type="hidden" name="deconnexion" value="oui" />
                              <input class="bouton-formulaire" type="submit" value="Se déconnecter"/>
                          </div>
                        </form>
                      </div>
                </div>

               <?php 
               
                  } 
               ?> 
               



              </div>
         </div>
                

        </div>

            

            <nav class="topnavigation">  
              <button class="dropbtnmenu">Menu</button>   
              <div class="topnavigation-content">
                     <a href=".?action=pageAcceuilDefaut"> Accueil</a> 
                     <a href=".?action=pageMaternity"> Maternity</a> 
                    <a href=".?action=pageBaby"> Baby</a> 
                    <a href=".?action=pageTodler"> Todler</a> 
                    <a href=".?action=pageYougth"> Yougth</a> 
              </div>
            </nav>
        </header>

        <?php

        if(isset($_SESSION["messagessuccess"])){
          echo " <div class='alert alert-success' role='alert'>".$_SESSION["messagessuccess"] ."</div>";
          unset($_SESSION["messagessuccess"]);
        }

        if(isset($_SESSION["messagesErreur"])){
          echo " <div class='alert alert-warning' role='alert'>".$_SESSION["messagesErreur"] ."</div>";
          unset($_SESSION["messagesErreur"]);
        }

 

        include_once("vues/". $nomVue . ".php");
        // print_r($controleur);

        ?>
          
      </div>
    </body>
    <footer>
      <nav class="footernavigation">     
        <ul class="listfoot">
            <li><a href=".?action=pageAbout"> About</a></li>
            <li><a href=".?action=pageContact"> Contact</a></li> 
            <li><a href=".?action=pageShipping"> Shipping</a></li>               
            <li><a href=".?action=pageReturn"> Return</a></li>               
            <li><a href=".?action=pageMyAccount"> My Account</a></li> 
        </ul>
    </nav>


    </footer>
</html>
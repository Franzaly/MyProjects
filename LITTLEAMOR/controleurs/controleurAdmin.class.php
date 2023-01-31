<?php
   // *****************************************************************************************
	// Description   : Contrôleur spécifique pour l'action de voirProduits qui s'occupe de gérer
	//                 l'affichage de l'ensemble des produits
	// Date        : 27 novembre 2021
	// Auteur      : Dini Ahamada
    // *****************************************************************************************
	//include_once("../controleur.abstract.class.php");
//	include_once("modele/DAO/infoAccessoireDAO.class.php");
	// include_once("./modele/DAO/ProduitDAO.class.php");
	// include_once("./modele/produit.class.php");

	class Admin extends  Controleur {
		// ******************* Attributs
		private $tabProduits;
		
		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
			$this->tabProduits=array();
		}
		
		// ******************* Accesseurs
		public function getTabProduits(){
			return $this->tabProduits;
		}

		// ******************* Méthode exécuter action
		public function executerAction() {
			
			if(ISSET($_REQUEST["id"])){
				 // $numProd = $_REQUEST["id"];
				$unCode =  $_REQUEST["id"];
          $unProduit = ProduitDAO::chercher($unCode);
		//    // Puis le supprimer
              ProduitDAO::supprimer($unProduit);

			}elseif(ISSET($_REQUEST["modifier"])){
				$unCode=$_REQUEST["modifier"];
				 $unProduit = ProduitDAO::chercher($unCode);
               $unProduit->setPrix(999.99);
			 $unProduit->setDescription('Banc de scie deluxe');
			 $unProduit->ajouterAuStock(22);
			// Appeler la bonne méthode pour faire la modification
            ProduitDAO::modifier($unProduit);

			}

		
			 $this->tabProduits=ProduitDAO::chercherTous();	
			return "pageadmin";
		}


		
	}	
	
?>
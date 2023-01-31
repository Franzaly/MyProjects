<?php
   // *****************************************************************************************
	// Description   : Contrôleur spécifique pour l'action de voirProduits qui s'occupe de gérer
	//                 l'affichage de l'ensemble des produits
	// Date        : 27 novembre 2021
	// Auteur      : Dini Ahamada
    // *****************************************************************************************
	include_once("controleurs/controleur.abstract.class.php");
//	include_once("modele/DAO/infoAccessoireDAO.class.php");
	include_once("modele/DAO/ProduitDAO.class.php");
	include_once("modele/produit.class.php");

	class AjouterProduit extends  Controleur {
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
			
			if(ISSET($_REQUEST["code"])){
				$code=$_POST["code"];
				$description=$_POST["description"];
				$photo=$_POST["photo"];
				$prix=$_POST["prix"];
				$quantite=$_POST["quantite"];
				$unProduit = new Produit($code,$description,$photo, $prix, $quantite);
				ProduitDAO::inserer($unProduit);
			}

			

			$this->tabProduits=ProduitDAO::chercherTous();	
			return "pageFormulaireAjout";
		}


		
	}	
	
?>
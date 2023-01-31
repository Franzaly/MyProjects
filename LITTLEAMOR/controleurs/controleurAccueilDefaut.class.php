<?php
    // *****************************************************************************************
	// Description   : Contrôleur spécifique pour toutes les actions non-valides qui rammène à la
	//                 page d'accueil
	// Date        : 27 novembre 2021
	// Auteur      : Dini Ahamada
    // *****************************************************************************************
	include_once("controleurs/controleur.abstract.class.php");
//Créer un controleur nommé Defaut hérite du controleur abstraite
//retourne la page d'accueil
	class AccueilDefaut extends Controleur  {
		
		// ******************* Constructeur vide
		public function __construct() {
			//appel du constructeur parent
			parent::__construct();
		}

		// ******************* Méthode exécuter action
		public function executerAction() {
			$this->tabProduits=ProduitDAO::chercherTous();	
			return "pageAccueil";
		}
		

		// ******************* Accesseurs
		public function getTabProduits(){
			return $this->tabProduits;
		}


				
		


		
	}	
	
?>
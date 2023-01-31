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
	class PageTodler extends Controleur  {
		
		// ******************* Constructeur vide
		public function __construct() {
			//appel du constructeur parent
			parent::__construct();
		}
		

		// ******************* Méthode exécuter action
		// implémenter la méthde executerAction
		// retournez la page d'accueil
		public function executerAction()
		{
			$this->tabProduits=ProduitDAO::chercherAvecFiltre("WHERE categorie_id = 2");
			return "pageTodler";
		}

		// ******************* Accesseurs
		public function getTabProduits(){
			return $this->tabProduits;
		}



		
	}	
	
?>
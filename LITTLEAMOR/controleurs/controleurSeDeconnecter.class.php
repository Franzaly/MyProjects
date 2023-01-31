<?php
    // *****************************************************************************************
	// Description   : Contrôleur spécifique pour toutes les actions non-valides qui rammène à la
	//                 page d'accueil
	// Date        : 12 Decembre  2021
	// Auteur      : Dini Ahamada
    // *****************************************************************************************
	include_once("controleurs/controleur.abstract.class.php");
	include_once("modele/DAO/utilisateurDAO.class.php");

	class SeDeconnecter extends  Controleur {
		
		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		

		// ******************* Méthode exécuter action
		public function executerAction() {
			//----------------------------- VÉRIFIER LA VALIDITÉ DE LA SESSION  -----------
			if ($this->acteur=="visiteur") {
				$_SESSION["messagesErreur"] = "Vous êtes déjà connécté.";
				header("Location: ."); 
			} elseif (ISSET($_POST['deconnexion'])) {
				//----------------------------- VÉRIFIER LA VALIDITÉ DE LA SESSION  -----------
				$this->acteur="visiteur";
				unset($_SESSION['utilisateurConnecte']);

				$_SESSION["messagessuccess"] = "Vous êtes bien deconnécté.";
				header("Location: ."); 

			} else {
				return "pageSeDeconnecter";				
			}
		}


		
	}	
	
?>
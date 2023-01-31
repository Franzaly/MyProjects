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
	class FormLoginAdmin extends Controleur  {
		
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
				
			//----------------------------- VÉRIFIER LA VALIDITÉ DE LA SESSION (pas besoin ici) -----------
			//----------------------------- VÉRIFIER LA VALIDITÉ DES POSTS (pas besoin ici) ---------------
			//----------------------------- INTERACTION BD (pas besoin ici) -------------------------------			
			//----------------------------- RETOURNER LE NOM DE LA VUE À APPELER -----


			//----------------------------- VÉRIFIER LA VALIDITÉ DE LA SESSION  -----------
			if ($this->acteur == "utilisateur") {
				$_SESSION["messagesErreur"] = "Vous êtes déjà connécté.";
				header("Location: ."); 
			}
			
			return "formLoginAdmin";
		}

		


		
	}	
	
?>
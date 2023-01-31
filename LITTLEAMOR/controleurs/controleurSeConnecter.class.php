<?php
// *****************************************************************************************
// Description   : Contrôleur spécifique pour toutes les actions non-valides qui rammène à la
//                 page d'accueil
// Date        : 12 Decembre  2021
// Auteur      : Franzaly Barthelemy
// *****************************************************************************************
include_once("controleur.abstract.class.php");
include_once("modele/DAO/utilisateurDAO.class.php");

class SeConnecter extends  Controleur
{

	// ******************* Constructeur vide
	public function __construct()
	{
		parent::__construct();
	}


	// ******************* Méthode exécuter action
	public function executerAction()
	{
		//----------------------------- VÉRIFIER LA VALIDITÉ DE LA SESSION  -----------
		if ($this->acteur == "utilisateur") {
			$_SESSION["messagesErreur"] = "Vous êtes déjà connécté.";
			header("Location: ."); 
		}

        print_r($_POST['nom']);
		//----------------------------- VÉRIFIER LA VALIDITÉ DES POSTS ---------------
		if (isset($_POST['nom']) and isset($_POST['mot_passe'])) {
			$unUtilisateur = UtilisateurDAO::chercher($_POST['nom']);
			if ($unUtilisateur == null) {
				array_push($this->messagesErreur, "Cet utilisateur n'existe pas.");
				return "formLoginAdmin";
			} elseif (!$unUtilisateur->verifierMotPasse($_POST['mot_passe'])) {
				array_push($this->messagesErreur, "Le mot de passe est incorrect.");
				return "formLoginAdmin";
			} else {
				$this->acteur = "utilisateur";
				$_SESSION['utilisateurConnecte'] = $_POST['nom'];
				$_SESSION['utilisateur_id'] = $unUtilisateur->getID();
				$this->tabProduits=ProduitDAO::chercherTous();

				if( $_SESSION['utilisateurConnecte'] == "admin1")
				{
					return "pageAdmin";

				}else
				{
				return "pageAccueil";
				}

				
			}
		} else {
			return "formLoginAdmin";
		}
	}

	// ******************* Accesseurs
	public function getTabProduits(){
		return $this->tabProduits;
	}
	
}

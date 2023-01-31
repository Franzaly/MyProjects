<?php
// *****************************************************************************************
// Description   : Contrôleur spécifique pour toutes les actions non-valides qui rammène à la
//                 page d'accueil
// Date        : 12 Decembre  2021
// Auteur      : Franzaly Barthelemy
// *****************************************************************************************
include_once("controleur.abstract.class.php");
include_once("modele/DAO/cartDAO.class.php");
include_once("modele/cart.class.php");


class RemoveCart extends  Controleur
{

	// ******************* Constructeur vide
	public function __construct()
	{
		parent::__construct();
	}




	// ******************* Méthode exécuter action
	public function executerAction()
	{


		if(ISSET($_POST["utilisateur_id"]) && isset($_POST["produit_code"])){
			$id = $_POST["cart_id"];
			$utilisateur_id=$_POST["utilisateur_id"];
			$produit_code=$_POST["produit_code"];
			$unCart= new Cart($id,$produit_code,$utilisateur_id);
			CartDAO::remove($unCart);
		}
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		
		return "pageCart";
	}
}
  
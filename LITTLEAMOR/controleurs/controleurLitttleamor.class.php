<?php
// *****************************************************************************************
// Description   : classe contenant la fonction statiquu qui géère les contrôleurs spécifiques
// Date        : 27 novembre 2021
// Auteur      : Dini Ahamada
// *****************************************************************************************
include_once("controleurs/controleurAccueilDefaut.class.php");
include_once("controleurs/controleurFormLoginAdmin.class.php");
include_once("controleurs/controleurFormLoginUser.class.php");
 include_once("controleurs/controleurVoirProduits.class.php");
 include_once("controleurs/controleurChercherProduit.class.php");
 include_once("controleurs/controleurRemoveCart.class.php");


 include_once("controleurs/controleurAdmin.class.php");
 include_once("controleurs/controleurAfficherFormulaireAjout.class.php");
include_once("controleurs/controleurAjouterProduit.class.php");
include_once("controleurs/controleurSeConnecter.class.php");
 include_once("controleurs/controleurSeDeconnecter.class.php");
include_once("controleurs/controleurAddCart.class.php");
include_once("controleurs/controleurVoirCart.class.php");

 include_once("controleurs/controleurPageBaby.class.php");
 include_once("controleurs/controleurPageMaternity.class.php");
 include_once("controleurs/controleurPageTodler.class.php");
 include_once("controleurs/controleurPageYougth.class.php");
 include_once("controleurs/controleurPageAbout.class.php");
 include_once("controleurs/controleurPageContact.class.php");
 include_once("controleurs/controleurPageReturn.class.php");
 include_once("controleurs/controleurPageShipping.class.php");
 include_once("controleurs/controleurPageMyAccount.class.php");
class Litttleamor
{
	//  Méthode qui crée une instance du controleur associé à l'action
	//  et le retourne
	public static function creerControleur($action)
	{
		$controleur = null;
		 if ($action == "voirProduits") {
		 	$controleur = new VoirProduits();
		} elseif ($action == "chercherProduit") {
			$controleur = new ChercherProduit();
		 } elseif ($action == "admin") {
		 	$controleur = new Admin();
		 } elseif ($action == "addToCart") {
		 	$controleur = new AddCart();
		} elseif ($action == "voirCart") {
			$controleur = new VoirCart();
		} elseif ($action == "removeCart") {
			$controleur = new RemoveCart();
		 } elseif ($action == "loginAdmin") {
			$controleur = new FormLoginAdmin();
		 } elseif ($action == "loginUser") {
			$controleur = new FormLoginUser();
		 } elseif ($action == "formulaireAjout") {
			$controleur = new AfficherFormulaireAjout();
		 } elseif ($action == "ajouterProduit") {
			$controleur = new AjouterProduit();
		 } elseif ($action == "seConnecter") {
			$controleur = new SeConnecter();
		} elseif ($action == "seDeconnecter") {
			$controleur = new SeDeconnecter();
		} elseif ($action == "pageBaby") {
			$controleur = new PageBaby();
		} elseif ($action == "pageMaternity") {
			$controleur = new PageMaternity();
		} elseif ($action == "pageTodler") {
			$controleur = new PageTodler();
		} elseif ($action == "pageYougth") {
			$controleur = new PageYougth();
		} elseif ($action == "pageAbout") {
			$controleur = new PageAbout();
		} elseif ($action == "pageContact") {
			$controleur = new PageContact();
		} elseif ($action == "pageShipping") {
			$controleur = new PageShipping();
		} elseif ($action == "pageReturn") {
			$controleur = new PageReturn();
		} elseif ($action == "pageMyAccount") {
			$controleur = new PageMyAccount();
		} else {
			$controleur = new AccueilDefaut();
		}



		return $controleur;
	}
}

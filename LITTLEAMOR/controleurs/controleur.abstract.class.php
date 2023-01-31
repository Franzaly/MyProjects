<?php
// *****************************************************************************************
// Description   : Classe abstraite parente de toutes les contrôleurs spécifiques
// Date        : 27 novembre 2021
// Auteur      : Franzaly Barthelemy
// Collaborateur : Aucun
// *****************************************************************************************
//Créer une classe abstraite Controleur
abstract class Controleur
{
	// ******************* Attributs 
	//declarez un tableau qui contiendra tous erreurs
	protected $messagesErreur = array();
	protected $acteur = "visiteur";

	// ******************* Constructeur vide
	//creer un constructeur sans paramètre
	//public function __construct() {}

	public function __construct()
	{
		$this->determinerActeur();
	}
	// ******************* Accesseurs 
	//retourner le tableau de message erreurs 
	public function getMessagesErreur()
	{
		return $this->messagesErreur;
	}
	public function getActeur()
	{
		return $this->acteur;
	}

	// ******************* Méthode abstraite executer action
	// Cette méthode :
	//  - gère la session (s'il y en a une)
	//  - valide les données reçues en POST (s'il y en a)
	//  - effectue le travail requis par l'action (interactions avec les DAO, ...)
	//  - retourne le nom de la vue à appliquer (en format string, sans le chemin(path))
	// Créer la méthode abstraite executerAction
	abstract public function executerAction();

	// ****************** Méthode privée
	private function determinerActeur()
	{
		session_start();
		if (isset($_SESSION['utilisateurConnecte'])) {
			$this->acteur = "utilisateur";
		}
	}
}

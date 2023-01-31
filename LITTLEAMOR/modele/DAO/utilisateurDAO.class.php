<?php

// Importe l'interface DAO et la classe Utilisateur
include_once("DAO.interface.php");
include_once("modele/utilisateur.class.php");

class UtilisateurDAO implements DAO
{
	// Cette méthode doit retourner l'objet dont la clé primaire a été reçu en paramètre
	// Notes : 1) On retourne null si non-trouvé, 
	//         2) Si la clé primaire est composée, alors le paramètre est un tableau assiociatif
	// ici la seule $clés est un int représentant le code du Utilisateur

	public static function chercher($cles)
	{
		try {
			$connexion = ConnexionBD::getInstance();
		} catch (Exception $e) {
			throw new Exception("Impossible d’obtenir la connexion à la BD.");
		}
		// valeur par défaut pour la variable à retourner si non-trouvée
		$leUtilisateur = null;

		// Préparer une requête de type PDOStatement avec des paramètres SQL	
		$requete = $connexion->prepare("SELECT * FROM utilisateur WHERE nom=:leNom");
		// Attacher des variables PHP au paramètres SQL avec le code du Utilisateur 
		// reçu du paramètre $cles
		$requete->bindParam(":leNom", $cles);

		// Exécuter la requête
		$requete->execute();

		// Analyser l’enregistrement, s’il existe, et créer l’instance du Utilisateur
		// note on pourait aussi lancer une exception si on a plus d’un résultat …
		if ($requete->rowCount() > 0) {
			$enregistrement = $requete->fetch();
			$leUtilisateur = new Utilisateur($enregistrement['id'],$enregistrement['nom'], $enregistrement['mot_passe']);
		}
		// fermer le curseur de la requête et la connexion à la BD
		$requete->closeCursor();
		ConnexionBD::close();

		return $leUtilisateur;
	}

	// Cette méthode doit retourner une liste de tous les objets reliés à la table de la BD
	static public function chercherTous()
	{
		return self::chercherAvecFiltre("");
	}

	// Comme la méthode chercherTous, mais en applicant le filtre (clause WHERE ...) reçue en param.
	static public function chercherAvecFiltre($filtre)
	{
		try {
			$connexion = ConnexionBD::getInstance();
		} catch (Exception $e) {
			throw new Exception("Impossible d’obtenir la connexion à la BD.");
		}
		// initialisation du tableau vide
		$liste = array();

		// Préparer une requête de type PDOStatement avec des paramètres SQL	
		$requete = $connexion->prepare("SELECT * FROM utilisateur " . $filtre);

		// Exécuter la requête
		$requete->execute();

		// Analyser les enristrements s'il y en a 
		foreach ($requete as $enregistrement) {
			$leUtilisateur = new Utilisateur($enregistrement['id'],$enregistrement['nom'], $enregistrement['mot_passe']);
			array_push($liste, $leUtilisateur);
		}
		// fermer le curseur de la requête et la connexion à la BD
		$requete->closeCursor();
		ConnexionBD::close();

		return $liste;
	}
	// Cette méthode insère l'objet reçu en paramètre dans la table
	// Retourne true/false selon que l'opération a été un succès ou pas.
	// *********** VERSION 1 ******************************************
	/*static public function inserer($unUtilisateur) {
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL = "INSERT INTO Utilisateur (code,description,url_photo,prix,quantite) VALUES (";
			$commandeSQL .= $unUtilisateur->get_code().",'".$unUtilisateur->get_description()."','";
			$commandeSQL .= $unUtilisateur->get_url_photo()."',".$unUtilisateur->get_prix().",".$unUtilisateur->get_quantite().")";
			
			$requete = $connexion->prepare($commandeSQL);
			return	$requete->execute();
		}*/
	// *********** VERSION 2 ******************************************
	static function inserer($unUtilisateur)
	{
		// on essaie d’établiur la connexion
		try {
			$connexion = ConnexionBD::getInstance();
		} catch (Exception $e) {
			throw new Exception("Impossible d’obtenir la connexion à la BD.");
		}
		// On prépare la commande insert
		$commandeSQL  = "INSERT INTO Utilisateur (nom,mot_passe)";
		$commandeSQL .=  "VALUES (?,?)";

		$requete = $connexion->prepare($commandeSQL);

		// On l’exécute, et on retourne l’état de réussite (true/false)
		$tab = [$unUtilisateur->getNomUtilisateur(), $unUtilisateur->getMotPasse()];
		return	$requete->execute($tab);
	}

	// Cette méthode modifie tous les champs (non-clé primaire) de l'objet reçu en paramètre dans la table
	// Retourne true/false selon que l'opération a été un succès ou pas.
	static public function modifier($unUtilisateur)
	{
		try {
			$connexion = ConnexionBD::getInstance();
		} catch (Exception $e) {
			throw new Exception("Impossible d’obtenir la connexion à la BD.");
		}
		$commandeSQL = "UPDATE utilisateur SET nom=?, mot_passe=?";
		$requete = $connexion->prepare($commandeSQL);
		$tab = [$unUtilisateur->getNomUtilisateur(), $unUtilisateur->getMotPasse()];
		return	$requete->execute($tab);
	}
	// Cette méthode supprime l'objet reçu en paramètre de la table
	// Retourne true/false selon que l'opération a été un succès ou pas.
	static public function supprimer($unUtilisateur)
	{
		try {
			$connexion = ConnexionBD::getInstance();
		} catch (Exception $e) {
			throw new Exception("Impossible d’obtenir la connexion à la BD.");
		}
		$commandeSQL = "DELETE FROM utilisateur WHERE nom=?";
		$requete = $connexion->prepare($commandeSQL);
		return	$requete->execute([$unUtilisateur->getNomUtilisateur()]);
	}
}
